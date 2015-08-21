<?php
	session_start();
	include '../needs/connString.php';
	include 'functions.php';

	if(isset($_POST['type'])){
		$type = $_POST['type'];


		if($type == 2){
			echo "<script type='text/javascript' src='js/jquery.js'></script>";
			echo "<script type='text/javascript' src='js/jquery.dataTables.js'></script>";
			echo "<script type='text/javascript'>";
				echo "$(document).ready(function(){";
					echo "$('#loanViewer').dataTable({";
						echo "\"pagingType\": \"full_numbers\"";
					echo "})";
				echo "});";
			echo "</script>";
			echo "<link rel='stylesheet' type='text/css' href='css/jquery.dataTables.css'>";

			echo "<table class='table table-bordered table-hover' id='loanViewer'>";	
				echo "<thead>";
					echo "<tr>";
						echo "<th></th>";
						echo "<th>Name</th>";
						echo "<th>Date Issued</th>";
						echo "<th>Loan Type</th>";
						echo "<th>Status</th>";
						echo "<th>Months Payable</th>";
						echo "<th>Amount</th>";
						echo "<th>Monthly Deduction</th>";
						echo "<th>Paid</th>";
						echo "<th>Remaining Balance</th>";
						echo "<th>Reason</th>";
						echo "<th>Remarks</th>";
					echo "</tr>";
				echo "</thead>";		

				$empNum = $_SESSION['empNum']; 

				$query = "SELECT loanrequest.LoanReqNum, loanrequest.dateIssued, loanrequest.loantype, loanrequest.amount, loanrequest.months, loanrequest.monthly, loanrequest.reason, loanrequest.remarks, loanrequest.status, employee.LastName, employee.FirstName, loanrequest.paid FROM loanrequest INNER JOIN employee ON employee.empNum = loanrequest.empNum;" or die(mysqli_error($link));
				$result = conString($query);
				echo "<tbody>";
					while($rows = mysqli_fetch_array($result)){
						$bal = $rows[5] * $rows[4] - $rows[10];

						echo "<tr>";
						echo "<td>" . $rows[0] . "</td>";
						echo "<td>" . $rows[9] . ", " . $rows[10] . "</td>";
						echo "<td>" . $rows[1] . "</td>";
						echo "<td>" . $rows[2] . "</td>";

						if ($rows[8] == 'approved'){ 
							echo "<td class='alert alert-success'>" . $rows[8] . " </td>"; 
						}

						else if($rows[8] == 'pending'){
							echo "<td class='alert alert-warning'>" . $rows[8] . "</td>";
						}

						else if($rows[8] == 'waiting for approval'){
							echo "<td class='alert alert-warning'>" . $rows[8] . "</td>";
						}

						else if($rows[8] == 'rejected'){
							echo "<td class='alert alert-danger'>" . $rows[8] . "</td>";
						}

						echo "<td>" . $rows[4] . "</td>";
						echo "<td>" . $rows[3] . "</td>";
						echo "<td>" . $rows[5] . "</td>";
						echo "<td>" . $rows[11] . "</td>";
						echo "<td>$bal</td>";
						echo "<td>" . $rows[6] . "</td>";
						echo "<td>" . $rows[7] . "</td>";	
						echo "</tr>";
					}

				echo "</tbody>";
			echo "</table>";
		}
	}
?>