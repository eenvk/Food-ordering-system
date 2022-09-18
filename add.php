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

if(isset($_GET['add']))
{
    $idFood = $_GET['idFood'];
    $array = $_SESSION['list'];

    $flag=false;
    for($i=0; $i<count($array); $i++)
    {
        if($array[$i] == $idFood)
        {
            $flag = true;
        }
    }

    if(!$flag)
    {
        array_push($_SESSION['list'], "$idFood");
        $sql = "insert into quantities values (null,'".$_SESSION['idOrder']."','$idFood', '1')";
        $result = mysqli_query($conn, $sql);
    }

    if($flag)
    {
        $sql2 = "select * from quantities where (idOrder='".$_SESSION['idOrder']."' and idFood='".$idFood."')";
        $result2 = mysqli_query($conn, $sql2);
        $row = mysqli_fetch_assoc($result2);
        $nq = $row['quantity'] + 1;
    
        $update="UPDATE quantities SET quantity='$nq' WHERE (idOrder ='".mysqli_escape_string($conn, $_SESSION['idOrder'])."' and idFood='".mysqli_escape_string($conn, $idFood)."')";
        $result3 = mysqli_query($conn, $update);
    }

	$csql = "select * from food where idFood='".$idFood."'";
    $result4 = mysqli_query($conn, $csql);
    $category = mysqli_fetch_assoc($result4);
    
    if($category['category'] == 1)
    {
    	header("Location: pizzas.php?item-added-to-cart");
    }
    
    if($category['category'] == 2)
    {
    	header("Location: burgers.php?item-added-to-cart");
    }
    
    if($category['category'] == 3)
    {
    	header("Location: drinks.php?item-added-to-cart");
    }
}

if(isset($_GET['delete']))
{
    $idFood = $_GET['idFoodToDelete'];
    $sql3 = "DELETE from quantities WHERE (idOrder ='".mysqli_escape_string($conn, $_SESSION['idOrder'])."' and idFood='".mysqli_escape_string($conn, $idFood)."')";
    $result5 = mysqli_query($conn, $sql3);

    if($result5)
    {
        header("Location: cart.php?updated-successfully");
    }
    else
    {
        header("Location: cart.php?error");
    }
}

if(isset($_GET['ok']))
{
    $idFood = $_GET['idFoodToChange'];
    $qt = $_GET['num'];
    $update = "UPDATE quantities SET quantity='$qt' WHERE (idOrder = '".mysqli_escape_string($conn, $_SESSION['idOrder'])."' and idFood='".mysqli_escape_string($conn, $idFood)."')";
    $result6 = mysqli_query($conn, $update);

    if($result6)
    {
        header("Location: cart.php?updated-successfully");
    }
    else
    {
        header("Location: cart.php?error");
    }
}
?>