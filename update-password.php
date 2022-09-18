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
        $opsw = $_POST['oldpassword'];
        $npsw = $_POST['newpassword'];
        $id= $_SESSION['idUser'];

        $sql = "select * from users where idUser = '".mysqli_escape_string($conn, $id)."'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if($opsw === $row['psw'])
        {
            $update = "UPDATE users SET psw='$npsw' WHERE idUser = '".mysqli_escape_string($conn, $id)."'";
            $esito = mysqli_query($conn, $update);
                
            if($esito)
            {
                mysqli_close($conn);
                header("Location: profile-management.php?password-updated-successfully");
            }
            else
            {
                mysqli_close($conn);
                header("Location: profile-management.php?fail-try-again");
                exit;
            }
        }

        else
        {
            mysqli_close($conn);
            header("Location: profile-management.php?old-password-wrong");
        }
    }
}

else
{
    header("Location: profile-management.php?errore=4");
    exit; 
}
?>