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
    if(isset($_POST['btnEdit']))
    {
        $id = $_SESSION['idUser'];
        $newname = $_POST['newname'];
        $newsurname = $_POST['newsurname'];
        $newaddress = $_SESSION['newaddress'];
        $newcity = $_SESSION['newcity'];

        $edit = "UPDATE users SET name='$newname' WHERE idUser ='".mysqli_escape_string($conn, $id)."'";
        $esito = mysqli_query($conn, $edit);

        $edit2 = "UPDATE users SET surname='$newsurname' WHERE idUser ='".mysqli_escape_string($conn, $id)."'";
        $esito2 = mysqli_query($conn, $edit2);

        $edit3 = "UPDATE users SET address='$newaddress' WHERE idUser ='".mysqli_escape_string($conn, $id)."'";
        $esito3 = mysqli_query($conn, $edit3);

        $edit4 = "UPDATE users SET city='$newcity' WHERE idUser ='".mysqli_escape_string($conn, $id)."'";
        $esito4 = mysqli_query($conn, $edit4);
                
        if($esito && $esito2 && $esito3 && $esito4)
        {
            mysqli_close($conn);
            header("Location: profile-management.php?profile-edited-successfully");
        }
        else
        {
            mysqli_close($conn);
            header("Location: profile-management.php?fail-try-again");
            exit;
        }
    }
}

else
{
    header("Location: profile-management.php?errore=4");
    exit; 
}
?>