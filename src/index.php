<?php
 ob_start();
 
 session_start();
 require_once 'Dbconnect.php';
 
 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: home.php");
  exit;
 }
 
 $error = false;
 
 if( isset($_POST['btn-login']) ) { 
  
  //prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs
  
  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  }
  
  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }
  
  // if there's no error, continue to login
  if (!$error) {
   
   $password = hash('sha256', $pass); // password hashing using SHA256
  
   $res=mysql_query("SELECT idshopping, userName, userPass FROM shopping WHERE userEmail='$email'");
   $row=mysql_fetch_array($res);
   $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( $count == 1 && $row['userPass']==$password ) {
    $_SESSION['user'] = $row['idshopping'];
    header("Location: home.php");
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
   }
    
  }
  
 }
?>
<!DOCTYPE html>
<?php
$profpic = "white-concrete-wall-texture-hd1.jpg";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online shopping</title>
<style>
  
    .login{ background-color: antiquewhite; border-color: black;border-style:solid; width: 35%;padding: 15px; position: absolute;top:100px;left:30%; }
    .text-danger{color:orangered;padding: 5px;}
    
     .button {
                border-style: solid;
                outline: none;
                border-color: black;
                border-radius: 3px;
                padding: 10px;
                font-size: 90%;
                font-weight: 400;
                text-align: center;
                letter-spacing: .1em;
                background: #1ab188;
                color: #ffffff;
                -webkit-transition: all 0.5s ease;
                transition: all 0.5s ease;
                -webkit-appearance: none;
              }
              .button:hover, .button:focus {
                background-color: darkkhaki;
              }
              input, textarea {
                font-size: 18px;
                display: block;
                width: 50%;
                height: 60%;
                padding: 5px 10px;
                background: none;
                background-image: none;
                border: 1px solid #a0b3b0;
                color: royalblue;
                border-radius: 0;
                -webkit-transition: border-color .25s ease, box-shadow .25s ease;
                transition: border-color .25s ease, box-shadow .25s ease;
              }
              </style>
</head>
<body>


    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    
        <h2 style="color:darkgreen;text-align: center;font-family: 'Georgia'">Online Shopping.</h2>
            <div class='login'>
             <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
             <span class="text-danger">*<?php echo $emailError; ?></span>
             <br><br>
            
            
             <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
             <span class="text-danger">*<?php echo $passError; ?></span>
             <br><br>
             <button type="submit" class="button" name="btn-login">Log In</button>
             <br><br>
            <span class="text-danger"><?php echo $errMSG; ?></span>
            <br>
            <p style="color: darkslategray">Don't Have an account create one now by clicking on Sign Up below and avail our facility</p>
             <a href="register.php" style="text-decoration: none;font-size: 150%;color: #1ab188 ">Sign Up For Free</a>
             <div class="forgot"> 
             <a href="forgot.php" >forgot password?</a>
             </div>
            
             </div>
        <p style="position: absolute; left: 20px; bottom: 20px;">&copy; 2017 subashkotha2@gmail.com</p>
        
    </form>
   
</body>
</html>
<?php ob_end_flush(); 


