<?php
	session_start();
	include '../needs/connStringlocal.php';
	$action = $_POST['submit'];
	$empNum = $_SESSION['empNum'];

	if($action == "Submit" && isset($empNum)){
		$issued = date('Y-m-d h:m:s');
		$startDate = $_POST['startyear'] . "-" . $_POST['startmonth'] . "-" . $_POST['startday'];
		$endDate = $_POST['endyear'] . "-" . $_POST['endmonth'] . "-" . $_POST['endday'];
		$reason = $_POST['reason'];
		$type = $_POST['type'];

		$query = "SELECT COUNT(LeaveReqNum) FROM leaverequest;" or die(mysqli_error($link));
		$result = conString($query);
		$rows = mysqli_fetch_array($result);
		$num  = $rows[0] + 1;

		$query = "INSERT INTO leaverequest VALUES('" . $empNum . "', '" . $issued . "', '" . $startDate . "', '" . $reason . "', 'pending', '" . $num . "', '" . $endDate . "', '" . $type . "', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00')";
		$query;
		conString($query);

		$query = "SELECT LeaveReqNum FROM leaverequest WHERE LeaveReqNum = '" . $num . "';" or die(mysqli_error($link));
		$result = conString($query);
		$rows = mysqli_fetch_array($result);
		if($num == $rows[0]){
			header("LOCATION: ../RequestForms.php?successLeave=true");
		}

		else{
			header("LOCATION: ../RequestForms.php?successLeave=false");
		}
	}
?>