<?php
 session_start();
 require_once 'Dbconnect.php';
 require 'Item.php';
 $res=mysql_query("SELECT * FROM shopping WHERE idshopping=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
 $customer=$userRow['userName'];
 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ORDERS- <?php echo $userRow['userName']; ?></title>
<style>.order{position: absolute;top:100px;left: 50px; font-family: 'Acid';}
       .order p{color: darkgrey; font-size: 150%}
       .navbar{position: absolute;top: 30px;right: 30px;}
       .navbar a:hover{color: blueviolet;}
       .navbar a{ text-decoration: none; color: orangered; font-family: 'Verdana' ;padding: 20px;font-size: 150%;}

</style>
</head>
<body>
    <?php 
                if($_SESSION['cart']==NULL)
            {    $errMSG= 'No items in cart to order, Redirecting to HOME page';
                  header('Refresh: 4; URL=http://localhost/shopping/home.php');

            }
            else{
            $cart= unserialize(serialize($_SESSION['cart']));
             for($i=0;$i<count($cart);$i++)
             {  $name=$cart[$i]->name;
                $quantity=$cart[$i]->quantity;
                  $res=mysql_query("SELECT * FROM products WHERE name='$name'");
                  $Row=mysql_fetch_array($res);
                  $stock=$Row['stock'];
                 if($stock-$quantity>0)
               {  $cost=$cart[$i]->quantity*$cart[$i]->cost;
                 
                  mysql_query("INSERT into orders(username,name,status,quantity,price) VALUES('$customer','$name',1,$quantity,$cost)");
                  mysql_query("UPDATE products SET stock=(stock-$quantity) WHERE name='$name'");
                 
              ?>
             
       <div class="order">
        
        <h1 style="color: #1ab188;font-size: 220%">Hello <?php echo $userRow['userName']; ?> , your order has been successfully placed</h1>
        <p> you can check status of your orders in view orders tab </p>
        <p> Thanks for shopping with us </p>
        </div>
    <?php } else{$errMSG='Sorry, Order could not be placed , try decreasing items in the Cart';}}  ?>
   
     <?php unset($_SESSION['cart']);
          
     } ?> <span style="color: sandybrown;padding: 30px;font-size: 120%"> <h3> <?php echo $errMSG;?></h3></span>
<div class="navbar">
    <a href="home.php" >HOME</a>
    <a href="logout.php?logout" >LOG OUT</a>
    </div>
</body>
</html>