<?php
session_start();
require_once 'index_upper_footer.php';
if(empty($_POST["blood_group"]) || empty($_POST["village"]) || empty($_POST["district"]) || empty($_POST["division"])){
  echo "<script>alert('Fill the form')</script>";
  echo("<script>location.href = 'search.php';</script>");
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel='stylesheet' href='style\bootstrap.min.css'>
  <script src='js\bootstrap.min.js' charset='utf-8'></script>
  <link rel='stylesheet' href='fontawesome\css\all.min.css'>
  <link rel='stylesheet' href='style\search_user.css'>
  <link rel="stylesheet" type="text/css" href="style/index_upper_footer.css">
  <script src='js/jquery.js'></script>
 </head>
 <body>

  <div>
    <?php upper($_SESSION['user_email'],$_SESSION['user_password']); ?>
  </div>

  <div class="container show-user">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-lg-10">
        <table>
          <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Blood group</th>
            <th>Phone</th>
            <th>Post code</th>
            <th>Village</th>
            <th>District</th>
            <th>Division</th>
            <th>E-Mail</th>
          </tr>
          <?php 

            $blood_groupErr=$villageErr=$districtErr=$divisionErr='';
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

              if(empty($_POST['blood_group'])){
                $blood_groupErr = 'Blood group required';
              }else{
                $blood_group = trim($_POST['blood_group']);
              }

              if(empty($_POST['district'])){
                $districtErr = "District is required";
              }else{
                $district = trim($_POST['district']);
              }

              if(empty($_POST['village'])){
                $villageErr = "Village is required";
              }else{
                $village = trim($_POST['village']);
              }

              if(empty($_POST['division'])){
                $divisionErr = "division is required";
              }else{
                $division = trim($_POST['division']);
              }

              $conn = new mysqli('localhost','root','','blood_donation');
              if(!empty($_POST["blood_group"]) && !empty($_POST["village"]) && !empty($_POST["district"]) && !empty($_POST["division"])){
                  $sql = "select * from user_biodata where blood_group='$blood_group'and village='$village' and district='$district' and division='$division'";
                  $result = mysqli_query($conn,$sql);
                  if ($result) {
                    if($result->num_rows>0){
                      while ($row=$result->fetch_assoc()) {
                        echo "<tr><td>".ucwords(strtolower($row['fname']))." ".ucwords(strtolower($row['lname']))."</td>".
                        "<td>".date_diff(date_create($row['dob']), date_create('today'))->y."</td>". // ->y convert to year
                        "<td>".ucwords(strtoupper($row['blood_group']))."</td>".
                        "<td>".$row['phone']."</td>".
                        "<td>".$row['postcode']."</td>".
                        "<td>".ucwords(strtolower($row['village']))."</td>".
                        "<td>".ucwords(strtolower($row['district']))."</td>".
                        "<td>".ucwords(strtolower($row['division']))."</td>".
                        "<td style='text-transform: none;'>".$row['email']."</td></tr>";
                      }
                    }else {
                    echo "<script>alert('Not found')</script>";
                    echo("<script>location.href = 'search.php';</script>");
                  }
                  }else {
                    echo "<script>alert('Not found')</script>";
                    echo("<script>location.href = 'search.php';</script>");
                  }
              }

            }

          ?>
        </table>
      </div>
      <div class="col-lg-1"></div>
    </div>
  </div>

  

  <div>
    <?php footer(); ?>
  </div>
 
 </body>
 </html>