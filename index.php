<?php 
session_start();
if(!isset($_SESSION['user_email'])){
  $_SESSION['user_email'] ='';
  $_SESSION['user_password']='';
}
require_once 'index_upper_footer.php';
 ?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel='stylesheet' href='style\bootstrap.min.css'>
  <script src='js\bootstrap.min.js' charset='utf-8'></script>
  <link rel='stylesheet' href='fontawesome\css\all.min.css'>
  <link rel='stylesheet' href='style\index.css'>
  <link rel="stylesheet" type="text/css" href="style/index_upper_footer.css">
  <script src='js/jquery.js'></script>
</head>
<body>

  <div>
    <?php upper($_SESSION['user_email'],$_SESSION['user_password']); ?>
  </div>

  <div class='blood-image'>
    <img src='image/blood.jpg' class='image'>
    <img src='image/blood2.jpg' class='image'>
  </div>

  <div>
    <?php footer(); ?>
  </div>

  

  <div>
    <?php sign_in(); ?>
  </div>

<script type='text/javascript'>

    document.getElementById('button').addEventListener('click', function() {
      document.querySelector('.sign-in').style.display = 'flex';  // show the pop up window
      $('body').css('overflow', 'hidden');  // stop scrolling backgroud

  });

    document.querySelector('.close').addEventListener('click', function() {
      document.querySelector('.sign-in').style.display = 'none';  // for remove pop up window
      $('body').css('overflow', ''); // start scrolling after remove the pop up window
  });
  
</script>

</body>
</html>
