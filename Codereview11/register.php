<?php
ob_start();
session_start();
if( isset($_SESSION['user'])!="" ){
 header("Location: home.php" ); 
}
include_once 'dbconnect.php';
$error = false;
if ( isset($_POST['btn-signup']) ) {
 $name = trim($_POST['name']);

  $name = strip_tags($name);


  $name = htmlspecialchars($name);
 $email = trim($_POST[ 'email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);

 if (empty($name)) {
  $error = true ;
  $nameError = "Error";
 } else if (strlen($name) < 1) {
  $error = true;
  $nameError = "Name too short";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
  $error = true ;
  $nameError = "Error";
 }
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address." ;
 } else {
  $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }
  if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
 } else if(strlen($pass) < 3) {
  $error = true;
  $passError = "Password too short" ;
 }
$password = hash('sha256' , $pass);
 if( !$error ) {
 
  $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
  $res = mysqli_query($conn, $query);
 
  if ($res) {
   $errTyp = "success";
   $errMSG = "Success!";
   unset($name);
   unset($email);
   unset($pass);
  } else  {
   $errTyp = "danger";
   $errMSG = "Error, try again!" ;
  }
 }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Add Member!<?php echo $title; ?></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
</head>
<body style="background-color: gold;">
   <form method="post" id='fone' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  autocomplete="off" > 
            <h2 style="color:dodgerblue;" align='center'>Add new Member</h2>        
<?php
   if ( isset($errMSG) ) {
 
   ?>
<div  class="alert alert-<?php echo $errTyp ?>" >
                         <?php echo  $errMSG; ?>
</div>

<?php
  }
  ?>        

<input type ="text"  name="name"  class ="form-control"  placeholder ="Add Name" maxlength ="50"   value = "<?php echo $name ?>"  />
   <span   class = "text-danger" > <?php   echo  $nameError; ?> </span >
         
   <input   type = "email"   name = "email"   class = "form-control"   placeholder = "Add Email"   id='email'  maxlength = "40"     />  
   <span   class = "text-danger" > <?php   echo  $emailError; ?> </span >
      <span id='email_result'></span>
                             
   <input  type = "password"   name = "pass"  id='pass' class = "form-control"   placeholder = "Add new Password" maxlength = "15" />

   <input  type = "password" name = "passVerif" id='passVerif' class = "form-control" placeholder = "Confirm Password" maxlength = "15"/>

   <span class = "text-danger" > <?php   echo  $passError; ?> </span >

   <span id='password'></span>

   <button   type = "submit" class = "btn btn-block btn-primary" name = "btn-signup" >Add new member</button >
         
            <a style="background-color:lightgreen;"  href = "index.php">Return to Login</a>
   </form >
</body >
<script>  
$(document).ready(function(){
        $('#email').keyup(function(){
            var email = $(this).val();
            if(email != '')
            {
                $.ajax({
                    url:"dbfunctions.php",
                    method:"POST",
                    data:{email:email},
                    success:function(data){
                        $('#email_result').html(data);
                    }
                });
            }
        });
        $('#passVerif').keyup(function(){
            var passVerif = $(this).val();
            var password = $('#pass').val();
            if(passVerif !== '' && password !== '')
            {
                $.ajax({
                    url:"password.php",
                    method:"POST",
                    data:{pass:password, passVerif:passVerif},
                    success:function(response){
                        $('#password').html(response);
                    }
                });
            }
        });
    
    });

</script>


 </script>  
</html >
<?php  ob_end_flush(); ?>