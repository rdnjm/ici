<?php
	session_start();
	include '../needs/connString.php';
	include 'functions.php';

	if(isset($_POST['type'])){
		$type = $_POST['type'];

		if($type == 1){
			echo "<script type='text/javascript' src='js/jquery.js'></script>";
			echo "<script type='text/javascript' src='js/bootstrap.js'></script>";
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
						echo "<th>Leave Type</th>";
					echo "</tr>";
				echo "</thead>";

				$empNum = $_SESSION['empNum']; 

				if($_SESSION['posCode'] == '0003'){
					$query = "SELECT LeaveReqNum, empNum, dateIssued, type FROM leaverequest WHERE status='pending' AND hrapproval='';" or die(mysqli_error($link));
				}

				else{
					$query = "SELECT LeaveReqNum, empNum, dateIssued, type FROM leaverequest WHERE status='pending' AND deptapproval='';" or die(mysqli_error($link));
				}
				$result = conString($query);
				echo "<tbody>";
					while($rows = mysqli_fetch_array($result)){
						$name = "SELECT LastName, FirstName FROM employee WHERE empNum ='" . $rows[1] . "';" or die(mysqli_error($link));
						$res = conString($name);
						$name= mysqli_fetch_array($res);
						$rows[2] = dateFormat($rows[2]);
					
						echo "<tr>";
							echo "<td class='cont' value='" . $rows[0] . "'><a href='ApproveRequest.php?view=true&leave=" . $rows[0] ."&type=1'>" . $rows[0] . "</a></td>";
							echo "<td class='cont' value='" . $rows[0] . "'><a href='ApproveRequest.php?view=true&leave=" . $rows[0] ."&type=1'>" . $name[0] . ", " . $name[1] . "</td>";
							echo "<td class='cont' value='" . $rows[0] . "'><a href='ApproveRequest.php?view=true&leave=" . $rows[0] ."&type=1'>" . $rows[2] . "</td>";
							echo "<td class='cont' value='" . $rows[0] . "'><a href='ApproveRequest.php?view=true&leave=" . $rows[0] ."&type=1'>" . $rows[3] . "</td>";
						echo "</tr>";
					}
				echo "</tbody>";
			echo "</table>";
		}

		else if($type == 2){
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
					echo "</tr>";
				echo "</thead>";

				$empNum = $_SESSION['empNum']; 
				if($_SESSION['posCode'] == '0003'){
					$query = "SELECT LoanReqNum, empNum, dateIssued, loantype FROM loanrequest WHERE status='pending' AND hrapproval='';" or die(mysqli_error($link));
				}
				
				else{
					$query = "SELECT LoanReqNum, empNum, dateIssued, loantype FROM loanrequest WHERE status='pending' AND dirapproval='';" or die(mysqli_error($link));
				}

				$result = conString($query);
				echo "<tbody>";
					while($rows = mysqli_fetch_array($result)){
						$name = "SELECT LastName, FirstName FROM employee WHERE empNum ='" . $rows[1] . "';" or die(mysqli_error($link));
						$res = conString($name);
						$name= mysqli_fetch_array($res);
						$rows[2] = dateFormat($rows[2]);

						echo "<tr>";
							echo "<td class='cont' value='" . $rows[0] . "'><a href='ApproveRequest.php?view=true&loan=" . $rows[0] ."&type=2'>" . $rows[0] . "</a></td>";
							echo "<td class='cont' value='" . $rows[0] . "'><a href='ApproveRequest.php?view=true&loan=" . $rows[0] ."&type=2'>" . $name[0] . ", " . $name[1] . "</a></td>";
							echo "<td class='cont' value='" . $rows[0] . "'><a href='ApproveRequest.php?view=true&loan=" . $rows[0] ."&type=2'>" . $rows[2] . "</a></td>";
							echo "<td class='cont' value='" . $rows[0] . "'><a href='ApproveRequest.php?view=true&loan=" . $rows[0] ."&type=2'>" . $rows[3] . "</a></td>";
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
					echo "</tr>";
				echo "</thead>";

				$empNum = $_SESSION['empNum']; 
				if($_SESSION['posCode'] == '0003'){
					$query = "SELECT otNum, empNum, dateIssued, dateOT FROM otrequest WHERE status='pending' AND hrapproval='';" or die(mysqli_error($link));
				}

				else{			
					$query = "SELECT otNum, empNum, dateIssued, dateOT FROM otrequest WHERE status='pending' AND deptapproval='';" or die(mysqli_error($link));
				}
				$result = conString($query);
				echo "<tbody>";
					while($rows = mysqli_fetch_array($result)){
						$name = "SELECT LastName, FirstName FROM employee WHERE empNum ='" . $rows[1] . "';" or die(mysqli_error($link));
						$res = conString($name);
						$name= mysqli_fetch_array($res);
						$rows[2] = dateFormat($rows[2]);

						echo "<tr>";
							echo "<td class='cont' value='" . $rows[0] . "'><a href='ApproveRequest.php?view=true&ot=" . $rows[0] ."&type=3'>" . $rows[0] . "</a></td>";
							echo "<td class='cont' value='" . $rows[0] . "'><a href='ApproveRequest.php?view=true&ot=" . $rows[0] ."&type=3'>" . $name[0] . ", " . $name[1] . "</a></td>";
							echo "<td class='cont' value='" . $rows[0] . "'><a href='ApproveRequest.php?view=true&ot=" . $rows[0] ."&type=3'>" . $rows[2] . "</a></td>";
							echo "<td class='cont' value='" . $rows[0] . "'><a href='ApproveRequest.php?view=true&ot=" . $rows[0] ."&type=3'>" . $rows[3] . "</a></td>";
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
					echo "</tr>";
				echo "</thead>";

				$empNum = $_SESSION['empNum']; 
				if($_SESSION['posCode'] == '0003'){
					$query = "SELECT utNum, empNum, dateIssued, dateAb FROM utrequest WHERE status='pending' AND hrapproval='';" or die(mysqli_error($link));
				}

				else{				
					$query = "SELECT utNum, empNum, dateIssued, dateAb FROM utrequest WHERE status='pending' AND deptapproval='';" or die(mysqli_error($link));
				}
				$result = conString($query);
				echo "<tbody>";
					while($rows = mysqli_fetch_array($result)){
						$name = "SELECT LastName, FirstName FROM employee WHERE empNum ='" . $rows[1] . "';" or die(mysqli_error($link));
						$res = conString($name);
						$name= mysqli_fetch_array($res);
						$rows[2] = dateFormat($rows[2]);

						echo "<tr>";
							echo "<td class='cont' value='" . $rows[0] . "'><a href='ApproveRequest.php?view=true&ut=" . $rows[0] ."&type=4'>" . $rows[0] . "</a></td>";
							echo "<td class='cont' value='" . $rows[0] . "'><a href='ApproveRequest.php?view=true&ut=" . $rows[0] ."&type=4'>" . $name[0] . ", " . $name[1] . "</a></td>";
							echo "<td class='cont' value='" . $rows[0] . "'><a href='ApproveRequest.php?view=true&ut=" . $rows[0] ."&type=4'>" . $rows[2] . "</a></td>";
							echo "<td class='cont' value='" . $rows[0] . "'><a href='ApproveRequest.php?view=true&ut=" . $rows[0] ."&type=4'>" . $rows[3] . "</a></td>";
						echo "</tr>";
					}
				echo "</tbody>";
			echo "</table>";

			//echo "<div id='modal'>";
    		//echo "</div>";
		}
	}
?>
<script type="text/javascript">
	
	$("#leaveViewer .cont").click(function(){
		var num = $(this).attr('value');
		var type = 1;

		$.ajax({
			type: 'POST',
			url: 'func/getData.php',
			data: {num: num, type: type},
			success: function(data){
        		$('#leaveModal').modal('show');
			}
		});
      });

	$("#loanViewer .cont").click(function(){
		var num = $(this).attr('value');
		var type = 2;
        
      });

	$("#otViewer .cont").click(function(){
		var num = $(this).attr('value');
		var type = 3;
        
      });

	$("#utViewer .cont").click(function(){
		var num = $(this).attr('value');
		var type = 4;
        
      });
</script>