<?php
	session_start();
	include '../needs/connString.php';

	$_POST['index'] = 0;
	$_POST['empNum'] = 0;
	$type = $_SESSION['posCode'];
	if($type == '0001'){
		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='myInfo.php'><button class='btn btn-info btn-block' >My Info</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='MyPayslip.php'><button class='btn btn-info btn-block'>My Payslip</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='MyDailyLogs.php'><button class='btn btn-info btn-block'>My Daily Logs</button></a>";
			echo "</div>";
		echo "</div>";

		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='employeemanagement.php'><button class='btn btn-success btn-block'>Employee Management</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='ApproveRequest.php'<button class='btn btn-success btn-block'>Employee Requests Viewer</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='#'><button class='btn btn-success btn-block'>Employee Attendance</button></a>";
			echo "</div>";
		echo "</div>";
	}

	else if($type == '0002'){
		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='myInfo.php'><button class='btn btn-info btn-block' >My Info</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='MyPayslip.php'><button class='btn btn-info btn-block'>My Payslip</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='MyDailyLogs.php'><button class='btn btn-info btn-block'>My Daily Logs</button></a>";
			echo "</div>";
		echo "</div>";

		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='teamManagement.php>'<button class='btn btn-success btn-block'>Team Management</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='TeamRequestViewer.php'><button class='btn btn-success btn-block'>Team Requests Viewer</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='TeamLogs.php'><button class='btn btn-success btn-block'>Team Attendance</button></a>";
			echo "</div>";
		echo "</div>";

		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='generatePayroll.php'><button class='btn btn-warning btn-block'>Payroll Generation</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='EmployeeLoanManagement.php'><button class='btn btn-warning btn-block'>Employee Loan Management</button></a>";
			echo "</div>";
		echo "</div>";
	}

	else if($type == '0002A'){
		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='myInfo.php'><button class='btn btn-info btn-block' >My Info</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='MyPayslip.php'><button class='btn btn-info btn-block'>My Payslip</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='MyDailyLogs.php'><button class='btn btn-info btn-block'>My Daily Logs</button></a>";
			echo "</div>";
		echo "</div>";

		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='generatePayroll.php'><button class='btn btn-warning btn-block'>Payroll Generation</button></a>";
			echo "</div>";
		echo "</div>";
	}

	else if($type == '0003'){
		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='myInfo.php'><button class='btn btn-info btn-block' >My Info</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='MyPayslip.php'><button class='btn btn-info btn-block'>My Payslip</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='MyDailyLogs.php'><button class='btn btn-info btn-block'>My Daily Logs</button></a>";
			echo "</div>";
		echo "</div>";

		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='employeemanagement.php'><button class='btn btn-success btn-block'>Employee Management</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='ApproveRequest.php'<button class='btn btn-success btn-block'>Employee Requests Viewer</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='#'><button class='btn btn-success btn-block'>Employee Attendance</button></a>";
			echo "</div>";
		echo "</div>";
	}

	else if(strpos($type, 'A')){
		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='myInfo.php'><button class='btn btn-info btn-block' >My Info</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='MyPayslip.php'><button class='btn btn-info btn-block'>My Payslip</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='MyDailyLogs.php'><button class='btn btn-info btn-block'>My Daily Logs</button></a>";
			echo "</div>";
		echo "</div>";

		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='RequestForms.php'><button class='btn btn-info btn-block'>Request Forms</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='RequestViewer.php'><button class='btn btn-info btn-block'>My Requests Viewer</button></a>";
			echo "</div>";
		echo "</div>";
	}

	else if(strpos($type, 'B')){
		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='myInfo.php'><button class='btn btn-info btn-block' >My Info</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='MyPayslip.php'><button class='btn btn-info btn-block'>My Payslip</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='MyDailyLogs.php'><button class='btn btn-info btn-block'>My Daily Logs</button></a>";
			echo "</div>";
		echo "</div>";

		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='RequestForms.php'><button class='btn btn-info btn-block'>Request Forms</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='RequestViewer.php'><button class='btn btn-info btn-block'>My Requests Viewer</button></a>";
			echo "</div>";
		echo "</div>";
	}

	else if($type == '0004'){
		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='myInfo.php'><button class='btn btn-info btn-block' >My Info</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='MyPayslip.php'><button class='btn btn-info btn-block'>My Payslip</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='MyDailyLogs.php'><button class='btn btn-info btn-block'>My Daily Logs</button></a>";
			echo "</div>";
		echo "</div>";

		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='teamManagement.php>'<button class='btn btn-success btn-block'>Team Management</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='TeamRequestViewer.php'><button class='btn btn-success btn-block'>Team Requests Viewer</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='TeamLogs.php'><button class='btn btn-success btn-block'>Team Attendance</button></a>";
			echo "</div>";
		echo "</div>";
	}

	else if($type == '0005'){
		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='myInfo.php'><button class='btn btn-info btn-block' >My Info</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='MyPayslip.php'><button class='btn btn-info btn-block'>My Payslip</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='MyDailyLogs.php'><button class='btn btn-info btn-block'>My Daily Logs</button></a>";
			echo "</div>";
		echo "</div>";

		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='teamManagement.php>'<button class='btn btn-success btn-block'>Team Management</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='TeamRequestViewer.php'><button class='btn btn-success btn-block'>Team Requests Viewer</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='TeamLogs.php'><button class='btn btn-success btn-block'>Team Attendance</button></a>";
			echo "</div>";
		echo "</div>";
	}

	else if($type == '0006'){
		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='myInfo.php'><button class='btn btn-info btn-block' >My Info</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='MyPayslip.php'><button class='btn btn-info btn-block'>My Payslip</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='MyDailyLogs.php'><button class='btn btn-info btn-block'>My Daily Logs</button></a>";
			echo "</div>";
		echo "</div>";

		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='teamManagement.php>'<button class='btn btn-success btn-block'>Team Management</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='TeamRequestViewer.php'><button class='btn btn-success btn-block'>Team Requests Viewer</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='TeamLogs.php'><button class='btn btn-success btn-block'>Team Attendance</button></a>";
			echo "</div>";
		echo "</div>";
	}

	else if($type == '0007'){
		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='myInfo.php'><button class='btn btn-info btn-block' >My Info</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='MyPayslip.php'><button class='btn btn-info btn-block'>My Payslip</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='MyDailyLogs.php'><button class='btn btn-info btn-block'>My Daily Logs</button></a>";
			echo "</div>";
		echo "</div>";

		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='teamManagement.php>'<button class='btn btn-success btn-block'>Team Management</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='TeamRequestViewer.php'><button class='btn btn-success btn-block'>Team Requests Viewer</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='TeamLogs.php'><button class='btn btn-success btn-block'>Team Attendance</button></a>";
			echo "</div>";
		echo "</div>";
	}

	else if($type == '0008'){
		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='myInfo.php'><button class='btn btn-info btn-block' >My Info</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='MyPayslip.php'><button class='btn btn-info btn-block'>My Payslip</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='MyDailyLogs.php'><button class='btn btn-info btn-block'>My Daily Logs</button></a>";
			echo "</div>";
		echo "</div>";

		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='teamManagement.php>'<button class='btn btn-success btn-block'>Team Management</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='TeamRequestViewer.php'><button class='btn btn-success btn-block'>Team Requests Viewer</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='TeamLogs.php'><button class='btn btn-success btn-block'>Team Attendance</button></a>";
			echo "</div>";
		echo "</div>";
	}

	else if($type == '0009'){
		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='myInfo.php'><button class='btn btn-info btn-block' >My Info</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='MyPayslip.php'><button class='btn btn-info btn-block'>My Payslip</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='MyDailyLogs.php'><button class='btn btn-info btn-block'>My Daily Logs</button></a>";
			echo "</div>";
		echo "</div>";

		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='teamManagement.php>'<button class='btn btn-success btn-block'>Team Management</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='TeamRequestViewer.php'><button class='btn btn-success btn-block'>Team Requests Viewer</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='TeamLogs.php'><button class='btn btn-success btn-block'>Team Attendance</button></a>";
			echo "</div>";
		echo "</div>";
	}

	else if($type == '0010'){
		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='myInfo.php'><button class='btn btn-info btn-block' >My Info</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='MyPayslip.php'><button class='btn btn-info btn-block'>My Payslip</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='MyDailyLogs.php'><button class='btn btn-info btn-block'>My Daily Logs</button></a>";
			echo "</div>";
		echo "</div>";

		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='teamManagement.php>'<button class='btn btn-success btn-block'>Team Management</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='TeamRequestViewer.php'><button class='btn btn-success btn-block'>Team Requests Viewer</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='TeamLogs.php'><button class='btn btn-success btn-block'>Team Attendance</button></a>";
			echo "</div>";
		echo "</div>";
	}

	else if($type == '0011'){
		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='myInfo.php''><button class='btn btn-info btn-block' >My Info</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='MyPayslip.php'><button class='btn btn-info btn-block'>My Payslip</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='MyDailyLogs.php'><button class='btn btn-info btn-block'>My Daily Logs</button></a>";
			echo "</div>";
		echo "</div>";

		echo "<div class='col-sm-10 col-xs-10 col-md-10'>";
			echo "<div class='col-lg-4'>";
				echo "<a href='teamManagement.php>'<button class='btn btn-success btn-block'>Team Management</button></a>";
			echo "</div>";
							
			echo "<div class='col-lg-4'>";
				echo "<a href='TeamRequestViewer.php'><button class='btn btn-success btn-block'>Team Requests Viewer</button></a>";
			echo "</div>";

			echo "<div class='col-lg-4'>";
				echo "<a href='TeamLogs.php'><button class='btn btn-success btn-block'>Team Attendance</button></a>";
			echo "</div>";
		echo "</div>";
	}

	else{
		header("LOCATION: login.php?err=2");
	}
?>