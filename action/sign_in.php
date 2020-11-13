<?php 

session_start();
$conn = new mysqli('localhost','root','','blood_donation');
		$email=$password='';
		error_reporting(0);

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {


		if (!empty($_POST['email']) && !empty($_POST['password'])) {

			$sql = "select * from admin_biodata where name='$_POST[email]' and password='$_POST[password]'";
			$result = mysqli_query($conn,$sql);
				if (mysqli_num_rows($result)>0) {
					$_SESSION['user_email'] = $_POST[email];
					$_SESSION['user_password'] = $_POST[password];
					header('location: ../admin.php');
				}else{
					$email=$_POST[email];
					$password=$_POST[password];
				}	
		}else{
			echo "<script>alert('Enter email & password')</script>";
			echo("<script>location.href = '../index.php';</script>");
		}
	}

	$result = mysqli_query($conn,"select * from request_user_biodata where email = '$email' and password = '$password'");
		if($result){
			if ($result->num_rows>0) {

				?><script>alert('Your request is pending for admin approval \n If you are under 18 then your request will be rejected')</script>";<?php
				echo("<script>location.href = '../index.php';</script>");
			}
		}
				
		$result = mysqli_query($conn,"select * from user_biodata where email = '$email' and password = '$password'");
		if($result){
			if ($result->num_rows>0) {
				$_SESSION['user_email'] = $email;
				$_SESSION['user_password'] = $password;			
				echo("<script>location.href = '../index.php';</script>");
			}else{
				echo "<script>alert('Invalid email & password')</script>";
				echo("<script>location.href = '../index.php';</script>");
			}
		}	
		
	$conn->close();


 ?>