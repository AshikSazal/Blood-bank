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
            <th>Accept</th>
            <th>Reject</th>
  				</tr>
  				<?php
  				$conn = new mysqli('localhost','root','','blood_donation');
          if(!isset($_GET['page'])){
            $page=1;
          }else{
            $page=$_GET['page'];
          }
          $start_page=($page-1)*15;
          $num_of_rows=ceil(mysqli_num_rows(mysqli_query($conn,"select * from request_user_biodata"))/15);
          $result=mysqli_query($conn,"SELECT * FROM request_user_biodata order by division LIMIT 15 OFFSET $start_page");

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
  						"<td style='text-transform: none;'>".$row['email']."</td>".
              "<td><a style='color: green; font-size: 20px;' href='action/request_user.php?id=$row[id]&status=accept'>
                    <i class='fas fa-user-check'></i></a>
              </td>".
              "<td><a style='color: red; font-size: 20px;' href='action/request_user.php?id=$row[id]&status=reject'>
                    <i class='fas fa-times-circle'></i></a>
              </td></tr>";
  					}
  				}

          $conn->close();

          ?>
  			</table>
  		</div>
      <div style="margin-left: 45%;">
        <?php
        echo "page ";
        for($page=1;$page<=$num_of_rows;$page++){
          echo "<a href='show_all_requested_user.php?page=$page'>".$page."</a>"." ";
        }
         ?>
      </div>
  	</div>
    <div>
      <a class='btn btn-info' style="margin: 50px 0;" href='admin.php'>Go Back</a>
    </div>
  </div>

  <div>
    <?php footer(); ?>
  </div>


 </body>
 </html>
