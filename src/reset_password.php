<?php 
require 'Dbconnect.php';
session_start();
$errMSG='';
    $email = trim($_GET['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
  
    if($email!=NULL)
    {    
      $res=mysql_query("SELECT userName,phone FROM shopping WHERE userEmail='$email'");
      $row=mysql_fetch_array($res);
      $count = mysql_num_rows($res);
       $name = $row['userName'];
       $phone = $row['phone'];
    }
   
      
      if ( isset($_POST['submit']) )
      {
      $password = trim($_POST['password']);
      $password = strip_tags($password);
      $password = htmlspecialchars($password); 
      
      $phone = trim($_POST['phone']);
      $phone = strip_tags($phone);
      $phone = htmlspecialchars($phone);
      
      $confirm = trim($_POST['confirm']);
      $confirm = strip_tags($confirm);
      $confirm = htmlspecialchars($confirm);
      
        if(strlen($password) < 6) {
          $error = true;
          $passwordError = "Password must have atleast 6 characters.";
         }

       if(strlen($confirm) < 6) {
          $error = true;
          $confirmError = "Confirm Password must have atleast 6 characters.";
         }
         if(!$error)
         {
                if($confirm==$password)
                {     $pass = hash('sha256', $password);
                      $errMSG=$phone;
                      $query = "UPDATE shopping set userPass='$pass' WHERE phone='$phone'";
             
                      $res = mysql_query($query);
    
                        if ($res) 
                       {

                        $errMSG = "Password reset successful redirecting in 3 seconds ....";
                        header('Refresh: 3; URL=http://localhost/shopping/index.php');
                       }
                       else
                       { $errMSG = "Password Reset failed , try again later..."; }
                }

                else{   $errMSG="Passwords do not Match"; }
         }
      }
 
  ?>
  <!DOCTYPE html>
<html>
<head>
  <title>Reset Password</title>
  <style>
      .reset{position: absolute;top:200px; left: 120px;text-align: left;font-family: "Verdana";background-color: antiquewhite; padding: 10px; border-style: solid;border-color:black;}
      .reset tr{ font-size: 150%; font-family: 'Futura' ;color: #1ab188; padding: 6px;}
      .reset input{font-size: 120%;padding: 6px;}
      .error{color: red; font-size: 75%;padding: 20px;}
    h1{ color: darkgreen;text-align: center; font-family:"Times New Roman"; }
    h2{ color: tomato;position: absolute;top: 100px;left: 120px; font-family:"Times New Roman"; }
    .button{ padding: 10px; background-color: tomato; color: white;border-color:black;border-style: solid; }
    .button:hover{ background-color: slateblue; color: white;border-color:black;border-style: solid;}
    .a:hover{ color: activecaption;}
  </style>
</head>

<body>
   <h1>Lorem online shopping.</h1>
    <h2>Reset password</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
     <table class='reset'>
            
            <tr>
                <th>Enter New Password :</th><td><input type="password" required autocomplete="off" name="password"/>*<span class="error"><?php echo $passwordError;?></span></td>
            </tr><tr>   
                <th>confirm New Password :</th><td><input type="password" required autocomplete="off" name="confirm"/>*<span class="error"><?php echo $confirmError;?></span></td>
            </tr>
            <tr><td style="padding:5px; float: left;"> <button type="submit" class="button" name="submit">Change password</button></td></tr>
        </table>  
        <input type="hidden" name="phone" value="<?php echo $phone ?>">
    
    </form>
         
   <a href='index.php' style="color: sienna;text-decoration: none;font-size: 150%;position: absolute;top: 30px;right: 30px;font-family: 'Trubuchet MS'">Sign In</a>
     <span style="left: 70px;position:absolute;bottom: 70px;color: darkslateblue;font-family: 'Acid';font-size: 200% " ><?php echo $errMSG;?></span>
    
</body>
</html>

