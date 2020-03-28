<?php
ob_start();
session_start();
require_once 'dbconnect.php';
if ( isset($_SESSION['user' ])!="" ) {
 header("Location: home.php");
 exit;
}

$error = false;

if( isset($_POST['btn-login']) ) {

 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST[ 'pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);

 if(empty($email)){
  $error = true;
  $emailError = "Invalid";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Enter Email";
 }

 if (empty($pass)){
  $error = true;
  $passError = "Invalid" ;
 }
 if (!$error) { 
  $password = hash( 'sha256', $pass);
  $res=mysqli_query($conn, "SELECT * FROM users WHERE userEmail='$email'" );
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  $count = mysqli_num_rows($res);
  if( $count == 1 && $row['userPass']==$password ) {
   if($row['status'] == "admin"){
  $_SESSION['admin'] = $row['userId'];
  header("Location: admin.php");
   } else {
    $_SESSION['user'] = $row['userId'];
    header( "Location: home.php");
   }
  } else {
   $errMSG = "<p id='wrong'>Incorrect Credentials, Try again...</p>" ;
  }
 
 }

}
?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome!</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
</head>
<body style="background-color: gold;">
<div class='container'>
<div id='lg_con'>
   <form  method="post" class='lg_form' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete= "off">   
            <h1 style="color:dodgerblue;" align='center'>Welcome, please login!</h1><br>            
            <?php
                if (isset($errMSG) ) {
                   echo  $errMSG; 
            ?>            
 <?php
  }
 ?>          
         <input  type="email" name="email"  class="form-control box" placeholder= "Enter Email..."  value="<?php echo $email; ?>"  maxlength="40"/>
         <span class="i_err" ><?php  echo $emailError; ?></span><br>         
         <input  type="password" name="pass"  class="form-control box" placeholder ="Enter Password..." maxlength="20"/>         
         <span  class="i_err"><?php  echo $passError; ?></span><br>
         <button  id="i_login" type="submit" name= "btn-login">Login</button>
         <button style="background-color:lightgreen;" id="reg"><a id="i_register" href="register.php">Register</a></button>    
   </form>
</div>
</div>
</body>

</html>
<?php ob_end_flush(); ?>