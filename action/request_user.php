<?php 

	$id = $_GET['id'];
	$status = $_GET['status'];
	$conn = new mysqli('localhost','root','','blood_donation');

	if ($status=='accept') {
		
		mysqli_query($conn,"insert into user_biodata select * from request_user_biodata where id='$id'");
		mysqli_query($conn,"delete from request_user_biodata where id='$id'");
		echo("<script>location.href = '../show_all_requested_user.php';</script>");

	}else{

		mysqli_query($conn,"delete from request_user_biodata where id='$id'");
		echo("<script>location.href = '../show_all_requested_user.php';</script>");
		
	}

 ?>