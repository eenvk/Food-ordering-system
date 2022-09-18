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
    <title>FRESHEAT - CART</title>
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
            
            <h2 class="text-center text-white">Confirm your order</h2>

                <fieldset>
                    <legend>Selected foods</legend>

                    <?php
                        $total = 0;
                        $sql = "select * from quantities where idOrder='".$_SESSION['idOrder']."'";
                        $result = mysqli_query($conn, $sql);
                        while($riga = mysqli_fetch_assoc($result))
                        {
                            $sql2 = "select * from food where idFood='".$riga['idFood']."'";
                            $result2 = mysqli_query($conn, $sql2);
                            $riga2 = mysqli_fetch_assoc($result2);

                            $price = $riga['quantity'] * $riga2['price'];
                            $total += $price;
                        ?>
                            <div class="food-menu-box">
                            <div class="food-menu-img">
                                <img src="img/<?php echo $riga2['img'];?>.jpg" alt="<?php echo $riga2['name'];?>" class="img-responsive2 img-curve">
                            </div>
      						
                            <div class = "sez">
                            
                            <div class="food-menu-desc">

                                <h4><?php echo $riga2['name'];?></h4>
                                <div name="quantity" class="input-responsive"><?php echo $riga['quantity'];?></div>
                        
                                <div class="order-label">Total price</div>
                                <p class="food-price"><?php echo $price;?> $</p>

                            </div>
                            
                            <div class="food-menu-desc">

                                <div class="order-label">Select quantity</div>
                                
                                <form name="quantityFood" action="add.php" method="GET">
                                
                                <div class = "sez">

                                
                                    <div class="input-responsive">
                                	    <input type = "number" name = "num" min = 1 max = 10 value = "<?php echo $riga['quantity'];?>" style = "width: 80px;">
								    </div>
                                    <div class="input-responsive">
                                        <input type="hidden" name="idFoodToChange" value="<?php echo $riga['idFood'];?>">
                                	    <input type = "submit" name="ok" value="Ok" class="btn btn-primary">
                                    </div>
                                
                                
								</div>
                                
                                
                                <div class="order-label">
                                    <input type="hidden" name="idFoodToDelete" value="<?php echo $riga['idFood'];?>">   
                                	<input type="submit" name="delete" value="Delete" class="btn btn-primary">
                                </div>
                                
                                </form>
                                
                            </div>

                            </div>
                            
                            </div>                          
                    <?php       
                        }
                    ?>


                </fieldset>

                <fieldset>
                    <div class="order-label">Total</div>
                    <p class="food-price"><?php echo $total;?> $</p>
                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>

                    <?php
                        $comand = "select * from users where idUser ='".mysqli_escape_string($conn, $_SESSION['idUser'])."'";
                        $result = @mysqli_query($conn, $comand);
                        $row = mysqli_fetch_assoc($result);
                    ?>
                        <div class="order-label">Name</div>
                        <div name="name" class="input-responsive"><?php echo $row['name'];?></div>
                        <div class="order-label">Surname</div>
                        <div name="surname" class="input-responsive"><?php echo $row['surname'];?></div>
                        <div class="order-label">Address</div>
                        <div name="address" class="input-responsive"><?php echo $row['address'];?></div>
                        <div class="order-label">City</div>
                        <div name="city" class="input-responsive"><?php echo $row['city'];?></div>

                        <form action="shipping.php" method="POST">
                            <input type="hidden" name="total" value="<?php echo $total;?>">
                            <input type="submit" name="btnConfirm" value="Confirm Order" class="btn btn-primary">
                        </form>
                </fieldset>
        </div>
    </section>
</body>
</html>