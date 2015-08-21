<?php
	session_start();
	include '../needs/connString.php';

	$action = $_POST['submit'];
	$empNum = $_SESSION['empNum'];

	if($action == "Submit" && isset($empNum)){
		if($_POST['get'] == 'other'){
			$empNum = $_POST['empNum'];
			$type = $_POST['type'];
			$amount = $_POST['amount'];
			$toPay = $_POST['toPay'];
			$monthly = $_POST['monthly'];
			$remarks = $_POST['remarks'];
			$issued = date('Y-m-d h:m:s');

			$query = "SELECT COUNT(LoanReqNum) FROM loanrequest;" or die(mysqli_error($link));
			$result = conString($query);
			$rows = mysqli_fetch_array($result);
			$num  = $rows[0] + 1;

			$query = "INSERT INTO loanrequest VALUES('" . $empNum . "', '" . $issued . "', '" . $reason . "', 'approved', '" . $num . "', '" . $remarks . "', 'approved', '" . $issued . "', '" . $type . "', '" . $amount . "',  '" . $toPay . "', '" . $monthly . "', 'approved', '" . $issued . "', '0');" or die(mysqli_error($link));
			conString($query);

			$query = "SELECT LoanReqNum FROM loanrequest WHERE LoanReqNum = '" . $num . "';" or die(mysqli_error($link));
			$result = conString($query);
			$rows = mysqli_fetch_array($result);
			if($num == $rows[0]){
				header("LOCATION: ../EmployeeLoanManagement.php?successLoan=true");
			}

			else{
				header("LOCATION: ../EmployeeLoanManagement.php?successLoan=false");
			}

		}

		else{	
			$issued = date('Y-m-d h:m:s');
			$type = $_POST['type'];
			$reason = $_POST['reason'];
			$amount = doubleval($_POST['amount']);
			$toPay = $_POST['toPay'];

			$query = "SELECT COUNT(LoanReqNum) FROM loanrequest;" or die(mysqli_error($link));
			$result = conString($query);
			$rows = mysqli_fetch_array($result);
			$num  = $rows[0] + 1;

			$query = "INSERT INTO loanrequest VALUES('" . $empNum . "', '" . $issued . "', '" . $reason . "', 'pending', '" . $num . "', '', '', '0000-00-00 00:00:00', '" . $type . "', '" . $amount . "',  '" . $toPay . "', '0', '', '0000-00-00 00:00:00', '0');" or die(mysqli_error($link));
			conString($query);

			$query = "SELECT LoanReqNum FROM loanrequest WHERE LoanReqNum = '" . $num . "';" or die(mysqli_error($link));
			$result = conString($query);
			$rows = mysqli_fetch_array($result);
			if($num == $rows[0]){
				header("LOCATION: ../RequestForms.php?successLoan=true");
			}

			else{
				header("LOCATION: ../RequestForms.php?successLoan=false");
			}
		}
	}
?>