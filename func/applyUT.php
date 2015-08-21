<?php
	session_start();
	include '../needs/connString.php';

	$action = $_POST['submit'];
	$empNum = $_SESSION['empNum'];

	if($action == "Submit" && isset($empNum)){
		$issued = date('Y-m-d h:m:s');
		$date = $_POST['year'] . "-" . $_POST['month'] . "-" . $_POST['day'];
		$reason = $_POST['reason'];

		if($_POST['ampm'] == "PM"){
			$_POST['hour'] += 12;
		}

		$timeout = $_POST['hour'] . ":" . $_POST['min'] . ":00";

		$query = "SELECT COUNT(utNum) FROM utrequest;" or die(mysqli_error($link));
		$result = conString($query);
		$rows = mysqli_fetch_array($result);
		$num = $rows[0] + 1;

		$query = "INSERT INTO utrequest VALUES('" . $empNum . "', '" . $issued . "', '" . $date . "', '" . $reason . "', 'pending', '" . $num . "', '" . $timeout . "', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');" or die(mysqli_error($link)); 
		conString($query);

		$query = "SELECT utNum FROM utrequest WHERE utNum = '" . $num . "';" or die(mysqli_error($link));
		$result = conString($query);
		$rows = mysqli_fetch_array($result);
		if($num == $rows[0]){
			header("LOCATION: ../RequestForms.php?successUT=true");
		}

		else{
			header("LOCATION: ../RequestForms.php?successUT=false");
		}			
	}
?>