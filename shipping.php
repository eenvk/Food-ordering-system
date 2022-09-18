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
  
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['btnConfirm']))
        {
            $date=date("Y-m-d");
            $idUser=$_SESSION['idUser']; 
            $total = $_POST['total'];

            $comandoSQL = "insert into payments values (null, '".$_SESSION['idOrder']."', '$idUser', '$date', '$total')";
            $esito = mysqli_query($conn, $comandoSQL);
            if($esito)
            {
?>
            <html>
            <head>
                <title>FINISH</title>
                <meta name="viewport" content="width=device-width, initial-scale=1" />
                <link rel="stylesheet" href="style2.css">
            </head>

            <body style = "background-color: #55aa6d">
                <center>
                <br>
                <br>
                <br>
                <h1>Thank you for ordering!</h1>
                <br>
                <h1>Your order is the number <?php echo $_SESSION['idOrder'];?>.</h1>
                </center>
            </body>
            </html>
<?php
               session_unset();
               session_destroy();
               mysqli_close();
            }
        }
    }
    else
    {
        header("Location: cart.php?errore=4");
        exit; 
    }
?>