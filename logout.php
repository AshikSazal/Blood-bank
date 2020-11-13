<?php 

	session_start();
	$_SESSION['user_email'] ='';
	$_SESSION['password'] = '';
	header('location: index.php');

 ?>