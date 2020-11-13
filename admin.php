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
  <link rel='stylesheet' href='style\admin.css'>
  <link rel="stylesheet" type="text/css" href="style/index_upper_footer.css">
  <script src='js/jquery.js'></script>
 </head>
 <body>

  <div>
    <?php upper($_SESSION['user_email'],$_SESSION['user_password']); ?>
  </div>

  <div class="admin-panel">
    <div class="container">
      <div class="control-panel">
        <h1>ADMIN PANEL</h1>
      </div>
      <div class="row database">
        <div class="col-lg-4 col-md-4 col-sm-12">
          <a class="btn btn-dark" href="show_all_user.php">SHOW ALL USER</a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <a class="btn btn-dark" href="show_all_requested_user.php">SHOW REQUESTED USER</a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <a class="btn btn-dark" href="admin_info.php">ADMIN INFORMATION</a>
        </div>
      </div>
    </div>
  </div>

  

  <div>
    <?php footer(); ?>
  </div>
 
 </body>
 </html>