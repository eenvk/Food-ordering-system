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
    if(isset($_POST['btnChange']))
    {
        $npsw = $_POST['newpassword'];
        $id = $_SESSION['idUser'];

        $comandoSQL = "SELECT* from users WHERE idUser ='".mysqli_escape_string($conn, $id)."'";
    
        $risultatoRicercaEmail = @mysqli_query($conn, $comandoSQL);
        if($risultatoRicercaEmail)
        {
            if(mysqli_fetch_assoc($risultatoRicercaEmail))
            {
                $update = "UPDATE users SET psw='$npsw' WHERE idUser ='".mysqli_escape_string($conn, $id)."'";
                $esito = mysqli_query($conn, $update);
            
                if($esito)
                {
                    mysqli_close($conn);
                    header("Location: login.html");
                }
            }
    
            else
            {
                mysqli_close($conn);
                header("Location: login.html?errore=user_doesnt_exist");
            }

            exit;
        }
        
        else
        {
            mysqli_close($conn);
            header("Location: login.html?errore=query-failed");
            exit;
        }
    }
}

else
{
    header("Location: login.html?errore=4");
    exit; 
}
?>