<html>
	<head>
		<title>Data Table</title>
		<script type="text/javascript" src='../js/jquery.js'></script>
		<script type="text/javascript" src='../js/jquery.dataTables.js'></script>
		<script type='text/javascript' charset='utf'-8''>
			$(document).ready(function(){
				$('#leaveViewer').dataTable({
					"pagingType": "full_numbers",
				})
			});
		</script>
		<link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
	</head>
	<body>
<?php
	session_start();
	include '../needs/connString.php';
	$empNum = $_SESSION['empNum'];

	$query = "SELECT LeaveReqNum, dateIssued, dateAb, endDate, type, status, reason, remarks FROM leaverequest WHERE empNum='" . $empNum . "';" or die(mysqli_error($link));
	$result = conString($query);

	echo "<table class='table table-bordered table-hover' id='leaveViewer'>";
		echo "<thead>";
			echo "<tr>";
				echo "<th></th>";
				echo "<th>Date Issued</th>";
				echo "<th>Leave Start</th>";
				echo "<th>Leave End</th>";
				echo "<th>Type</th>";
				echo "<th>Status</th>";
				echo "<th>Reason</th>";
				echo "<th>Remarks</th>";
			echo "</tr>";
		echo "</thead>";

		echo "<tbody>";
			while($rows = mysqli_fetch_array($result)){
				echo "<tr>";
					echo "<td>" . $rows[0] . "</td>";
					echo "<td>" . $rows[1] . "</td>";
					echo "<td>" . $rows[2] . "</td>";
					echo "<td>" . $rows[3] . "</td>";
					echo "<td>" . $rows[4] . "</td>";
					echo "<td>" . $rows[5] . "</td>";
					echo "<td>" . $rows[6] . "</td>";
					echo "<td>" . $rows[7] . "</td>";
				echo "</tr>";
			}
		echo "</tbody>";
	echo "</table>";

?>
	</body>
</html>