<?php
 ob_start();
 session_start();
 require_once 'Dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 // select loggedin users detail
 $res=mysql_query("SELECT * FROM shopping WHERE idshopping=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
 
 $error = false; $errMSG="";
 $donar=$userRow['userName'];
 
 if ( isset($_POST['change']) ) { 
  
  // clean user inputs to prevent sql injections
  
  
  $old = trim($_POST['old']);
  $old = strip_tags($old);
  $old = htmlspecialchars($old);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  $confirm = trim($_POST['confirm']);
  $confirm = strip_tags($confirm);
  $confirm = htmlspecialchars($confirm);
  
  if (empty($pass)){
   $error = true;
   $passError = "Please enter new password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }
  
  if (empty($old)){
   $error = true;
   $oldError = "Please enter old password.";
  } else if(strlen($old) < 6) {
   $error = true;
   $oldError = "Password must have atleast 6 characters.";
  }
  if (empty($confirm)){
   $error = true;
   $confirmError = "Please confirm new password.";
  } else if(strlen($confirm) < 6) {
   $error = true;
   $confirmError = "Password must have atleast 6 characters.";
  }
  
  // password encrypt using SHA256();
    $password = hash('sha256', $old);
    $newpassword = hash('sha256', $pass);
    if( !$error ) {
        
        if($confirm==$pass)
        {   
            $res=mysql_query("SELECT userPass FROM shopping WHERE userName='$donar'");
            $row=mysql_fetch_array($res);
            $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
   
            if( $count == 1 && $row['userPass']==$password ) 
            {
             
                $query = "UPDATE shopping set userPass='$newpassword' WHERE userName='$donar'";
             
                $res = mysql_query($query);
    
                 if ($res) 
                {
                  
                 $errMSG = "Password change successful redirecting in 3 seconds ....";
                 header('Refresh: 3; URL=http://localhost/shopping/home.php');
                }
                else
                { $errMSG = "password change failed , try again later..."; }
            }  
            else
            {
               $errMSG="Incorrect curent password , please type existing account password"; 
            }
            
        }
        else 
        {
            $errMSG="New Password fields are not Matched";
        }
        
    }
  
  
  
 }
 ?>
 <!DOCTYPE html>
<html>
<head>
<style type="text/css">
    .tranfer{ position: absolute;top:200px; left: 120px;text-align: left;font-family: "Verdana";background-color: wheat; padding: 10px; border-style: solid;border-color:black;}
    .error{color: red; font-size: 75%;padding: 20px;}
      a{ text-decoration: none; float: right; color: teal; font-family: 'Verdana' ;padding: 11px; font-size: 150%;}
    a:hover{color:goldenrod;}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Password Change</title>
</head>
<body>
     <span style="left: 70px;position:absolute;top: 70px;color: darkcyan;font-family: 'Acid';font-size:230%">You are about to change Password  <?php echo $userRow['userName']; ?></span>
       
      <a href="home.php">Home</a>
     
      <div class="tranfer">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  
   Current password : <input type="password" name="old" >
  <span class="error">* <?php echo $oldError;?></span>
  <br><br>
  
   New Password: <input type="password" name="pass" >
   <span class="error">* <?php echo $passError;?></span>
   <br><br>
  
   Confirm New Password: <input type="password" name="confirm" >
  <span class="error">*<?php echo $confirmError;?></span>
  <br><br>
     
  <input type="submit" name="change" value="change">  
</form>
       </div> 
      
      
      <span style="left: 70px;position:absolute;bottom: 100px;color: darkslateblue;font-family: 'Acid';font-size: 200%"><?php echo $errMSG;?></span>
    
</body>
</html>