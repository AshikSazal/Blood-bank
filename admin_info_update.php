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
  <link rel='stylesheet' href='style\admin_info_update.css'>
  <link rel="stylesheet" type="text/css" href="style/index_upper_footer.css">
  <script src='js/jquery.js'></script>
 </head>
 <body>

  <?php

    error_reporting();


    $u_id = trim($_GET['id']);
    $u_name = trim($_GET['name']);
    $u_password = trim($_GET['password']);
    $updateErr = '';

    if (isset($_GET['submit'])) {
      $id = trim($_GET['i_id']);
      $name = trim($_GET['i_name']);
      $password = trim($_GET['i_password']);

      $conn = new mysqli('localhost','root','','blood_donation');
      if($name!='' && $password!=''){
        $sql = "update admin_biodata set name='$name',password='$password' where id='$id'";
        $_SESSION['username'] = $name;
        $_SESSION['logout'] = $password;
        $data=mysqli_query($conn,$sql);
        if($data){
          header('location: admin_info.php');
        }else {
          $updateErr = "Failed to update";
        }
      }else {
        $updateErr = "Failed to update";
      }



      $conn->close();
    }


   ?>

  <div>
    <?php upper($_SESSION['user_email'],$_SESSION['user_password']); ?>
  </div>

  <div class="container" style="padding: 6.25rem 0;">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-0"></div>
      <div class="col-lg-6 col-md-6 col-sm-12 update">
        <form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
          <input value="<?php echo $u_id ?>" type="text" name="i_id" style="display: none;">
          <input value="<?php echo $u_name ?>" type="text" name="i_name" placeholder="Name"><br><br>
          <input value="<?php echo $u_password ?>" type="text" name="i_password" placeholder="Password"><br>
          <span> <?php echo $updateErr;?></span><br>
          <input class="submit" type="submit" name="submit" value="UPDATE"><br><br><br><br>
            <a class='btn btn-info addItemBtn' href='admin.php'>Go Back</a>
        </form>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-0"></div>
    </div>
  </div>

  

  <div>
    <?php footer(); ?>
  </div>
 
 </body>
 </html>