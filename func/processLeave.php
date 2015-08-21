<?php
	session_start();
	include '../needs/connString.php';
	include 'functions.php';

	if($_POST['submit'] == "approve"){
		$date = date('Y-m-d h:m:s');
		if($_SESSION['posCode'] == '0003'){
			$query = "UPDATE leaverequest SET hrapproval='approved', hrdate='" . $date . "' WHERE LeaveReqNum='" . $_POST['num'] . "';" or die(mysqli_error($link));
		}
		else{
			$query = "UPDATE leaverequest SET deptapproval='approved', deptdate='" . $date . "' WHERE LeaveReqNum='" . $_POST['num'] . "';" or die(mysqli_error($link));
		}

		conString($query);
	}

	else{
		$date = date('Y-m-d h:m:s');
		if($_SESSION['posCode'] == '0003'){
			$query = "UPDATE leaverequest SET hrapproval='rejected', hrdate='" . $date . "' WHERE LeaveReqNum='" . $_POST['num'] . "';" or die(mysqli_error($link));
		}
		else{
			$query = "UPDATE leaverequest SET deptapproval='rejected', deptdate='" . $date . "' WHERE LeaveReqNum='" . $_POST['num'] . "';" or die(mysqli_error($link));
		}

		conString($query);
	}

	$query = "SELECT deptapproval, hrapproval FROM leaverequest WHERE LeaveReqNum='" . $_POST['num'] . "';" or die(mysqli_error($link));
	$result = conString($query);
	$rows = mysqli_fetch_array($result);

	if($rows[0] != "" && $rows[1] != ""){
		$query = "UPDATE leaverequest SET status='" . $rows[0] . "' WHERE LeaveReqNum='" . $_POST['num'] . "';" or die(mysqli_error($link));
		conString($query);
	}

	
	if($_SESSION['posCode'] == '0003'){
		header("LOCATION: ../ApproveRequest.php?success=true");
	}

	else{
		header("LOCATION: ../TeamRequestViewer.php?success=true");
	}

?>