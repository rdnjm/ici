<?php 
	session_start();
    error_reporting(0);
	include 'needs/connString.php';
	include 'func/functions.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Request Forms</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' type='text/css' href='css/bootstrap.css'>
        <link rel='stylesheet' type='text/css' href='css/bootstrap-datetimepicker.min.css'>;
        <script src='js/jQueryFunc.js' defer></script>
    </head>

	<body>
	    <?php
            if(isset($_SESSION['posCode'])){
                accessType();   
        }?>
		<div class='container-fluid'>
			<div class='container'>
				<div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Request Forms</h1>
                <hr>
            </div>
        </div>
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
						<div id='process'>
						</div>
					</div>
				</div>
			</div>
		</div>
	    <script src="js/jquery-1.11.3.min.js"></script>
		<script src='js/bootstrap-datetimepicker.min.js'></script>
	    <script src='js/bootstrap.js'></script>
	    <script>
    		$(document).ready(function() {
        		var type = 1;
        		$.ajax({
					type:     'POST',
					url:      'func/getReqForms.php',
					data:     {type:type},
					success:  function(data) {
            			$('#process').html(data);
          			}
        		});
      		});

			function getReq(type) {
    		    $.ajax({
					type:     'POST',
					url:      'func/getReqForms.php',
					data:     {type:type},
					success:  function(data) {
						$('#process').html(data);
          			}
        		});
      		}

			function addsubj(e){
				$('#addsubject').modal('show');
			}

			function goBack() {
    			window.history.go(-1);
			}
		    
		    $(".form_datetime").datetimepicker({
        		format: "yyyy-mm-dd"
    		});  
    	</script>
	</body>
</html>