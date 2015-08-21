<?php
	include '../needs/connString.php';
	include 'functions.php';

	$empNum = $_POST['empNum'];

	$query = "SELECT workDate, timeIn, timeOut, daystat FROM employeelogs WHERE employeeNumber ='" . $empNum . "' ORDER BY workDate ASC;";
	$result = conString($query);

	echo "<script type='text/javascript' src='js/jquery.js'></script>";
	echo "<script type='text/javascript' src='js/bootstrap.js'></script>";
	echo "<script type='text/javascript' src='js/jquery.dataTables.js'></script>";
	echo "<script type='text/javascript'>";
		echo "$(document).ready(function(){";
			echo "$('#emp').dataTable({";
				echo "\"pagingType\": \"full_numbers\",";
				ECHO "\"order\": [[ 0, \"desc\" ]]";
				echo "})";
			echo "});";
		echo "</script>";
		echo "<link rel='stylesheet' type='text/css' href='css/jquery.dataTables.css'>";
	echo "<table class='table table-bordered table-hover' id='emp'>";
		echo "<thead>";
			echo "<tr>";
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
					$day = date('l', strtotime($rows[0]));

					echo "<td>" . $rows[0] . "</td>";
					echo "<td>" . $day . "</td>";
					echo "<td>" . $rows[3] . "</td>";
					echo "<td>" . $rows[1] . "</td>";
					echo "<td>" . $rows[2] . "</td>";
				echo "</tr>";
			}
		echo "</tbody>";
	echo "</table>";
?>