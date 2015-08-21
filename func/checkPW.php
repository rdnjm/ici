<?php
	session_start();
	include '../needs/connString.php';
	include 'functions.php';

	$empNum = mysqli_escape_string($link, $_POST['empNum']);
	$password = mysqli_escape_string($link, $_POST['password']);
	$query = "SELECT employeeNum FROM emplogin WHERE employeeNum = '$empNum';" or die("Error " . mysqli_error());
	$result = conString($query);
	$rows = mysqli_num_rows($result);

	if($rows == 1){
		$query = "SELECT pass FROM emplogin WHERE employeeNum = '$empNum' AND pass = '$password';" or die("Error " . mysqli_error());
		$result = conString($query);
		$rows = mysqli_num_rows($result);

		if($rows == 1){
			getPosition($empNum);
			header("LOCATION: ../");
		}	

		else{
			header("LOCATION: ../login.php?err=1");
		}
	}

	else{
		header("LOCATION: ../login.php?err=101");
	}
?>