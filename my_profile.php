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
  <link rel='stylesheet' href='style\my_profile.css'>
  <link rel="stylesheet" type="text/css" href="style/index_upper_footer.css">
  <script src='js/jquery.js'></script>
 </head>
 <body>

  <div>
    <?php upper($_SESSION['user_email'],$_SESSION['user_password']); ?>
  </div>

  <div class="container">
  	<div class="row">
  		<div class="col-lg-2"></div>
  		<div class="col-lg-8">
  			<table>
  				<tr>
  					<th colspan="2">Biodata</th>
  				</tr>
  				<?php 

  				$conn = new mysqli('localhost','root','','blood_donation');
  				$result = mysqli_query($conn,"select * from user_biodata where email = '{$_SESSION['user_email']}'");
  				if ($result && mysqli_num_rows($result)>0) {
  					while($row = $result->fetch_assoc()) {
  						echo "<tr><td>Name: </td><td>".ucwords(strtolower($row['fname']))." ".ucwords(strtolower($row['lname']))."</td></tr>".
                "<tr><td>Blood group: </td><td>".$row['blood_group']."</td></tr>".
  							"<tr><td>Date of birth: </td><td>".$row['dob']."</td></tr>".
  							"<tr><td>Phone: </td><td>".$row['phone']."</td></tr>".
  							"<tr><td>Post code: </td><td>".$row['postcode']."</td></tr>".
  							"<tr><td>Village: </td><td>".ucwords(strtolower($row['village']))."</td></tr>".
  							"<tr><td>District: </td><td>".ucwords(strtolower($row['district']))."</td></tr>".
  							"<tr><td>Division: </td><td>".ucwords(strtolower($row['division']))."</td></tr>".
            		"<tr><td>Email: </td><td>".$row['email']."</td></tr>".
            		"<tr><td>Password: </td><td>".$row['PASSWORD']."</td></tr>".
            		"<tr class='no-bottom-border'><td colspan='2'>
              	   <a href='my_profile_update.php?id=$row[id]&fname=$row[fname]&lname=$row[lname]&dob=$row[dob]&blood_group=$row[blood_group]&phone=$row[phone]&postcode=$row[postcode]&village=$row[village]&district=$row[district]&division=$row[division]&email=$row[email]&password=$row[PASSWORD]'>
              					<input type='submit' value ='UPDATE' class='btn btn-dark'></a>
            		</td></tr>";
  					}
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
 
 </body>
 </html>