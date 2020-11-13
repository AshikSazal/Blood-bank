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
  <link rel='stylesheet' href='style\admin_info.css'>
  <link rel="stylesheet" type="text/css" href="style/index_upper_footer.css">
  <script src='js/jquery.js'></script>
 </head>
 <body>

  <div>
    <?php upper($_SESSION['user_email'],$_SESSION['user_password']); ?>
  </div>

  <div class="container show-data">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8 col-md-8 col-sm-12">
        <table>
          <tr>
            <th>Name</th>
            <th>Password</th>
            <th>Update</th>
          </tr>
          <?php

            $conn = new mysqli('localhost','root','','blood_donation');
            $sql = "select * from admin_biodata";
            $result = mysqli_query($conn,$sql);
            if($result->num_rows>0){
              $row=$result->fetch_assoc();
                echo "<tr><td>".$row['NAME']."</td>".
                "<td>".$row['PASSWORD']."</td>
                <td>
                  <a style='font-size:25px;' href='admin_info_update.php?id=$row[id]&name=$row[NAME]&password=$row[PASSWORD]' >
                  <i class='fas fa-pen-alt'></i></a>
                </td>
                </tr>";
              
            }

          ?>
        </table>
      </div>
      <div class="col-lg-2"></div>
    </div>
    <div style="padding: 50px 0;">
      <a class='btn btn-info addItemBtn' href='admin.php'>Go Back</a>
    </div>
  </div>

  <div>
    <?php footer(); ?>
  </div>

 
 </body>
 </html>