<?php
 session_start();
 require_once 'Dbconnect.php';
 require 'Item.php';
 $res=mysql_query("SELECT * FROM shopping WHERE idshopping=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
 
 //echo $product->name; 
     if(isset($_GET['idproducts'])&&!isset($_POST['update']))
     {   
           $result = mysql_query("select * from products where idproducts=".$_GET['idproducts']);
           if($result)
           {$product = mysql_fetch_object($result);} 
         $Item = new Item();
         $Item->idproducts=$product->idproducts;
         $Item->name=$product->name; 
         $Item->image=$product->image;
         $Item->cost=$product->cost;
         $Item->quantity=1;
         $index=-1;
         $cart= unserialize(serialize($_SESSION['cart']));
         for($i=0;$i<count($cart);$i++)
         {  if($cart[$i]->idproducts==$_GET['idproducts'])
             { $index=$i; break;}
         }
         if($index==-1)
           $_SESSION['cart'][]=$Item;
         else
         { $cart[$index]->quantity++;$_SESSION['cart']=$cart;}   
         
         
    }   
   
    if(isset($_GET['index'])&&!isset($_POST['update']))
    {
       $cart= unserialize(serialize($_SESSION['cart']));
       unset($cart[$_GET['index']]);
       $cart= array_values($cart);
       $_SESSION['cart']=$cart;
     }    
     
     if(isset($_POST['update']))
     {
         $arr=$_POST['quantity'];
         $valid=1;
         for($i=0;$i<count($arr);$i++)
         {
             if(!is_numeric($arr[$i])||$arr[$i]<1)
             { $valid=0;  $errMSG='invalid quantity , Quantity should be greater than 0';break;}
         }
         if($valid==1)
         {$cart= unserialize(serialize($_SESSION['cart']));
          for($i=0;$i<count($cart);$i++)
          { $cart[$i]->quantity=$arr[$i];}
          $_SESSION['cart']=$cart;
         }
     }
 ?>
<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['userName']; ?></title>
<style>
    .navbar{position: absolute;top: 30px;right: 30px;}
    .navbar a:hover{color: darkblue;}
    .navbar a{ text-decoration: none; color: orangered; font-family: 'Verdana' ;padding: 20px; font-size: 140%;}
    table{ position: absolute;left: 30px; top:140px; border: 2px solid black;border-collapse: collapse;}
    th{padding: 16px; font-family: "Trebuchet MS"; background-color: lightgray;font-size: 130%;}
    td{padding: 16px; font-family: "Trebuchet MS";font-size: 110%;}
    tr:hover{background-color: lightblue;}
    h2{left: 30px;position:absolute;top: 0px;color: darkblue;font-family: 'Acid';font-size:250%}
    .end{ position: relative;top: 65px; left: 30px; color: orangered;}
</style>
</head>
<body>
    <h2><?php echo $userRow['userName']; ?>'s cart</h2>
    <form method="post">
    <table cellpadding='2' cellspacing='2' border='1'>
        <tr>
            <th>Option</th>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Cost</th>
            <th>Quantity  <input type="image" src="save-128.png"  style="width:10%" >
                <input type="hidden" name="update">
            </th>
            <th>Sub total</th>
        </tr>
        <?php  
             $cart= unserialize(serialize($_SESSION['cart']));
             if($cart==NULL)
             { $errMSG='Sorry your cart is Empty , please add some products to the cart';}
             else{
             $index=0;
             $sum=0; $shipping=40;
             for($i=0;$i<count($cart);$i++)
             { $sum+=$cart[$i]->quantity*$cart[$i]->cost;
        ?>
        <tr>
            <td><a href="cart.php?index=<?php echo $index; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Remove From Cart</a>
            <td><?php echo $cart[$i]->idproducts; ?></td>
            <td><?php echo $cart[$i]->name; ?></td>
            <td><img src="data:image/jpeg;base64,<?php echo base64_encode( $cart[$i]->image ); ?>" style="width:50%;"/></td>
            <td><?php echo $cart[$i]->cost; ?></td>
            <td><input type="text" value="<?php echo $cart[$i]->quantity; ?>" style="width: 30px" name="quantity[]"></td>
            <td><?php echo $cart[$i]->quantity*$cart[$i]->cost; ?></td>
            
        </tr>
             <?php $index++; }} ?>
        <tr>
            
            <td colspan="6" align='right'  style="font-size: 120%">Shipping charges  </td>
            <td><?php echo $shipping ;?></td>
        </tr>
        <tr>
            <td colspan="6" align=right style="font-size: 140%">Grand Total  </td>
            <td><p> &#8377;<?php echo $sum +$shipping;?></p></td>
        </tr>
   </table>
   </form>     
    <div class="navbar">
    <a href="checkout.php" >Checkout</a>
    <a href="home.php" >Continue shopping</a>
    </div>
    <div class='end'>
    <p> <?php echo '* Please click on save Icon to update the Quantity'?></p>
    <p> <?php echo $errMSG;?></p></div>
  </body>
</html>