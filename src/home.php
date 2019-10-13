<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 if ( isset($_POST['submit']) ) { 
  $type = trim($_POST[type]);
  $type = strip_tags($type);
  $type = htmlspecialchars($type);
  
  $result = mysql_query("select * from products WHERE type='$type'");
   if($type=='All')
   {$result = mysql_query("select * from products");}
 }
 $res=mysql_query("SELECT * FROM shopping WHERE idshopping=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
 if ( !isset($_POST['submit'])) { 
     $result = mysql_query("select * from products");
 }
 ?>

<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['userName']; ?></title>
<style>
      body {
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    background-color: wheat;
    }
    
   .navbar{ }
   .navbar ul {
    list-style-type: none;
    
    margin-top: 0px;
    overflow: hidden;
    border: 2px solid black;
    background-color: #4CAF50;
    
    }
    .navbar li {
    float: right;
    margin-right: 20px;
    }

    .navbar li a {
        display: block;
        color: white;
        text-align: center;
        padding:16px;
        text-decoration: none;
        font-family: 'Verdana';
        font-size: 140%;
    }

    .navbar li a:hover:not(.active) {
        background-color: #ddd;
        color :black;
    }
    tr:hover{background-color: lightgray;}
    td{padding: 16px; font-family: "Trebuchet MS";font-size: 130%;}
    th{padding: 16px; font-family: "Trebuchet MS"; background-color: darkolivegreen;color:white;font-size: 130%; }
    image {size: 50%;}
    .donar{position: absolute; top:130px; left: 70px; color:orangered; font-family: 'Acid'; font-size: 150%}
    table{margin-left: 130px; border-collapse: collapse; border: 2px solid black;}
    table a{text-decoration: none; color: orangered; font-family: 'Arial';}
    table a:hover{color: darkcyan;}
    .type{position: absolute;top: 130px; left: 240px;}
    input[type=submit] {
    
            background-color: #4CAF50;
            color: white;
            padding: 12px 10px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: purple;
        }

</style>
</head>
<body>

      <span style="left: 70px;position:absolute;top: 70px;color: darkcyan;font-family: 'Acid';font-size:250%">Welcome <?php echo $userRow['userName']; ?></span>
       
      <div class="navbar"> 
      <ul>
          <li><a href="details.php">Account Details</a></li>
          <li><a href="change.php">Change Password</a></li>
          <li><a href="cart.php">View cart</a></li>
          <li><a href="myorders.php">My Orders</a></li>
          <li><a href="logout.php?logout">Sign Out</a></li>
      </ul>
      </div>
       <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
           <div class="type"> 
                   
                  <select size="1" name="type"  > 
                  <option>All</option>
                  <option>clothing</option>
                  <option>food</option>
                  <option>electronics</option>
                  <option selected><?php echo $type?></option>
                  </select> 
                  <input type="submit" name="submit" value="view by type">
           </div> 
                 
      <table style="margin-top: 120px;margin-bottom: 50px;" border='1'>
          <tr><th>ID</th><th>Name</th><th>Image</th><th>Cost</th><th>Description</th><th>Rating</th><th>Option</th></tr>
          
              <?php   
                   while ($row = mysql_fetch_object($result)) {
                ?>
          <tr>
              <td> <?php echo $row->idproducts; ?> </td>
              <td> <?php echo $row->name; ?><br><br>
                  <span style="color: brown;font-size: 70%">
                        <?php if($row->stock<20&&$row->stock!=1)
                         echo 'Low Stock';
                         ?>
                  </span>
                  <span style="color: darkgreen;font-size: 70%">
                        <?php if($row->stock>=20)
                         echo 'In Stock';
                         ?>
                  </span>
                  <span style="color: red;font-size: 70%">
                        <?php if($row->stock==1)
                         echo 'Out of Stock';
                         ?>
                  </span>
              </td>
              <td><img src="data:image/jpeg;base64,<?php echo base64_encode( $row->image ); ?>" style="width:50%;"/></td>
              <td><p> &#8377; <?php echo $row->cost; ?> </p></td>
              <td> <?php echo $row->description; ?> </td>
              <td> <?php echo $row->rating; ?> </td>
              <td><a href="cart.php?idproducts=<?php echo $row->idproducts; ?>&action=add ">Add to Cart</a></td>
          </tr> 
             
                   <?php } ?>
      
      </table>
       </form>    
    
</body>
</html>
<?php ob_end_flush(); ?>