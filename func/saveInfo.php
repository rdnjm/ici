<?php
	include '../needs/connString.php';
	include 'functions.php';

	if($_POST['type'] == 'admin'){
		$empNum = $_POST['empNum'];
		$lastName = $_POST['lastName'];
		$firstName = $_POST['firstName'];
		$middleName = $_POST['middleName'];
		$maritalstatus = $_POST['maritalstatus'];
		$rate = $_POST['rate'];
		$position = $_POST['position'];
		$address = $_POST['address'];
		$gender = $_POST['gender'];
		$bday = $_POST['year'] . "-" . $_POST['month'] . "-" . $_POST['date'];
		$conNum = $_POST['conNum'];
		$nationality = $_POST['nationality']; 
		
		$dateEmployed = $_POST['dateEmployed'];
		
		$sss = $_POST['sss'];
		
		$tin = $_POST['tin'];
		$dependents = $_POST['dependents'];
		
		$philhealth = $_POST['philhealth'];
		
		$pagibig = $_POST['pagibig'];

		$oldEmpNum = $_POST['oldEmpNum'];

		$query = "UPDATE employee SET empNum='" . $empNum . "', LastName='" . $lastName . "', FirstName='" . $firstName . "', MiddleName='" . $middleName . "', address='" . $address . "', birthday='" . $bday . "', ContactNumber='" . $conNum . "', PositionCode='" . $position . "', RatePerHour='" . $rate . "', Nationality='" . $nationality . "', MaritalStatus='" . $maritalstatus . "', gender='" . $gender . "' WHERE empNum='" . $oldEmpNum . "';" or die(mysqli_error($link));
		conString($query);

		$query = "UPDATE pagibigmasterfile SET employeenumber='" . $empNum . "', pagibignumber='" . $pagibig . "' WHERE employeenumber='" . $oldEmpNum . "';" or die(mysqli_error($link));
		conString($query);

		$query = "UPDATE philhealthmasterfile SET EmployeeNumber ='" . $empNum . "', philhealthnumber='" . $philhealth . "' WHERE EmployeeNumber='" . $oldEmpNum . "';" or die(mysqli_error($link));
		conString($query);

		$query = "UPDATE sss SET EmployeeNumber='" . $empNum . "', sssnumber='" . $sss . "' WHERE EmployeeNumber='" . $oldEmpNum . "';" or die(mysqli_error($link));
		conString($query);


		$query = "UPDATE birmasterfile SET EmployeeNumber='" . $empNum . "', tin='" . $tin . "', NoOfDependents='" . $dependents . "';" or die(mysqli_error($link));
		conString($query);

		$query = "SELECT COUNT(dateEmployed) FROM dateemployed WHERE empNum='" . $oldEmpNum . "';" or die(mysqli_error($link));
		$result = conString($query);
		$rows = mysqli_fetch_array($result);
		
		if($rows[0] == 0){
			$query = "INSERT INTO dateemployed VALUES('" . $empNum . "', '" . $dateEmployed . "');" or die(mysqli_error($link));
			conString($query);
		}

		else{
			$query = "UPDATE dateemployed empNum='" . $empNum . "', dateEmployed='" . $dateEmployed . "' WHERE empNum='" . $oldEmpNum . "';" or die(mysqli_error($link));
			conString($query);
		}

		header("LOCATION: ../employeemanagement.php?change=success");
	}
?>