<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if( !isset($_SESSION['user' ]) ) {
 header("Location: index.php");
 exit;
}
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

$result2=mysqli_query($conn, "SELECT * FROM animal WHERE age > 7");

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome to our Seniors Feed <?php echo $userRow['userName']; ?></title>
<style>
  body{
    background-color: gold;
  }
    #content{
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }
    .card{
        margin-bottom: 20px;
        }
    
</style>
</head>
<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a style="color:blue;"class="navbar-brand">Welcome to CR11!</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a style="color:dodgerblue;"class="nav-link" href="home.php">All Animals<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a style="color:indianred;" class="nav-link" href="senior.php">Senior Animals</a>
      </li>
      <li class="nav-item">
        <a style="color: dodgerblue;"class="nav-link" href="general.php">Junior Animals</a>
      </li>
    </ul>
    <form id='formData' class="form-inline my-2 my-lg-0">
            <input id='use' class="form-control mr-sm-2" type="search" placeholder="Search..." name="search">
     </form>
     <a  href="logout.php?logout">Sign Out</a> 
  </div>
</nav>
            <h2 style="color:dodgerblue;" align='center'>Our Seniors (Over 8 years old)</h2>
        <div id='content'>
        <?php 
          while ($row = $result2->fetch_assoc()){  
          ?>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?php echo $row['img']; ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['name' ]; ?></h5>
                <p class="card-text"><?php echo "<b> Description:</b>" .  "<br>" .$row['description']; ?></p>
                <p class="card-text"><?php echo "<b>Age:</b> " .  " " .$row['age']; ?></p>
                <p class="card-text"><?php echo "<b>Website:</b>  " .  " " .$row['Website']; ?></p>
                <p class="card-text"><?php echo "<b>Adoption Ready by:</b>  " .  " " .$row['adoption_ready_date']; ?></p>
                <p class="card-text d-none"><?php echo "<b>Type:</b>  " .  " " .$row['type']; ?></p>
            </div>
        </div>
        <?php } ?>
<!-- break -->          
        </div>
        
    </div
<script></script>
<script>
var request;
$("#use").keyup(function(event){
  event.preventDefault();
  if (request) {
    request.abort();
  }
  var $form = $(this);
  var $inputs = $form.find("input, select, button, textarea");
  var serializedData = $form.serialize();
  $inputs.prop("disabled", true);
  request = $.ajax({
    url: "search.php",
    type: "post",
    data: serializedData
  });
  request.done(function (response, textStatus, jqXHR){
   document.getElementById('content').innerHTML = response;
  });
  request.fail(function (jqXHR, textStatus, errorThrown){
    console.error(
      "The following error occurred: "+
      textStatus, errorThrown
    );
  });
  request.always(function () {
    $inputs.prop("disabled", false);
  });
});
</script>
</body>
</html>
<?php ob_end_flush(); ?>