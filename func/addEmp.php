<?php
	include '../needs/connString.php';

	$empNum = $_POST['empNum'];
	$lastname = $_POST['lastname'];
	$firstname = $_POST['firstname'];
	$middlename = $_POST['middlename'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$conNum = $_POST['conNum'];
	$bday = $_POST['year'] . "-" . $_POST['month'] . "-" . $_POST['day'];

	/* WAG PANSININ, PANG TEST KO LANG
		* $month = $_POST['month'];
		* $day = $_POST['day'];
		* $year = $_POST['year'];
	*/
	$nationality = $_POST['nationality'];	
	$maritalStatus = $_POST['maritalStatus'];	
	$position = $_POST['position'];	
	$sss = $_POST['sss'];	
	$pagibig = $_POST['pagibig'];	
	$philhealth = $_POST['philhealth'];	
	$tin = $_POST['tin'];	
	$dependents = $_POST['dependents'];	
	$rate = $_POST['rate'];	

	//lagay - emp
	$query = "INSERT INTO employee VALUES('" . $empNum . "', '" . $lastname . "', '" . $firstname . "', '" . $middlename . "', '" . $address . "', '" . $bday . "', '" . $conNum . "', '" . $position . "', '" . $rate . "', '" . $nationality . "', '" . $maritalStatus . "', '" . $gender . "');" or die(mysqli_error($link));
	conString($query);

	//check
	$query = "SELECT COUNT(empNum) FROM employee WHERE empNum='" . $empNum . "';" or die(mysqli_error($link));
	$result = conString($query);
	$rowsEm = mysqli_fetch_array($result);
	$counter = $rowsEm[0];

	//lagay - sss
	$query = "INSERT INTO sss VALUES('" . $empNum . "', '" . $sss . "');" or die(mysqli_error($link));
	conString($query);

	//check
	$query = "SELECT COUNT(EmployeeNumber) FROM sss WHERE EmployeeNumber='" . $empNum ."';" or die(mysqli_error($link));
	$result = conString($query);
	$rows = mysqli_fetch_array($result);
	

	//lagay - pagibig
	$query = "INSERT INTO pagibigmasterfile VALUES('" . $empNum ."', '" . $pagibig . "');" or die(mysqli_error($link));
	conString($query);

	//check
	$query = "SELECT COUNT(employeenumber) FROM pagibigmasterfile WHERE employeenumber= '" . $empNum . "'" or die(mysqli_error($link));
	$result = conString($query);
	$rows = mysqli_fetch_array($result);


	//lagay - philhealth
	$query = "INSERT INTO philhealthmasterfile VALUES('" . $empNum . "', '" . $philhealth . "');" or die(mysqli_error($link));
	conString($query);

	//check
	$query = "SELECT COUNT(EmployeeNumber) FROM philhealthmasterfile WHERE EmployeeNumber='" . $empNum . "';" or die(mysqli_error($link));
	$result = conString($query);
	$rows = mysqli_fetch_array($result);

	//lagay - tin
	$query = "INSERT INTO birmasterfile VALUES('" . $empNum . "', '" . $tin . "', '" . $dependents . "');" or die(mysqli_error($link));
	conString($query);

	//check
	$query = "SELECT COUNT(EmployeeNumber) FROM birmasterfile WHERE EmployeeNumber='" . $empNum . "';" or die(mysqli_error($link));
	$result = conString($query);
	$rows = mysqli_fetch_array($result);

	//lagay
	$query = "INSERT INTO emplogin VALUES('" . $empNum . "', '12345678', '1234');" or die(mysqli_error($link));
	conString($query);

	//check
	$query = "SELECT COUNT(employeeNum) FROM emplogin WHERE employeeNum = '" . $empNum . "';" or die(mysqli_error($link));
	$result = conString($query);
	$rowsLogin = mysqli_fetch_array($result);

	if($counter == "1"){
		header("LOCATION: ../addEmployee.php?code=1");
	}

	else{
		//header("LOCATION: ../addEmployee.php?code=101");
	}

?>