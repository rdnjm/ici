<?php
	session_start();
	include '../needs/connString.php';
	include 'functions.php';

	if($_POST['submit'] == "approve"){
		$date = date('Y-m-d h:m:s');
		if($_SESSION['posCode'] == '0003'){
			$query = "UPDATE otrequest SET hrapproval='approved', hrdate='" . $date . "' WHERE otNum='" . $_POST['num'] . "';" or die(mysqli_error($link));
		}
		else{
			$query = "UPDATE otrequest SET deptapproval='approved', deptdate='" . $date . "' WHERE otNum='" . $_POST['num'] . "';" or die(mysqli_error($link));
		}
		echo $query;
		conString($query);
	}

	else{
		$date = date('Y-m-d h:m:s');
		if($_SESSION['posCode'] == '0003'){
			$query = "UPDATE otrequest SET hrapproval='rejected', hrdate='" . $date . "' WHERE otNum='" . $_POST['num'] . "';" or die(mysqli_error($link));
		}
		else{
			$query = "UPDATE otrequest SET deptapproval='rejected', deptdate='" . $date . "' WHERE otNum='" . $_POST['num'] . "';" or die(mysqli_error($link));
		}
		echo $query;
		conString($query);
	}

	$query = "SELECT deptapproval, hrapproval FROM otrequest WHERE otNum='" . $_POST['num'] . "';" or die(mysqli_error($link));
	$result = conString($query);
	$rows = mysqli_fetch_array($result);

	if($rows[0] != "" && $rows[1] != ""){
		$query = "UPDATE otrequest SET status='" . $rows[0] . "' WHERE otNum='" . $_POST['num'] . "';" or die(mysqli_error($link));
		conString($query);
	}

	if($_SESSION['posCode'] == '0003'){
		header("LOCATION: ../ApproveRequest.php?success=true");
	}

	else{
		header("LOCATION: ../TeamRequestViewer.php?success=true");
	}
?>