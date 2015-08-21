<?php
	if(isset($_GET['type'])){
		$type = $_GET['type'];

		if($type == 1){
			if($_SESSION['posCode'] == '0003'){
				$query = "SELECT LeaveReqNum, empNum, dateIssued, dateAb, endDate, type, reason, remarks, deptapproval FROM leaverequest WHERE LeaveReqNum ='" . $_GET['leave'] . "';" or die(mysqli_error($link));
			}

			else{
				$query = "SELECT LeaveReqNum, empNum, dateIssued, dateAb, endDate, type, reason, remarks, hrapproval FROM leaverequest WHERE LeaveReqNum ='" . $_GET['leave'] . "';" or die(mysqli_error($link));
			}
			
			$result = conString($query);
			$rows = mysqli_fetch_array($result);

			$name = "SELECT LastName, FirstName FROM employee WHERE empNum ='" . $rows[1] . "';" or die(mysqli_error($link));
			$res = conString($name);
			$name = mysqli_fetch_array($res);

			echo "<form action='func/processLeave.php' method='POST'>";
				echo "<table class='table table-bordered table-hover'>";
					echo "<tr>";
						echo "<td>Leave Number</td>";
						echo "<td>" . $rows[0] . "</td>";
					echo "</tr>";
				
					echo "<tr>";
						echo "<td>Name</td>";
						echo "<td>" . $name[0] . ", " . $name[1] . "</td>";
					echo "</tr>";
				
					$rows[2] = dateFormat($rows[2]);
					
					echo "<tr>";
						echo "<td>Date Issued</td>";
						echo "<td>" . $rows[2] ."</td>";
					echo "</tr>";
				
					$rows[3] = dateFormat($rows[3]);
					
					echo "<tr>";
						echo "<td>Leave Start</td>";
						echo "<td>" . $rows[3] . "</td>";
					echo "</tr>";
				
					$rows[4] = dateFormat($rows[4]);
					
					echo "<tr>";
						echo "<td>Leave End</td>";
						echo "<td>" . $rows[4]. "</td>";
					echo "</tr>";
				
					echo "<tr>";
						echo "<td>Leave Type</td>";
						echo "<td>" . $rows[5] . "</td>";
					echo "</tr>";
				
					echo "<tr>";
						echo "<td>Reason</td>";
						echo "<td>" . $rows[6] . "</td>";
					echo "</tr>";
				
					echo "<tr>";
						echo "<td>Remarks</td>";
						echo "<td><textarea name='remarks'>" . $rows[7] . "</textarea></td>";
					echo "</tr>";

				if($_SESSION['posCode'] == '0003'){
					echo "<tr>";
						echo "<td>Department Head Approval</td>";
						echo "<td>";
							if($rows[8] == ""){
								echo "Pending";
							}

							else{
								echo "Approved";
							}
						echo "</td>";
					echo "</tr>";
				}

				else{
					echo "<tr>";
						echo "<td>HR Approval</td>";
						echo "<td>";
							if($rows[8] == ""){
								echo "Pending";
							}

							else{
								echo $rows[8];
							}
						echo "</td>";
					echo "</tr>";				
				}

			echo "</table>";
			echo "<input type='hidden' value='" . $_GET['leave'] . "' name='num'>";
		}

		else if($type == 2){
			if($_SESSION['posCode'] == '0003'){
				$query = "SELECT LoanReqNum, empNum, dateissued, loantype, amount, months, reason, remarks, dirapproval FROM loanrequest WHERE LoanReqNum ='" . $_GET['loan'] . "';" or die(mysqli_error($link));
			}

			else{
				$query = "SELECT LoanReqNum, empNum, dateissued, loantype, amount, months, reason, remarks, hrapproval, monthly FROM loanrequest WHERE LoanReqNum ='" . $_GET['loan'] . "';" or die(mysqli_error($link));
			}
			
			$result = conString($query);
			$rows = mysqli_fetch_array($result);

			$name = "SELECT LastName, FirstName FROM employee WHERE empNum ='" . $rows[1] . "';" or die(mysqli_error($link));
			$res = conString($name);
			$name = mysqli_fetch_array($res);

			echo "<form action='func/processLoan.php' method='POST'>";
				echo "<table class='table table-bordered table-hover'>";
					echo "<tr>";
						echo "<td>Loan Number</td>";
						echo "<td>" . $rows[0] . "</td>";
					echo "</tr>";
				
					echo "<tr>";
						echo "<td>Name</td>";
						echo "<td>" . $name[0] . ", " . $name[1] . "</td>";
					echo "</tr>";
					
					$rows[2] = dateFormat($rows[2]);

					echo "<tr>";
						echo "<td>Date Issued</td>";
						echo "<td>" . $rows[2] ."</td>";
					echo "</tr>";
				
					echo "<tr>";
						echo "<td>Type</td>";
						echo "<td>" . $rows[3] . "</td>";
					echo "</tr>";
				
					echo "<tr>";
						echo "<td>Amount</td>";
						echo "<td>Php " . number_format($rows[4], 2). "</td>";
					echo "</tr>";
				
					echo "<tr>";
						echo "<td>Months</td>";
						echo "<td>" . $rows[5] . "</td>";
					echo "</tr>";
				
				if($_SESSION['posCode'] == '0003'){
					echo "<tr>";
						echo "<td>Monthly Deduction</td>";
						echo "<td><input type='text' name='amount'></td>";
					echo "</tr>"; 
				}
				
				else{
					echo "<tr>";
						echo "<td>Amount</td>";
						echo "<td>" . $rows[9] . "</td>";
					echo "</tr>"; 
				}

					echo "<tr>";
						echo "<td>Reason</td>";
						echo "<td>" . $rows[6] . "</td>";
					echo "</tr>";
				
					echo "<tr>";
						echo "<td>Remarks</td>";
						echo "<td><textarea name='remarks'>" . $rows[7] . "</textarea></td>";
					echo "</tr>";

				if($_SESSION['posCode'] == '0003'){
					echo "<tr>";
						echo "<td>Director's Approval</td>";
						echo "<td>";
							if($rows[8] == ""){
								echo "Pending";
							}

							else{
								echo $rows[8];
							}
						echo "</td>";
					echo "</tr>";
				}

				else{
					echo "<tr>";
						echo "<td>HR Approval</td>";
						echo "<td>";
							if($rows[8] == ""){
								echo "Pending";
							}

							else{
								echo $rows[8];
							}
						echo "</td>";
					echo "</tr>";				
				}

			echo "</table>";
			echo "<input type='hidden' value='" . $_GET['loan'] . "' name='num'>";
		}

		else if($type == 3){
			if($_SESSION['posCode'] == '0003'){
				$query = "SELECT otNum, empNum, dateIssued, dateOT, numhours, status, reason, remarks, deptapproval FROM otrequest WHERE otNum ='" . $_GET['ot'] . "';" or die(mysqli_error($link));
			}

			else{
				$query = "SELECT otNum, empNum, dateIssued, dateOT, numhours, status, reason, remarks, hrapproval FROM otrequest WHERE otNum ='" . $_GET['ot'] . "';" or die(mysqli_error($link));
			}
			
			$result = conString($query);
			$rows = mysqli_fetch_array($result);

			$name = "SELECT LastName, FirstName FROM employee WHERE empNum ='" . $rows[1] . "';" or die(mysqli_error($link));
			$res = conString($name);
			$name = mysqli_fetch_array($res);

			echo "<form action='func/processOT.php' method='POST'>";
				echo "<table class='table table-bordered table-hover'>";
					echo "<tr>";
						echo "<td>Overtime Number</td>";
						echo "<td>" . $rows[0] . "</td>";
					echo "</tr>";
				
					echo "<tr>";
						echo "<td>Name</td>";
						echo "<td>" . $name[0] . ", " . $name[1] . "</td>";
					echo "</tr>";
				
					$rows[2] = dateFormat($rows[2]);
					
					echo "<tr>";
						echo "<td>Date Issued</td>";
						echo "<td>" . $rows[2] ."</td>";
					echo "</tr>";
				
					$rows[3] = dateFormat($rows[3]);
					
					echo "<tr>";
						echo "<td>Overtime for</td>";
						echo "<td>" . $rows[3] . "</td>";
					echo "</tr>";
				
					echo "<tr>";
						echo "<td>Expected Overtime</td>";
						echo "<td>" . $rows[4]. "</td>";
					echo "</tr>";
				
					echo "<tr>";
						echo "<td>Status</td>";
						echo "<td>" . $rows[5] . "</td>";
					echo "</tr>";
				
					echo "<tr>";
						echo "<td>Reason</td>";
						echo "<td>" . $rows[6] . "</td>";
					echo "</tr>";
				
					echo "<tr>";
						echo "<td>Remarks</td>";
						echo "<td><textarea name='remarks'>" . $rows[7] . "</textarea></td>";
					echo "</tr>";

				if($_SESSION['posCode'] == '0003'){
					echo "<tr>";
						echo "<td>Department Head Approval</td>";
						echo "<td>";
							if($rows[8] == ""){
								echo "Pending";
							}

							else{
								echo $rows[8];
							}
						echo "</td>";
					echo "</tr>";
				}

				else{
					echo "<tr>";
						echo "<td>HR Approval</td>";
						echo "<td>";
							if($rows[8] == ""){
								echo "Pending";
							}

							else{
								echo $rows[8];
							}
						echo "</td>";
					echo "</tr>";				
				}

			echo "</table>";
			echo "<input type='hidden' value='" . $_GET['ot'] . "' name='num'>";
		}

		else if($type == 4){
			if($_SESSION['posCode'] == '0003'){
				$query = "SELECT utNum, empNum, dateIssued, dateAb, timeout, status, reason, remarks, deptapproval FROM utrequest WHERE utNum ='" . $_GET['ut'] . "';" or die(mysqli_error($link));
			}

			else{
				$query = "SELECT utNum, empNum, dateIssued, dateAb, timeout, status, reason, remarks, hrapproval FROM utrequest WHERE utNum ='" . $_GET['ut'] . "';" or die(mysqli_error($link));
			}
			
			$result = conString($query);
			$rows = mysqli_fetch_array($result);

			$name = "SELECT LastName, FirstName FROM employee WHERE empNum ='" . $rows[1] . "';" or die(mysqli_error($link));
			$res = conString($name);
			$name = mysqli_fetch_array($res);

			echo "<form action='func/processUT.php' method='POST'>";
				echo "<table class='table table-bordered table-hover'>";
					echo "<tr>";
						echo "<td>Undertime Number</td>";
						echo "<td>" . $rows[0] . "</td>";
					echo "</tr>";
				
					echo "<tr>";
						echo "<td>Name</td>";
						echo "<td>" . $name[0] . ", " . $name[1] . "</td>";
					echo "</tr>";
					
					$rows[2] = dateFormat($rows[2]);

					echo "<tr>";
						echo "<td>Date Issued</td>";
						echo "<td>" . $rows[2] ."</td>";
					echo "</tr>";

					$rows[3] = dateFormat($rows[3]);
					
					echo "<tr>";
						echo "<td>Undertime for</td>";
						echo "<td>" . $rows[3] . "</td>";
					echo "</tr>";
				
					echo "<tr>";
						echo "<td>Expected Timeout</td>";
						echo "<td>" . $rows[4]. "</td>";
					echo "</tr>";
				
					echo "<tr>";
						echo "<td>Status</td>";
						echo "<td>" . $rows[5] . "</td>";
					echo "</tr>";
				
					echo "<tr>";
						echo "<td>Reason</td>";
						echo "<td>" . $rows[6] . "</td>";
					echo "</tr>";
				
					echo "<tr>";
						echo "<td>Remarks</td>";
						echo "<td><textarea name='remarks'>" . $rows[7] . "</textarea></td>";
					echo "</tr>";

				if($_SESSION['posCode'] == '0003'){
					echo "<tr>";
						echo "<td>Department Head Approval</td>";
						echo "<td>";
							if($rows[8] == ""){
								echo "Pending";
							}

							else{
								echo $rows[8];
							}
						echo "</td>";
					echo "</tr>";
				}

				else{
					echo "<tr>";
						echo "<td>HR Approval</td>";
						echo "<td>";
							if($rows[8] == ""){
								echo "Pending";
							}

							else{
								echo $rows[8];
							}
						echo "</td>";
					echo "</tr>";				
				}

			echo "</table>";
			echo "<input type='hidden' value='" . $_GET['ut'] . "' name='num'>";
		}


		echo "<button class='btn btn-success' name='submit' value='approve'>Approve</button>";
		echo "<button class='btn btn-danger' name='submit' value='Reject'>Reject</button>";
		echo "</form>";
	}

?>