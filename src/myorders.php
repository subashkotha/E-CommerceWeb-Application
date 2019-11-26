<?php 
 session_start();
 require_once 'Dbconnect.php';
if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 
 $res=mysql_query("SELECT * FROM shopping WHERE idshopping=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
 $customer=$userRow['userName'];
 $result = mysql_query("select * from orders WHERE username='$customer'");
 $stock=mysql_query("select * from products");
 if(isset($_GET['id']))
 {
    $id= $_GET['id']; 
    $stock=mysql_query("SELECT * FROM orders WHERE id=$id");
    $Row=mysql_fetch_array($stock);
    $add=$Row['name'];
    $quant=$Row['quantity'];
    mysql_query("UPDATE products SET stock=(stock+$quant) WHERE name='$add'");
    mysql_query("DELETE FROM orders WHERE id='$id'");
    header('Refresh: 2; URL=http://localhost/shopping/myorders.php');
    $msg='Cancelling your Order';
    
 }
?>
<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $userRow['userName']; ?>'s orders</title>
<style>
    table{margin-top: 80px; margin-left: 40px; padding: 15px;border-collapse: collapse; border-style: solid;}
   .nav a{ text-decoration: none; position: absolute;right:10px;top: 20px; color: teal; font-family: 'Verdana' ;padding: 11px;font-size: 150%}
   .nav a:hover{color:red;}
    th, td {
    padding: 15px;
     }
     tr:hover{background-color: darkgray;}
     th {
       background-color: #4CAF50;
       color: white;
        }
</style>
</head>
<body>
<span style="left: 70px;position:absolute;top: 20px;color: slateblue;font-family: 'Acid';font-size:240%"><?php echo $userRow['userName']; ?> your orders</span>
<div class="nav">
<a href="home.php">Home</a>
</div>
<table  border='1'>
    <tr>
        <th>Order ID</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Order Date</th>
        <th>Status</th>
        <th>Option</th>
    </tr>
                <?php  
                   
                   while ($row = mysql_fetch_object($result)) 
            {   if($row->status==1)
              {
                ?>
          <tr>
              <td> <?php echo $row->id; ?> </td>
              <td> <?php echo $row->name; ?> </td>
              <td> <?php echo $row->quantity; ?> </td>
              <td> <?php echo $row->price; ?> </td>
              <td> <?php echo $row->OrderDate; ?> </td>
              <td>Out for delivery</td>
              <td><a style="color:red;text-decoration: none" href="myorders.php?id=<?php echo $row->id; ?>" onclick="return confirm('Are you sure you want to cancel this Order?');">Cancel Order</a></td>
          </tr> 
             
            <?php } else{?>
          <tr>
              <td> <?php echo $row->id; ?> </td>
              <td> <?php echo $row->name; ?> </td>
              <td> <?php echo $row->quantity; ?> </td>
              <td> <?php echo $row->price; ?> </td>
              <td> <?php echo $row->OrderDate; ?> </td>
              <td>Delivered</td>
              <td><a href="rate.php?id=<?php echo $row->id; ?>" style="color:blue;text-decoration: none">Rate product</a></td>
          </tr> 
                     <?php } }?>
           <span style="font-family: 'Acid';color: yellowgreen;font-size: 240%; position: absolute;bottom:60px; left:40px;"><p><?php echo $msg;?></p></span>
</table>
</body>
</html>