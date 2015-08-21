<?php 
	session_start();
    error_reporting(0);
	include 'needs/connString.php';
	include 'func/functions.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Request Viewer</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="js/jquery.js"></script>
	    <script src='js/bootstrap.js'></script>
	    <script src='js/jquery.dataTables.js'></script>
        <link rel='stylesheet' type='text/css' href='css/bootstrap.css'>
        <link rel='stylesheet' type='text/css' href='css/bootstrap-datetimepicker.css'>
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
    </head>

	<body>
	    <?php
            if(isset($_SESSION['posCode'])){
                accessType();   
        }?>
		<div class='container-fluid'>
			<div class='container'>
				Request Viewer
			</div>
			<div class='container'>
				<div class='col-md-12'>
					<ul class='nav nav-tabs'>
						<li class='active'><a data-toggle='tab' href='#leave' onclick="getReq('1')">Leave Request</a></li>
						<li><a data-toggle='tab' href='#loan' onclick="getReq('2')">Loan Request</a></li>
						<li><a data-toggle='tab' href='#overtime' onclick="getReq('3')">Overtime Request</a></li>
						<li><a data-toggle='tab' href='#undertime' onclick="getReq('4')">Undertime Request</a></li>
					</ul>

					<div class='tab-content'>
						<div class='table-responsive'>
							<div id='view'>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	    <script src="js/jquery.js"></script>
	    <script src='js/bootstrap.js'></script>
        <script src='js/bootstrap-datetimepicker.js'></script>
	    <script src='js/jquery.dataTables.js'></script>
	    <script>
    		$(document).ready(function() {
        		var type = 1;
        		$.ajax({
					type:     'POST',
					url:      'func/getViewForms.php',
					data:     {type:type},
					success:  function(data) {
            			$('#view').html(data);
          			}
        		});
      		});

			function getReq(type) {
    		    $.ajax({
					type:     'POST',
					url:      'func/getViewForms.php',
					data:     {type:type},
					success:  function(data) {
						$('#view').html(data);
          			}
        		});
      		}

			function addsubj(e){
				$('#addsubject').modal('show');
			}

			function goBack() {
    			window.history.go(-1);
			}
    	</script>
	</body>
</html>