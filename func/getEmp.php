<?php
	session_start();
	include '../needs/connString.php';
	
	if(isset($_SESSION['posCode'])){
		if($_SESSION['posCode'] == '0002'){
			$query = "SELECT LastName, FirstName FROM employee WHERE empNum='" . $_POST['num'] . "';" or die(mysqli_error($link));
			$result = conString($query);
			$rows = mysqli_fetch_array($result);

			if($rows[0] != null){
				$name = $rows[0] . ", " . $rows[1];
				echo $name;
			}

		}
	}
?>