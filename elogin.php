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
        $email = $_POST['email'];
        $psw = $_POST['password'];

        $comandoSQL = "select * from users where email ='".mysqli_escape_string($conn, $email)."'";
          
        $resultSearchEmail = @mysqli_query($conn, $comandoSQL);
     
        if(isset($_POST['btnLog']))
        {        
            if ($resultSearchEmail) 
            {
                if ($riga = mysqli_fetch_assoc($resultSearchEmail))
                {
                    $authenticate = ($psw === $riga['psw']);
                }

                else
                {
                    $authenticate = false;
                }
  
                if($authenticate)
                {
                    $_SESSION['idUser'] = $riga['idUser'];

                    $sql = "select max(idOrder) from orders where idUser = '".$_SESSION['idUser']."'";
                    $res = @mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($res);

                    $sql2 = "select * from payments where idOrder = '".$row['max(idOrder)']."'";
                    $res2 = @mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($res2);

                    if($row2['idOrder'] === $row['max(idOrder)'])
                    {
                        $comandoSQL = "insert into orders values (null,'".$_SESSION['idUser']."')";
                        $result = @mysqli_query($conn, $comandoSQL);
                        if($result)
                        {
                            $_SESSION['idOrder'] = mysqli_insert_id($conn);
                            $_SESSION['list'] = array();
                        }
                    }

                    else
                    {
                        $_SESSION['idOrder'] = $row['max(idOrder)'];
						$_SESSION['list'] = array();
                        
                        $sql3 = "select * from quantities where idOrder = '".$_SESSION['idOrder']."'";
                        $res3 = @mysqli_query($conn, $sql3);

                        while($rows = mysqli_fetch_assoc($res3))
                        {
                        	array_push($_SESSION['list'], "".$rows['idFood']."");
                        }
                    }
					mysqli_close($conn);
                    header("Location: main.php");
                }

                else
                {
                    header("Location: login.html?errore=autentication_failed");
                }
                
                exit;
            }

            else 
            {
                echo "problems with database";
                echo mysqli_sqlstate($conn);
                echo mysqli_errno($conn);
                echo mysqli_error($conn);
                die;  
            }
        }
    }

else
{
    header("Location: login.html?errore=4");
    exit; 
}
?>