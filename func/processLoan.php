<?php
	session_start();
	include '../needs/connString.php';
	include 'functions.php';

	if($_POST['submit'] == "approve"){
		$date = date('Y-m-d h:m:s');
		if($_SESSION['posCode'] == '0003'){
			$query = "UPDATE loanrequest SET monthly='" . $_POST['amount'] . "', hrapproval='approved', hrdate='" . $date . "' WHERE LoanReqNum='" . $_POST['num'] . "';" or die(mysqli_error($link));
		}
		else{
			$query = "UPDATE loanrequest SET dirapproval='approved', dirdate='" . $date . "' WHERE LoanReqNum='" . $_POST['num'] . "';" or die(mysqli_error($link));
		}
		echo $query;
		conString($query);
	}

	else{
		$date = date('Y-m-d h:m:s');
		if($_SESSION['posCode'] == '0003'){
			$query = "UPDATE loanrequest SET hrapproval='rejected', hrdate='" . $date . "' WHERE LoanReqNum='" . $_POST['num'] . "';" or die(mysqli_error($link));
		}
		else{
			$query = "UPDATE loanrequest SET dirapproval='rejected', dirdate='" . $date . "' WHERE LoanReqNum='" . $_POST['num'] . "';" or die(mysqli_error($link));
		}

		conString($query);
	}

	$query = "SELECT dirapproval, hrapproval FROM loanrequest WHERE LoanReqNum='" . $_POST['num'] . "';" or die(mysqli_error($link));
	$result = conString($query);
	$rows = mysqli_fetch_array($result);

	if($rows[0] != "" && $rows[1] != ""){
		$query = "UPDATE loanrequest SET status='" . $rows[0] . "' WHERE LoanReqNum='" . $_POST['num'] . "';" or die(mysqli_error($link));
		conString($query);
	}

	
	if($_SESSION['posCode'] == '0003'){
		header("LOCATION: ../ApproveRequest.php?success=true");	
	}

	else{
		header("LOCATION: ../dirLoanApprove.php?success=true");	
	}
?>