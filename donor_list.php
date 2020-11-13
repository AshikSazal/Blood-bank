<?php
session_start();
require_once 'index_upper_footer.php';
if($_SESSION['user_email']==''){
    echo "<script>alert('Create an account then Log in')</script>";
 }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel='stylesheet' href='style\bootstrap.min.css'>
  <script src='js\bootstrap.min.js' charset='utf-8'></script>
  <link rel='stylesheet' href='fontawesome\css\all.min.css'>
  <link rel='stylesheet' href='style\donor_list.css'>
  <link rel="stylesheet" type="text/css" href="style/index_upper_footer.css">
  <script src='js/jquery.js'></script>
 </head>
 <body>

  <div>
    <?php upper($_SESSION['user_email'],$_SESSION['user_password']); ?>
  </div>

  <div class="container show-user">
  	<div class="row">
  		<div class="col-lg-2"></div>
  		<div class="col-lg-8">
  			<div class="user-search">
  				<ul>
  					<form action="donor_list.php" method="post">
  						<li class="user-search2">
  							<input class="user-search" type="text" name="village" placeholder="Village">
  						</li>
  						<li class="user-search2">
  							<input class="user-search" type="text" name="district" placeholder="District">
  						</li>
  						<li>
  							<button class="btn btn-dark" name='submit' value='sub'><i class="fas fa-search"></i></button>
  						</li>
  					</form>
  				</ul>
  			</div>
  			<table>
  				<tr>
  					<th>Name</th>
  					<th>Village</th>
  					<th>District</th>
  					<th>Division</th>
  					<th>Blood group</th>
  					<th>Age</th>
  					<th>Phone</th>
  				</tr>
  				<?php
  				$conn = new mysqli('localhost','root','','blood_donation');


  				if(isset($_GET['blood_group'])){
  					$blood_group = urlencode($_GET['blood_group']);  // 'urlencode()' get the '+' symbol
            $_SESSION['blood_group']=$blood_group;
  					$result = mysqli_query($conn,"select * from user_biodata where blood_group = '$blood_group'");
  				}


		         if(isset($_POST['village']) && isset($_POST['district'])){

		            $village = $_POST['village'];
		            $district = $_POST['district'];
		            $result = mysqli_query($conn,"select * from user_biodata where village = '$village' and district = '$district' and blood_group = '{$_SESSION['blood_group']}'");

		          }
		          if(isset($_POST['village']) && $_POST['district']==''){

		            $village = $_POST['village'];
                $blood_group = $_SESSION['blood_group'];
		            $result = mysqli_query($conn,"select * from user_biodata where village = '$village' and blood_group = '{$_SESSION['blood_group']}'");

		         }
		         if(isset($_POST['district']) && $_POST['village']==''){

		            $district = $_POST['district'];
                $blood_group = $_SESSION['blood_group'];
		            $result = mysqli_query($conn,"select * from user_biodata where district = '$district' and blood_group = '{$_SESSION['blood_group']}'");

		         }


  				if ($result && mysqli_num_rows($result)>0) {
  					while ($row=$result->fetch_assoc()) {
  						echo "<tr><td>".ucwords(strtolower($row['fname']))." ".ucwords(strtolower($row['lname']))."</td>".
  						"<td>".ucwords(strtolower($row['village']))."</td>".
  						"<td>".ucwords(strtolower($row['district']))."</td>".
  						"<td>".ucwords(strtolower($row['division']))."</td>".
  						"<td>".ucwords(strtoupper($row['blood_group']))."</td>".
  						"<td>".date_diff(date_create($row['dob']), date_create('today'))->y."</td>". // ->y convert to year
  						"<td>".$row['phone']."</td></tr>";
  					}
  				}else {
            echo "<tr><td colspan='7' style='background-color: white; font-size: 30px; padding: 50px 0;'>No data is available</td></tr>";
          }

          $conn->close();

  				 ?>
  			</table>
  		</div>
  		<div class="col-lg-2"></div>
  	</div>
  </div>

  <div>
    <?php footer(); ?>
  </div>

  <div>
    <?php sign_in(); ?>
  </div>

  <?php

  if ($_SESSION['user_email']=='') {
    echo "<script type='text/javascript'>

      document.querySelector('.sign-in').style.display = 'flex';  // show the pop up window
      $('body').css('overflow', 'hidden');  // stop scrolling backgroud

    document.querySelector('.close').addEventListener('click', function() {
      document.querySelector('.sign-in').style.display = 'none';  // for remove pop up window
      $('body').css('overflow', ''); // start scrolling after remove the pop up window
      location.href='index.php';
  });

</script>";
  }

   ?>






 </body>
 </html>
