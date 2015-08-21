<?php
	session_start();
	include '../needs/connString.php';
	include 'functions.php';
	$dept = $_SESSION['posCode'];

	if(isset($_POST['type'])){
		$type = $_POST['type'];

		if($type == 1){
			echo "<script type='text/javascript' src='js/jquery.js'></script>";
			echo "<script type='text/javascript' src='js/jquery.dataTables.js'></script>";
			echo "<script type='text/javascript'>";
				echo "$(document).ready(function(){";
					echo "$('#leaveViewer').dataTable({";
						echo "\"pagingType\": \"full_numbers\"";
					echo "})";
				echo "});";
			echo "</script>";
			echo "<link rel='stylesheet' type='text/css' href='css/jquery.dataTables.css'>";


			echo "<table class='table table-bordered table-hover' id='leaveViewer'>";
				echo "<thead>";
					echo "<tr>";
						echo "<th></th>";
						echo "<th>Name</th>";
						echo "<th>Date Issued</th>";
						echo "<th>Leave Start</th>";
						echo "<th>Leave End</th>";
						echo "<th>Status</th>";
						echo "<th>Type</th>";
						echo "<th>Reason</th>";
						echo "<th>Remarks</th>";
					echo "</tr>";
				echo "</thead>";

				$empNum = $_SESSION['empNum']; 
				
				if($dept== '0003'){
					$query = "SELECT leaverequest.LeaveReqNum, leaverequest.dateIssued, leaverequest.dateAb, leaverequest.endDate, leaverequest.status, leaverequest.type, leaverequest.reason, leaverequest.remarks, employee.LastName, employee.Firstname FROM leaverequest INNER JOIN employee ON leaverequest.empNum = employee.empNum;" or die(mysqli_error($link));
				}
				
				else{
					$query = "SELECT leaverequest.LeaveReqNum, leaverequest.dateIssued, leaverequest.dateAb, leaverequest.endDate, leaverequest.status, leaverequest.type, leaverequest.reason, leaverequest.remarks, employee.LastName, employee.Firstname FROM leaverequest INNER JOIN employee ON leaverequest.empNum = employee.empNum WHERE employee.PositionCode like '" . $dept . "%';" or die(mysqli_error($link));
				}

				$result = conString($query);
				echo "<tbody>";
					while($rows = mysqli_fetch_array($result)){
						echo "<tr>";
							echo "<td>" . $rows[0] . "</td>";
							echo "<td>" . $rows[8] . ", " . "$rows[9]" . "</td>";
							echo "<td>" . $rows[1] . "</td>";
							echo "<td>" . $rows[2] . "</td>";
							echo "<td>" . $rows[3] . "</td>";

							if ($rows[4] == 'approved'){ 
								echo "<td class='alert alert-success'>" . $rows[4] . " </td>"; 
							}

							else if($rows[4] == 'pending'){
								echo "<td class='alert alert-warning'>" . $rows[4] . "</td>";
							}

							else if($rows[4] == 'waiting for approval'){
								echo "<td class='alert alert-warning'>" . $rows[4] . "</td>";
							}

							else if($rows[4] == 'rejected'){
								echo "<td class='alert alert-danger'>" . $rows[4] . "</td>";
							}

							echo "<td>" . $rows[5] . "</td>";
							echo "<td>" . $rows[6] . "</td>";
							echo "<td>" . $rows[7] . "</td>";
						echo "</tr>";
					}
				echo "</tbody>";
			echo "</table>";
		}

		else if($type == 3){
			echo "<script type='text/javascript' src='js/jquery.js'></script>";
			echo "<script type='text/javascript' src='js/jquery.dataTables.js'></script>";
			echo "<script type='text/javascript'>";
				echo "$(document).ready(function(){";
					echo "$('#otViewer').dataTable({";
						echo "\"pagingType\": \"full_numbers\"";
					echo "})";
				echo "});";
			echo "</script>";
			echo "<link rel='stylesheet' type='text/css' href='css/jquery.dataTables.css'>";


			echo "<table class='table table-bordered table-hover' id='otViewer'>";
				echo "<thead>";
					echo "<tr>";
						echo "<th></th>";
						echo "<th>Name</th>";
						echo "<th>Date Issued</th>";
						echo "<th>Overtime Date</th>";
						echo "<th>Status</th>";
						echo "<th>Number of OT Hour/s</th>";
						echo "<th>Reason</th>";
						echo "<th>Remarks</th>";
					echo "</tr>";
				echo "</thead>";

				$empNum = $_SESSION['empNum']; 
				
				if($dept== '0003'){
					$query = "SELECT otrequest.otNum, otrequest.dateIssued, otrequest.dateOT, otrequest.numhours, otrequest.reason, otrequest.remarks, otrequest.status, employee.LastName, employee.FirstName FROM otrequest INNER JOIN employee ON employee.empNum = otrequest.empNum;" or die(mysqli_error($link));
				}
				
				else{
					$query = "SELECT otrequest.otNum, otrequest.dateIssued, otrequest.dateOT, otrequest.numhours, otrequest.reason, otrequest.remarks, otrequest.status, employee.LastName, employee.FirstName FROM otrequest INNER JOIN employee ON employee.empNum = otrequest.empNum WHERE employee.PositionCode LIKE '" . $dept . "%';" or die(mysqli_error($link));
				}

				$result = conString($query);
				echo "<tbody>";
					while($rows = mysqli_fetch_array($result)){
						echo "<tr>";
							echo "<td>" . $rows[0] . "</td>";
							echo "<td>" . $rows[7] . ", " . $rows[8] . "</td>";
							echo "<td>" . $rows[1] . "</td>";
							echo "<td>" . $rows[2] . "</td>";

							if ($rows[6] == 'approved'){ 
								echo "<td class='alert alert-success'>" . $rows[6] . " </td>"; 
							}

							else if($rows[6] == 'pending'){
								echo "<td class='alert alert-warning'>" . $rows[6] . "</td>";
							}

							else if($rows[6] == 'waiting for approval'){
								echo "<td class='alert alert-warning'>" . $rows[6] . "</td>";
							}

							else if($rows[6] == 'rejected'){
								echo "<td class='alert alert-danger'>" . $rows[6] . "</td>";
							}

							echo "<td>" . $rows[3] . "</td>";
							echo "<td>" . $rows[4] . "</td>";
							echo "<td>" . $rows[5] . "</td>";
						echo "</tr>";
					}
				echo "</tbody>";
			echo "</table>";
		}

		else if($type == 4){
			echo "<script type='text/javascript' src='js/jquery.js'></script>";
			echo "<script type='text/javascript' src='js/jquery.dataTables.js'></script>";
			echo "<script type='text/javascript'>";
				echo "$(document).ready(function(){";
					echo "$('#utViewer').dataTable({";
						echo "\"pagingType\": \"full_numbers\"";
					echo "})";
				echo "});";
			echo "</script>";
			echo "<link rel='stylesheet' type='text/css' href='css/jquery.dataTables.css'>";


			echo "<table class='table table-bordered table-hover' id='utViewer'>";
				echo "<thead>";
					echo "<tr>";
						echo "<th></th>";
						echo "<th>Name</th>";
						echo "<th>Date Issued</th>";
						echo "<th>Undertime Date</th>";
						echo "<th>Status</th>";
						echo "<th>Expected Time Out</th>";
						echo "<th>Reason</th>";
						echo "<th>Remarks</th>";
					echo "</tr>";
				echo "</thead>";

				$empNum = $_SESSION['empNum']; 
				$query = "SELECT utNum, dateIssued, dateAb, timeout, reason, remarks, status FROM utrequest;" or die(mysqli_error($link));
				
				if($dept== '0003'){
					$query = "SELECT utrequest.utNum, utrequest.dateIssued, utrequest.dateAb, utrequest.timeout, utrequest.reason, utrequest.remarks, utrequest.status, employee.LastName, employee.FirstName FROM utrequest INNER JOIN employee ON employee.empNum = utrequest.empNum;" or die(mysqli_error($link));
				}
				
				else{
					$query = "SELECT utrequest.utNum, utrequest.dateIssued, utrequest.dateAb, utrequest.timeout, utrequest.reason, utrequest.remarks, utrequest.status, employee.LastName, employee.FirstName FROM utrequest INNER JOIN employee ON employee.empNum = utrequest.empNum WHERE employee.PositionCode LIKE '" . $dept . "%';" or die(mysqli_error($link));
				}

				$result = conString($query);
				echo "<tbody>";
					while($rows = mysqli_fetch_array($result)){
						echo "<tr>";
							echo "<td>" . $rows[0] . "</td>";
							echo "<td>" . $rows[7] . ", " . $rows[8] . "</td>";
							echo "<td>" . $rows[1] . "</td>";
							echo "<td>" . $rows[2] . "</td>";

							if ($rows[6] == 'approved'){ 
								echo "<td class='alert alert-success'>" . $rows[6] . " </td>"; 
							}

							else if($rows[6] == 'pending'){
								echo "<td class='alert alert-warning'>" . $rows[6] . "</td>";
							}

							else if($rows[6] == 'waiting for approval'){
								echo "<td class='alert alert-warning'>" . $rows[6] . "</td>";
							}

							else if($rows[6] == 'rejected'){
								echo "<td class='alert alert-danger'>" . $rows[6] . "</td>";
							}

							echo "<td>" . $rows[3] . "</td>";
							echo "<td>" . $rows[4] . "</td>";
							echo "<td>" . $rows[5] . "</td>";
						echo "</tr>";
					}
				echo "</tbody>";
			echo "</table>";
		}
	}
?>