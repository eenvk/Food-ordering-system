<?php
session_start();

$conn=@mysqli_connect("localhost","freshy","");
if(!$conn)
{
    echo "Connection failed";
    die;  
}
		
$connDB=@mysqli_select_db($conn,"my_freshy");	
if(!$connDB)
{
    echo "I can't find the database";
    echo mysqli_sqlstate($conn);
    echo mysqli_errno($conn);        
    echo mysqli_error($conn);
    die;       
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['btnRec']))
    {  
        $to_email_address = $_POST['email'];
        $subject = "recovery password";
        $headers .= "Content-type: text/html\r\n";

        $comandoSQL = "SELECT* from users WHERE email ='".mysqli_escape_string($conn, $to_email_address)."'";
        $risultatoRicercaEmail = @mysqli_query($conn, $comandoSQL);

        if($risultatoRicercaEmail)
        {
            if($riga = mysqli_fetch_assoc($risultatoRicercaEmail))
            {
                $psw = $riga['psw'];
                $message = "<h1>Hi ". $to_email_address .", this is your passoword: ". $psw ."</h1> <br> <h1><a href='http://freshy.altervista.org/login.html'>click here to login</h1> <br>";
                mail($to_email_address,$subject, $message, $headers);
            }
            
            else
            {
                mysqli_close($conn);
                header("Location: login.html?errore=user_does_not_exist");
                exit;
            }
        }
        else
        {
            mysqli_close($conn);
            header("Location: login.html?errore=query-failed");
            exit;
        }

        mysqli_close($conn);
        header("Location: login.html");
    }
}

else
{
    header("Location: login.html?errore=4");
    exit; 
}
?>