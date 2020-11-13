<?php
session_start();
require_once 'index_upper_footer.php';
if($_SESSION['user_email']==''){
    echo "<script>alert('Create an account then Log in')</script>";
    echo("<script>location.href = 'index.php';</script>");
 }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel='stylesheet' href='style\bootstrap.min.css'>
  <script src='js\bootstrap.min.js' charset='utf-8'></script>
  <link rel='stylesheet' href='fontawesome\css\all.min.css'>
  <link rel='stylesheet' href='style\search.css'>
  <link rel="stylesheet" type="text/css" href="style/index_upper_footer.css">
  <script src='js/jquery.js'></script>
 </head>
 <body>


  <div>
    <?php upper($_SESSION['user_email'],$_SESSION['user_password']); ?>
  </div> 

  <div class="container registration">
    <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6 input-form">
        <form method="post" action="search_user.php">

          <label class="blood_group" style="padding-left: 10px;">Choose a group:</label>
          <select class="blood_group" style="padding-left: 30px;" name="blood_group">
            <option value="">Select blood group</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
          </select><br><br>

          <input class="vill-dis" type="text" name="village" value="" placeholder="Village">
          <input class="vill-dis" type="text" name="district" value="" placeholder="District"><br><br>

          <input class="division" type="text" name="division" value="" placeholder="division"><br><br>

          <button class="btn btn-dark" id="search" name='submit' value='sub' style="border-radius: 80px;">Search</button>
        </form>
      </div>
      <div class="col-lg-3"></div>
    </div>
  </div>  

  <div>
    <?php footer(); ?>
  </div>
 
 </body>
 </html>