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

    <section class="food-menu">
        <div class="container">

            <section class="categories">
                <div class="container">
                <?php
                    $comandosql = "select * from food where category='1'";
                    $risultato = mysqli_query($conn, $comandosql);
                    
                    while($riga = mysqli_fetch_assoc($risultato))
                    {
                ?>
                        <div class="food-menu-box">
                        
                        <div class = "sez">
                        
                        <div class="food-menu-img">
                            <img src="img/<?php echo $riga['img'];?>.jpg" alt="<?php echo $riga['name'];?>" class="img-responsive2 img-curve">
                        </div>
                    
                        <div class="food-menu-desc">
                            <h4><?php echo $riga['name'];?></h4>
                            <p class="food-price"><?php echo $riga['price'];?> $</p>

                            <form name="chooseFood" action="add.php" method="GET">
                                <input type="hidden" name="idFood" value="<?php echo $riga['idFood'];?>">
                                <input type="submit" name="add" value="Add to cart" class="btn btn-primary">
                            </form>
                            
                        </div>
                            
                        </div>
                        
                        </div>
                <?php
                    }
                ?>

                    <div class="clearfix"></div>
                </div>
            </section>
        </div>
    </section>
</body>
</html>