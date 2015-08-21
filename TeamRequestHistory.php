<?php 
	session_start();
    error_reporting(0);
	include 'needs/connString.php';
	include 'func/functions.php';
	$dept = getDept($_SESSION['posCode']);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Approve <?php echo $dept; ?> Requests</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' type='text/css' href='css/bootstrap.css'>
        <script src='js/jQueryFunc.js' defer></script>
    </head>

	<body>
	    <?php
            if(isset($_SESSION['posCode'])){
                accessType();   
        }
        ?>
		<div class='container-fluid'>
			<div class='container'>
				<ul class='nav nav-tabs'>
					<li class='active'><a data-toggle='tab' href='#leave' onclick="getReq('1')">Leave Request</a></li>
					<li><a data-toggle='tab' href='#overtime' onclick="getReq('3')">Overtime Request</a></li>
					<li><a data-toggle='tab' href='#undertime' onclick="getReq('4')">Undertime Request</a></li>
				</ul>

				<div class='tab-content'>
					<div class='table-responsive'>
						<div id='process'>
						</div>
					</div>
				</div>
			</div>
		</div>

	    <script src="js/jquery-1.11.3.min.js"></script>
	    <script src='js/bootstrap.js'></script>
	    <script>
    		$(document).ready(function() {
        		var type = 1;
        		$.ajax({
					type:     'POST',
					url:      'func/getApproveHistory.php',
					data:     {type:type},
					success:  function(data) {
            			$('#process').html(data);
          			}
        		});
      		});

			function getReq(type) {
    		    $.ajax({
					type:     'POST',
					url:      'func/getApproveHistory.php',
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
    	</script>
	</body>
</html>