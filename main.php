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
?>

<!DOCTYPE html>

<html>
<head>
    <title>FRESHEAT - MAIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <div class="menu">
        <div class="wrapper text-center">
            <ul>
                <li>
                    <a href = "main.php"><img class="logo" src="img/restaurant.png"></a>
                </li>
                <li>
                    <?php                        
                        if(count($_SESSION['list'])==0)
                        {
                            $num=0;
                        }
                        else
                        {
                            $comand2 = "select sum(quantity) from quantities where (idOrder='".$_SESSION['idOrder']."')";
                            $result2 = mysqli_query($conn, $comand2);
                            $riga2 = mysqli_fetch_assoc($result2);
                            $num = $riga2['sum(quantity)'];
                        }
                    ?>
                    <a href = "cart.php"><img class="logo" src="img/shopping-cart.png"><label class="cart-number"><?php echo $num;?></label></a>
                </li>
                <li>
                    <a href = "profile-management.php"><img class="logo" src="img/user.png"></a>
                </li>
            </ul>
        </div>
    </div>

    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <a href="pizzas.php">
            <div class="box-3 float-container">
                <img src="images/pizza.jpg" alt="Pizza" class="img-responsive img-curve">

                <h3 class="float-text text-white">Pizza</h3>
            </div>
            </a>

            <a href="burgers.php">
            <div class="box-3 float-container">
                <img src="images/burger.jpg" alt="Burger" class="img-responsive img-curve">

                <h3 class="float-text text-white">Burger</h3>
            </div>
            </a>

            <a href="drinks.php">
            <div class="box-3 float-container">
                <img src="images/drinks.jpg" alt="Drinks" class="img-responsive img-curve">

                <h3 class="float-text text-white">Drinks</h3>
            </div>
            </a>

            <div class="clearfix"></div>
        </div>
    </section>
</body>
</html>