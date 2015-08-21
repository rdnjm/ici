<?php
	session_start();
	include '../needs/connString.php';

	$action = $_POST['submit'];
	$empNum = $_SESSION['empNum'];

	if($action == "Submit" && isset($empNum)){
		$issued = date('Y-m-d h:m:s');
		$date = $_POST['year'] . "-" . $_POST['month'] . "-" . $_POST['day'];
		$reason = $_POST['reason'];
		$numhours = $_POST['numhours'];

		$query = "SELECT COUNT(otNum) FROM otrequest;" or die(mysqli_error($link));
		$result = conString($query);
		$rows = mysqli_fetch_array($result);
		$num  = $rows[0] + 1;

		$query = "INSERT INTO otrequest VALUES('" . $empNum . "', '" . $issued . "', '" . $reason . "', 'pending', '" . $num . "', '" . $numhours . "', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00',  '" . $date . "')";
		conString($query);

		$query = "SELECT otNum FROM otrequest WHERE otNum = '" . $num . "';" or die(mysqli_error($link));
		$result = conString($query);
		$rows = mysqli_fetch_array($result);
		if($num == $rows[0]){
			header("LOCATION: ../RequestForms.php?successOT=true");
		}

		else{
			header("LOCATION: ../RequestForms.php?successOT=false");
		}		
	}
?>