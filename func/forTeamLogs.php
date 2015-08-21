<?php
	include '../needs/connString.php';
	include 'functions.php';

	$posCode = $_POST['index'];

	$query = "SELECT employee.empNum, employee.LastName, employee.FirstName, employeelogs.workDate, employeelogs.timeIn, employeelogs.timeOut, employeelogs.daystat FROM employee INNER JOIN employeeLogs ON employee.empNum = employeelogs.EmployeeNumber  WHERE employee.PositionCode LIKE '" . $posCode . "%' ORDER BY DATE(employeelogs.workDate) DESC;";
	$result = conString($query);

	echo "<script type='text/javascript' src='js/jquery.js'></script>";
	echo "<script type='text/javascript' src='js/bootstrap.js'></script>";
	echo "<script type='text/javascript' src='js/jquery.dataTables.js'></script>";
	echo "<script type='text/javascript'>";
		echo "$(document).ready(function(){";
			echo "$('#emp').dataTable({";
				echo "\"pagingType\": \"full_numbers\",";
				echo  "\"order\": [[ 2, \"desc\" ]]";
				echo "})";
			echo "});";
		echo "</script>";
		echo "<link rel='stylesheet' type='text/css' href='css/jquery.dataTables.css'>";
	echo "<table class='table table-bordered table-hover' id='emp'>";
		echo "<thead>";
			echo "<tr>";
				echo "<th>Employee Number</th>";
				echo "<th>Name</th>";
				echo "<th>Work Date</th>";
				echo "<th>Day</th>";
				echo "<th>Day Status</th>";
				echo "<th>Time In</th>";
				echo "<th>Time Out</th>";
			echo "</tr>";
		echo "</thead>";

		echo "<tbody>";
			while($rows = mysqli_fetch_array($result)){
				echo "<tr>";
					$day = date('l', strtotime($rows[3]));

					echo "<td>" . $rows[3] . "</td>";
					echo "<td>" . $rows[1] . ", " . $rows[2] . "</td>";
					echo "<td>" . $rows[3] . "</td>";
					echo "<td>" . $day . "</td>";
					echo "<td>" . $rows[6] . "</td>";
					echo "<td>" . $rows[4] . "</td>";
					echo "<td>" . $rows[5] . "</td>";
				echo "</tr>";
			}
		echo "</tbody>";
	echo "</table>";
?>