<?php 
/* Reset your password form, sends reset.php password link */
require 'Dbconnect.php';
session_start();
$errMSG="";
//Check if form submitted with method="post"
if ( isset($_POST['submit']) ) 
{   
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
    
      $res=mysql_query("SELECT userName FROM shopping WHERE userEmail='$email'");
      $row=mysql_fetch_array($res);
      $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
   
      if($count == 1) 
      {
          $name = $row['userName'];
          
          $errMSG = "<p>Please check your email <span>$email</span>"
        . " for a confirmation link to complete your password reset!</p>";
        $from = "subash.kotha2@gmail.com";  
        $to      = $email;
        $subject = 'Password Reset Link ( Lorem shopping )';
        $message_body = "Hello ".$name.",

        You have requested password reset!
        If you haven't requested please contact us 
        Please click this link to reset your password:
        
        http://localhost/shopping/reset_password.php?email=".$email;
          
        
        mail($to, $subject, $message_body);

      }
      else
      { $errMSG="NO Account exists with that E mail address"; }
 } 

?>
<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
  <style> .reset{margin: auto;margin-top: 60px;border-radius: 5px; background-color: #f2f2f2;width: 20%;border:2px solid black; padding: 20px; text-align: center;}
          .reset h2{ color: #4CAF50;align-items: center; }
            button[type=submit] {

                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            h1{text-align: center;font-family: 'Trebuchet MS';color: darkgreen;}
            button[type=submit]:hover {
                background-color: darkgreen;
            }
            input[type=email], select {
    
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
             }
              a{text-decoration: none; float: right; color: teal; font-family: 'Verdana' ;padding: 11px;font-size: 150%}
              a:hover{color:red;}
  </style>
</head>

<body>
    <a href="home.php">Home</a>
   
   <div class="reset">
 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
     <h2>Forgot Password</h2>
      
     <input type="email" required autocomplete="off" placeholder="your email address " name="email"/>
     <br><br>
    <button type="submit" class="button" name="submit">Reset my password</button>
    </form>
   </div>
     <span style="left: 70px;position:absolute;bottom: 70px;color: darkslateblue;font-family: 'Trebuchet MS';font-size: 150%"><?php echo $errMSG;?></span>
    

</body>

</html>
