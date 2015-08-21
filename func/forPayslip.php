<?php
	session_start();
	include '../needs/connString.php';
	include 'functions.php';

	$query = "SELECT DISTINCT payrollstart, payrollend FROM payslip;" or die(mysqli_error($link));
	$result = conString($query);
	echo "<table class='table table-bordered table-hover' id=''>";
		echo "<thead>";
			echo "<tr>";
				echo "<th>Payroll Start</th>";
				echo "<th>Payroll End</th>";
			echo "</tr>";
		echo "</thead>";	
		echo "<tbody>";
			while($rows = mysqli_fetch_array($result)){
				echo "<tr>";
					echo "<td><a href='viewPayslip.php?date=" . $rows[0] . "&end=" . $rows[1] . "&view=true&empNum=" . $_SESSION['empNum'] . "' title='Click for more info'>" . $rows[0] . "</a></td>";	
					echo "<td><a href='viewPayslip.php?date=" . $rows[0] . "&end=" . $rows[1] . "&view=true&empNum=" . $_SESSION['empNum'] . "' title='Click for more info'>" . $rows[1] . "</a></td>";	
				echo "</tr>";
			}
		echo "</tbody>";
	echo "</table>";
?>