<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 // select loggedin users detail
 $res=mysql_query("SELECT * FROM shopping WHERE idshopping=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
 
 $error = false; $errMSG="";
 $name=$userRow['userName'];
 $email=$userRow['userEmail'];
 $gender=$userRow['gender'];
 $account=$userRow['idshopping'];
 $date=$userRow['DOB'];
 $phone=$userRow['phone'];
 $address=$userRow['address'];
 $state=$userRow['state'];
 if ( isset($_POST['submitname']) ) { 
  
  // clean user inputs to prevent sql injections
  
  
  $newname = trim($_POST['newname']);
  $newname = strip_tags($newname);
  $newname = htmlspecialchars($newname);
  
  if (empty($newname)) {
   $error = true;
   $nameError = "Please enter your full name.";
  } else if (strlen($newname) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$newname)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
  }
     if( !$error )
         { 
                $query = "UPDATE shopping set userName='$newname' WHERE idshopping='$account'";
             
                $res = mysql_query($query);
    
                 if ($res) 
                {
                  
                 $errMSG = "Name change successful will be updated after redirecting..";
                 header('Refresh: 3; URL=http://localhost/shopping/home.php');
                }
                else
                { $errMSG = "Name change failed , try again later..."; }
         
         }
     
 }
 if ( isset($_POST['submitemail']) ) { 
  
  // clean user inputs to prevent sql injections
  
  
  $newemail = trim($_POST['newemail']);
  $newemail = strip_tags($newemail);
  $newemail = htmlspecialchars($newemail);
  
   if ( !filter_var($newemail,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check email exist or not
   $query = "SELECT userEmail FROM shopping WHERE userEmail='$newemail'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }
    if( !$error )
         { $errMSG="get ready";
                $query = "UPDATE shopping set userEmail='$newemail' WHERE idshopping=$account";
                $res = mysql_query($query);
                if ($res) 
                {
                  
                 $errMSG = "Email change successful will be updated after redirecting..";
                 header('Refresh: 3; URL=http://localhost/shopping/home.php');
                }
                else
                { $errMSG = "Email change failed , try again later..."; }
         
         }
}
 if ( isset($_POST['submitphone']) )
     {
  $newphone = trim($_POST['newphone']);
  $newphone = strip_tags($newphone);
  $newphone = htmlspecialchars($newphone);
   if (empty($newphone)) {
   $error = true;
   $phoneError = "Please enter your phone number.";
  } else if (!(strlen($newphone)==10) ){
   $error = true;
   $phoneError = "Phone must have 10 numbers.";
  } else if (!preg_match("/^[0-9]*$/",$newphone)) {
   $error = true;
  $phoneError = "Invalid phone number.";}
       if( !$error )
         { 
                $query = "UPDATE shopping set phone=$newphone WHERE idshopping='$account'";
             
                $res = mysql_query($query);
    
                 if ($res) 
                {
                  
                 $errMSG = "Phone number change successful will be updated after redirecting..";
                 header('Refresh: 3; URL=http://localhost/shopping/home.php');
                }
                else
                { $errMSG = "Phone change failed , try again later..."; }
         
         }
     
 }
 if ( isset($_POST['submitaddress']) )
    {
  $newaddress = trim($_POST['newaddress']);
  $newaddress = strip_tags($newaddress);
  $newaddress = htmlspecialchars($newaddress);
  
  $newstate = trim($_POST['newstate']);
  $newstate = strip_tags($newstate);
  $newstate = htmlspecialchars($newstate);
  
   if (empty($newaddress)) {
   $error = true;
   $addressError = "Please enter your Address.";
  } 
  
  if (empty($newstate)) {
   $error = true;
   $addressError = "Please enter your State.";
  } 
  
       if( !$error )
         { 
                $query = "UPDATE shopping set address='$newaddress',state='$newstate'  WHERE idshopping=$account";
               
                $res = mysql_query($query);
    
                 if ($res) 
                {
                  
                 $errMSG = "Address change successful will be updated after redirecting..";
                 header('Refresh: 3; URL=http://localhost/shopping/home.php');
                }
                else
                { $errMSG = "Address change failed , try again later..."; }
         
         }
    }       
 
 ?>
 <!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Account Details</title>
    <style>
    .tranfer{ position: absolute;top:50px; left: 40px;text-align: left;font-family: "Verdana";background-color: lightgray; padding: 10px; border-style: solid;border-color:black;}
    .tranfer ul{list-style-type: none;float: left;}
    .tranfer li{font-family: "Acid"; font-size: 160%; color: mediumvioletred;text-align: left;}
    .tranfer h2{font-family: "Trebuchet MS";color: darkblue;}
    .change{ position: absolute;top:340px; left: 40px;text-align: left; }
    .change ul{list-style-type: none;float: left;}
    .change li{font-family: Georgia;color: #1ab188; font-size: 120%}
    .change h3{font-family: "Trebuchet MS";color: darkblue; margin-left: 100px;}
    .error{color: red; font-size: 100%;padding: 20px;}
    a{ text-decoration: none; float: right; color: teal; font-family: 'Verdana' ;padding: 11px;font-size: 150%}
    a:hover{color:red;}
    input{-webkit-transition: border-color .25s ease, box-shadow .25s ease;
                transition: border-color .25s ease, box-shadow .25s ease;
                font-size: 18px;
                display: inline-block;
                border-radius: 2px;
                padding: 4px;
         }
     input:hover{border-color: black;}
    </style>
</head>
<body>
    

<a href="home.php">Home</a>

<div class="tranfer">
    <h2>Your Account Details:</h2>
<table>
    <tr><th>Account  </th><td>: <?php echo $account; ?></td></tr>
    <tr><th>Email ID </th><td>: <?php echo $email; ?></td></tr>
    <tr><th>Full Name  </th><td>: <?php echo $name; ?></td></tr>
    <tr><th>Gender </th><td>: <?php echo $gender; ?></td></tr>
    <tr><th>Date-of-birth  </th><td>: <?php echo $date; ?></td></tr>
    <tr><th>Phone  </th><td>: <?php echo $phone; ?></td></tr>
    <tr><th>Address  </th><td>: <?php echo $address; ?></td></tr>
    <tr><th>State  </th><td>: <?php echo $state; ?></td></tr>
</table>
</div>    
     
     
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
      <div class="change"> 
          <h3>Edit Account Details</h3>
        <ul>
            <li>New Name : <input type="text" name="newname" placeholder="Your Name"> <input type="submit" name="submitname" value="change"> </li>
            <span class="error"><?php echo $nameError;?></span><br>
            <li>Email ID &nbsp;&nbsp;: <input type="text" name="newemail" placeholder="Your Email"> <input type="submit" name="submitemail" value="change"> </li>
            <span class="error"><?php echo $emailError;?></span><br>
            <li>Phone &nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="newphone" placeholder="Phone"> <input type="submit" name="submitphone" value="change"> </li>
            <span class="error"><?php echo $phoneError;?></span><br>
            <li>Address &nbsp;&nbsp;: <input type="text" name="newaddress" placeholder="Address" value="<?php echo $newaddress;?>"> State : 
                <select size="1" name="newstate" > <br>
                      <option value="">none</option>
                      <option value="Andhra Pradesh">AndhraPradesh</option>
                    <option>Telangana</option>
                    <option>Tamilnadu</option>
                    <option>kerala</option>
                    <option>karnataka</option>
                    <option>Delhi</option>
                    <option>Goa</option>
                    <option>Maharastra</option>
                    <option>Gujarath</option>
                 </select>
                <input type="submit" name="submitaddress" value="change Address"> </li>
                <span class="error"><?php echo $addressError;?></span>
        </ul>     

        </div>
     <span style="left: 70px;position:absolute;bottom: 70px;color: darkslateblue;font-family: 'Acid';font-size: 200%"><?php echo $errMSG;?></span>
  </form> 
</body>
</html>