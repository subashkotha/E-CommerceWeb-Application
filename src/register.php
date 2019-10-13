<?php
 ob_start();
 session_start();
 if( isset($_SESSION['user'])!="" ){
  header("Location: home.php");
 }
 include_once 'Dbconnect.php';

 $error = false;

 if ( isset($_POST['submit']) ) {
  
  // clean user inputs to prevent sql injections
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  $gender = trim($_POST['gender']);
  $gender = strip_tags($gender);
  $gender = htmlspecialchars($gender);
  
  $phone = trim($_POST['phone']);
  $phone = strip_tags($phone);
  $phone = htmlspecialchars($phone);
  
  $state = trim($_POST['state']);
  $state = strip_tags($state);
  $state = htmlspecialchars($state);
  
  $address = trim($_POST['address']);
  $address = strip_tags($address);
  $address = htmlspecialchars($address);
  
  $date = trim($_POST['date']);
  $date= strip_tags($date);
  $date = htmlspecialchars($date);
  
  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
  }
  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check email exist or not
   $query = "SELECT userEmail FROM shopping WHERE userEmail='$email'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }
  
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
  
  if (empty($phone)) {
   $error = true;
   $phoneError = "Please enter your phone number.";
  } else if (strlen($phone) < 10) {
   $error = true;
   $phoneError = "Phone must have atleat 10 characters.";
  } else if (!preg_match("/^[0-9]*$/",$phone)) {
   $error = true;
   $phoneError = "Invalid phone number.";
  }
  $curdate = '2017-5-11';

        if($curdate < $date)
        {
           $error = true;
           $phoneError = "Invalid date.";
        }

  if( !$error ) {
   
     $query = "INSERT INTO shopping(userName,userEmail,userPass,gender,phone,address,state,DOB) VALUES('$name','$email','$password','$gender','$phone','$address','$state','$date')";
     $res = mysql_query($query);
                if ($res) {
            $errTyp = "success";
            $errMSG = "Successfully registered, you may login now";
            unset($name);
            unset($email);
            unset($pass);

            unset($gender);
               header('Refresh: 2; URL=http://localhost/shopping/index.php');
           } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later..."; 
           }       
     
  }
  
  
 }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
<style>
    .error{color: red; font-size: 75%;padding: 20px;}
    .sign{ width: 50%;position: absolute;top:70px; left: 90px;text-align: left;font-family: "Verdana";background-color: wheat; padding: 10px; border-style: solid;border-color:black;}
    
    h2{color:darkgreen; margin-left: 90px;}
    a:hover{color:tomato;}
    input, textarea {
                font-size: 18px;
                display: inline-block;
                align-items: right;
                padding: 5px ;
                
                border: 1px solid #a0b3b0;
                color: lightslategrey;
                border-radius: 3px;
                -webkit-transition: border-color .25s ease, box-shadow .25s ease;
                transition: border-color .25s ease, box-shadow .25s ease;
              }
      input:hover{border-color: black; color: orangered; border-style: solid;}
      
</style>
</head>
<body>


        
        <h2 class="">Please enter the following details.</h2>
          
            
        <div class="sign">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
      
      <table>
          <tr>
          <th>Full Name : </th>
          <td><input type="text" name="name" value="<?php echo $name;?>" placeholder="Full Name">*
              <span class="error"><?php echo $nameError;?></span></td>
          
          </tr>
          <tr>
          <th>Email ID : </th>
          <td><input type="text" name="email" value="<?php echo $email;?>" placeholder="Mail ID">*
            <span class="error"> <?php echo $emailError;?></span></td>
          </tr>
          <tr>
          <th>Password : </th>
          <td><input type="password" name="pass" placeholder="Password" >*
              <span class="error"> <?php echo $passError;?></span></td>
          </tr>
          
          <tr>
              <th>Gender : </th>
              <td><input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
                    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
                    <span class="error"> <?php echo $genderErr;?></span>
              </td>
          </tr>
          <tr>
              <th>Date-of-birth : </th>
              <td><input type="date" name="date"  placeholder="Date of birth">
              <span class="error"><?php echo $dateError;?></td>
          </tr>
          <tr>
              <th>Phone : </th>
              <td><input type="text" name="phone" value="<?php echo $phone;?>" placeholder="Phone Number">*
              <span class="error"><?php echo $phoneError;?></td>
          </tr>
          <tr>
              <th>Address : </th>
              <td><input type="text" name="address" value="<?php echo $address;?>" placeholder="Address">
              
          </tr>
          <tr>
              <th>State : </th>
              <td><select size="1" name="state" > <br>
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
                 </select></td>
          </tr>
      </table>
          <?php echo $date;?>
  <input type="submit" name="submit" value="Submit"> 
</form>
        <p><span style="color: black; font-size: 75%;padding: 20px;">* required field.</span></p>
        </div>
        <a href="index.php" style="text-decoration: none;color: darkgreen; position: absolute;top: 10px;font-size: 160%;right: 40px;">Sign In</a>
       <span style="right: 20px;position:absolute;bottom: 130px;color: darkslateblue;font-family: 'Acid';font-size: 200%"><?php echo $errMSG;?></span>

</body>
</html>
<?php ob_end_flush(); ?>