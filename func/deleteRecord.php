<?php
	SESSION_START();
	include '../needs/connString.php';
	
	//lipat data
	//employee main details
	$query = "SELECT * FROM employee WHERE empNum='" . $_GET['empNum'] . "';" or die(mysqli_error($link));
	$result = conString($query);
	$rows = mysqli_fetch_array($result);
	$query = "INSERT INTO deleted VALUES('" . $_GET['empNum'] . "', '" . $rows[1] . "', '" . $rows[2] . "', '" . $rows[3] . "', '" . $rows[4] . "', '" . $rows[5] . "', '" . $rows[6] . "', '" . $rows[7] . "', '" . $rows[8] . "', '" . $rows[9] . "', '" . $rows[10] . "', '" . $rows[11] . "');" or die(mysqli_error($link));
	conString($query);

	//sss
	$query = "SELECT * FROM sss WHERE EmployeeNumber='" .$_GET['empNum'] . "';" or die(mysqli_error($link));
	$result = conString($query);
	$rows = mysqli_fetch_array($result);
	$query = "INSERT INTO deletedsss VALUES('" . $_GET['empNum'] . "', '" . $rows[1] . "');" or die(mysqli_error($link));
	conString($query);

	//pagibig
	$query = "SELECT * FROM pagibigmasterfile WHERE employeenumber='" . $_GET['empNum'] . "';" or die(mysqli_error($link));
	$result = conString($query);
	$rows = mysqli_fetch_array($result);
	$query = "INSERT INTO deletedpagibig VALUES('" . $_GET['empNum'] . "', '" . $rows[1] . "');" or die(mysqli_error($link));
	conString($query);

	//philhealth
	$query = "SELECT * FROM philhealthmasterfile WHERE EmployeeNumber = '" . $_GET['empNum'] . "';" or die(mysqli_error($link));
	$result = conString($query);
	$rows = mysqli_fetch_array($result);
	$query = "INSERT INTO deletedphilhealth VALUES('" . $_GET['empNum'] . "', '" . $rows[1] . "');" or die(mysqli_error($link));
	conString($query);

	//bir
	$query = "SELECT * FROM birmasterfile WHERE EmployeeNumber = '" . $_GET['empNum'] . "';" or die(mysqli_error($link));
	$result = conString($query);
	$rows = mysqli_fetch_array($result);
	$query = "INSERT INTO deletedbir VALUES('" . $_GET['empNum'] . "', '" . $rows[1] . "', '" . $rows[2] . "');" or die(mysqli_error($link)); 
	conString($query);

	//login
	$query = "SELECT * FROM emplogin WHERE employeeNum = '" . $_GET['empNum'] . "';" or die(mysqli_error($link));
	$result = conString($query);
	$rows = mysqli_fetch_array($result);
	$query = "INSERT INTO deletedlogin VALUES('" . $_GET['empNum'] . "', '" . $rows[1] . "', '" . $rows[2] . "');" or die(mysqli_error($link));
	conString($query);

	$query = "DELETE FROM employee WHERE empNum = '" . $_GET['empNum'] . "';" or die(mysqli_error($link));
	conString($query);
	$query = "DELETE FROM birmasterfile WHERE EmployeeNumber = '" . $_GET['empNum'] . "';" or die(mysqli_error($link));
	conString($query);
	$query = "DELETE FROM philhealthmasterfile WHERE EmployeeNumber = '" . $_GET['empNum'] . "';" or die(mysqli_error($link));
	conString($query);
	$query = "DELETE FROM pagibigmasterfile WHERE employeenumber = '" . $_GET['empNum'] . "';" or die(mysqli_error($link));
	conString($query);
	$query = "DELETE FROM sss WHERE EmployeeNumber = '" . $_GET['empNum'] . "';" or die(mysqli_error($link));
	conString($query);
	$query = "DELETE FROM emplogin WHERE employeeNum = '" . $_GET['empNum'] . "';" or die(mysqli_error($link));
	conString($query);

	header("LOCATION: ../employeemanagement.php");
?>
