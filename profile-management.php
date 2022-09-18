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

$comand = "select * from users where idUser ='".mysqli_escape_string($conn, $_SESSION['idUser'])."'";
$result = @mysqli_query($conn, $comand);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>

<html>
<head>
    <title>Profile management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="styleprofile.css">
</head>

<body>
    <div class="log">
    <h2 class="sign" align="center">Hi, <?php echo $row['name'];?></h2>
    
    <div class="content">
    <div class="table">
    <table class="content-table">
        <tr>
            <th>Email</th>
            <th><?php echo $row['email'];?></th>
        </tr>
        <tr>
            <th>Name</th>
            <th><?php echo $row['name'];?></th>
        </tr>
        <tr>
            <th>Surname</th>
            <th><?php echo $row['surname'];?></th>
        </tr>
        <tr>
            <th>Address</th>
            <th><?php echo $row['address'];?></th>
        </tr>
        <tr>
            <th>City</th>
            <th><?php echo $row['city'];?></th>
        </tr>
    </table>
    </div>
    <div class="buttons">
    <form class="form1" action="change.php" method="POST">
        <div><input class="submit" align="center" type="submit" name="btnEdit" value="Edit profile"></div>
        <div><input class="submit" align="center" type="submit" name="btnChange" value="Change password"></div>
        <div><input class="submit" align="center" type="submit" name="btnExit" value="Log out"></div>
        <div><p class="newUser" align="center"><a href="main.php">Return to homepage</p></div>
    </form>
    </div>
    </div>
    
</div>
</body>
</html>