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
    $email = $_POST['email'];
    $psw = $_POST['password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $address = $_POST['address'];
    $city = $_POST['city'];

    $comandoSQL = "select * from users where email ='".mysqli_escape_string($conn, $email)."'";
          
    $risultatoRicercaEmail = @mysqli_query($conn, $comandoSQL);
     
    if(isset($_POST['btnReg']))
    {        
        if(mysqli_fetch_assoc($risultatoRicercaEmail)) 
        {
            mysqli_close($conn);
            header("Location: login.html?errore=user_already_exists");
            exit;
        }
        
        $comandoSQL = "insert into users values (null,'$email','$psw', '$name', '$surname', '$address', '$city')";
        $esito = mysqli_query($conn, $comandoSQL);
        
        if($esito)
        {
            $_SESSION['idUser'] = mysqli_insert_id($conn);
            $comandoSQL = "insert into orders values (null,'".$_SESSION['idUser']."')";
            $esito = mysqli_query($conn, $comandoSQL);
            if($esito)
            {
                $_SESSION['idOrder'] = mysqli_insert_id($conn);
                $_SESSION['list'] = array();
            }

            mysqli_close($conn);
            header("Location: main.php");
        }

        else
        {
            mysqli_close($conn);
            header("Location: login.html?errore=inserimento_fallito");
        }
        exit;
    }
}

else
{
    header("Location: login.html?errore=4");
    exit; 
}
?>