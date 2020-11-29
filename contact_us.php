<?php
session_start();
require_once 'index_upper_footer.php';
 ?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel='stylesheet' href='style\bootstrap.min.css'>
  <script src='js\bootstrap.min.js' charset='utf-8'></script>
  <link rel='stylesheet' href='fontawesome\css\all.min.css'>
  <link rel='stylesheet' href='style\registration.css'>
  <link rel="stylesheet" type="text/css" href="style/index_upper_footer.css">
  <script src='js/jquery.js'></script>
</head>
<body>

  <div>
    <?php upper($_SESSION['user_email'],$_SESSION['user_password']); ?>
  </div>

  <div class="container" style="margin: 100px 0 100px 100px;">
    <div class="row">
        <div class="col-lg-12">
            <p><h3 style="font-family: Arial, Helvetica Neue;">The public health crisis and events across the country to impact the blodd supply. If you're healthy and able to visit a donor center or blood drive we are urging you to make and immediate appointment to help keep the blood supply strong.</h3></p>
            <p><h3 style="font-family: Arial, Helvetica Neue;">If an emmergency contact us <h1 style="color: brown;">01789*****</h1><h1 style="color: DarkCyan; font-family: Arial, Helvetica Neue;"> We provide service 24Hours.</h1></h3></p>
        </div>
    </div>
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
