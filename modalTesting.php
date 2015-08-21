<?php 
	session_start();
    error_reporting(0);
	include 'needs/connString.php';
	include 'func/functions.php';
	$table = "employee";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>modal testing</title>
		<link rel='stylesheet' type='text/css' href='css/bootstrap.css'>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	
	<body>
		<div class='container-fluid'>
			<a data-toggle="modal" data-target="#myModal" class="btn btn-primary" href='modalViewer.php?view=true&empNum=$rows[0]' >111</a>
			<a data-toggle="modal" data-target="#myModal" class="btn btn-primary" value='2014-000' href='employeemanagement.php?empNum=2014-001'>2014-001</a>
			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Modal Header</h4>
			      </div>
			      <div class="modal-body">
			        <p>Some text in the modal.</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>
		</div>
	</body>
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src='js/bootstrap.js'></script>
</html>