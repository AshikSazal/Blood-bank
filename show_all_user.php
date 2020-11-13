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
  <link rel='stylesheet' href='style\show_all_user.css'>
  <link rel="stylesheet" type="text/css" href="style/index_upper_footer.css">
  <script src='js/jquery.js'></script>
 </head>
 <body>

  <div>
    <?php upper($_SESSION['user_email'],$_SESSION['user_password']); ?>
  </div>

  <div class="container show-user">
  	<div class="row">
  		<div class="col-lg-12">
  			<div class="user-search">
  				<ul>
  					<form action="show_all_user.php" method="post">
              <li class="user-search2">
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
                </select>
              </li>
  						<li>
  							<input class="user-search" type="text" name="village" placeholder="Village">
  						</li>
  						<li>
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
  				$conn = new mysqli('localhost','root','','blood_donation');

          $result = mysqli_query($conn,"select * from user_biodata order by division");

  				if(isset($_POST['village']) && isset($_POST['district']) && isset($_POST['blood_group'])){

                $result = mysqli_query($conn,"select * from user_biodata where village = '{$_POST['village']}' and district = '{$_POST['district']}' and blood_group = '{$_POST['blood_group']}'");

              }
              if(isset($_POST['village']) && $_POST['district']=='' && isset($_POST['blood_group'])){

                $result = mysqli_query($conn,"select * from user_biodata where village = '{$_POST['village']}' and blood_group = '{$_POST['blood_group']}'");

             }
             if(isset($_POST['district']) && $_POST['village']=='' && isset($_POST['blood_group'])){

                $result = mysqli_query($conn,"select * from user_biodata where district = '{$_POST['district']}' and blood_group = '{$_POST['blood_group']}'");

             }
  				
  				if ($result && mysqli_num_rows($result)>0) {
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
  				}

          $conn->close();

  				 ?>
  			</table>
  		</div>
  	</div>
    <div>
      <a class='btn btn-info addItemBtn' href='admin.php'>Go Back</a>
    </div>
  </div>

  <div>
    <?php footer(); ?>
  </div>

 
 </body>
 </html>