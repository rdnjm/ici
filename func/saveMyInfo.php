<?php
	include '../needs/connString.php';
	include 'functions.php';

	if($_POST['type'] == 'user'){
		$empNum = $_POST['empNum'];
		$address = $_POST['address'];
		$conNum = $_POST['conNum'];
		
		$query = "UPDATE employee SET address='" . $address . "', ContactNumber='" . $conNum . "' WHERE empNum='" . $empNum . "';" or die(mysqli_error($link));
		conString($query);
		echo $query;

		header("LOCATION: ../myInfo.php?change=success");
	}
?>