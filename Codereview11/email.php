<?php
error_reporting( ~E_DEPRECATED & ~E_NOTICE );


define ('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define ('DBNAME', 'ex_day5');

$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);


if  ( !$conn ) {
 die("Connection failed : " . mysqli_error());
}
  
  
      function check_email_avalibility()  
      {  
           if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  
           {  
            echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Email is invalid</span></label>';  
           }  
           elseif(is_email_available($_POST["email"])) {
            echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Email Available</label>';
            } else {
            echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Email Already register</label>';
        }
    }
        function is_email_available($email){
        $serri = "SELECT * FROM `users` WHERE userEmail='$email'";
        global $conn;
         $sql =   mysqli_query($conn, $serri);
        if($sql->num_rows == 0) {
                    return true;
                } else {
                            return false;
                        }
                    }
        function password_check() {  
           $pass = $_POST["pass"]; 
           $passVerif= $_POST["passVerif"]; 
        
            if($pass == $passVerif){
                echo '<label class="text-success"><span class="glyphicon glyphicon-remove"></span> Passwords match</label>';
            } else {
                echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Passwords not match</label>';
            }
        }

            ?>