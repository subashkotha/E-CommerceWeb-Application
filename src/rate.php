<?php 
 session_start();
 require_once 'Dbconnect.php';
if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 $res=mysql_query("SELECT * FROM shopping WHERE idshopping=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
 if(isset($_GET['id']))
 {
    $id= $_GET['id']; 
    $stock=mysql_query("SELECT * FROM orders WHERE id=$id");
    $row=mysql_fetch_array($stock);
    $name=$row['name'];
    $result=mysql_query("SELECT * FROM products WHERE name='$name'");
    $Row=mysql_fetch_array($result);
    $image=$Row['image'];
    $type=$Row['type'];
    $description=$Row['description'];
   } 
 ?>
<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rating</title>
</head>
<body>
    <h1>Your Review <?php echo $userRow['userName']; ?> </h1>
    <table border="1">
        <th>Name</th><th>Image</th><th>Description</th>
        <tr>
         <td><?php echo $name?></td>
         <td><img src="data:image/jpeg;base64,<?php echo base64_encode( $image ); ?>" style="width:50%;"/></td>
         <td><?php echo $description ?></td>
        <tr>
    </table>
      <select size="1" name="type"  > 
      <option>5</option>
      <option>4</option>
      <option>3</option>
      <option>2</option>
      <option>1</option>
      <option>0</option>
      </select> 
      <input type="submit" name="submit" value="view by type">
 </body>
</html>