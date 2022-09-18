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
?>
        <html>
        <head>
            <title>Change password</title>
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <link rel="stylesheet" href="style.css">
        </head>

        <body>
            <div class="change">
            <p class="sign" align="center">Change Password</p>

            <form class="form1" action="update-password.php" method="POST">
                <input class="password" align="center" type="password" name="oldpassword" placeholder="old password" required>
                <input class="password" align="center" type="password" name="newpassword" placeholder="new password" required>
                <input class="submit" align="center" type="submit" name="btnChange" value="Change">
                <p class="forgot" align="center"><a href="recovery.html">Forgot Password?</p>
            </form>    
        </div>
        </body>
        </html>
<?php
    }

    if(isset($_POST['btnEdit']))
    {
        $comand = "select * from users where idUser ='".mysqli_escape_string($conn, $_SESSION['idUser'])."'";
        $result = @mysqli_query($conn, $comand);
        $row = mysqli_fetch_assoc($result);
?>
        <html>
        <head>
            <title>Edit profile</title>
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <link rel="stylesheet" href="style.css">
        </head>

        <body>
            <div class="edit">
                <p class="sign" align="center">Edit profile</p>

                <form class="form1" action="edit.php" method="POST">
                    <input class="email" type="text" name="newname" align="center" value="<?php echo $row['name'];?>" required>
                    <input class="email" type="text" name="newsurname" align="center" value="<?php echo $row['surname'];?>" required>
                    <input class="email" type="text" name="newaddress" align="center" value="<?php echo $row['address'];?>" required>
                    <input class="email" type="text" name="newcity" align="center" value="<?php echo $row['city'];?>" required>
                    <input class="submit" align="center" type="submit" name="btnEdit" value="Edit">
                </form>    
            </div>
        </body>
        </html>
<?php
    }

    if(isset($_POST['btnExit']))
    {
        mysqli_close();
        header("Location: login.html");
        exit;
    }
}
?>