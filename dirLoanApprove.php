<?php 
	session_start();
    error_reporting(0);
	include 'needs/connString.php';
	include 'func/functions.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Approve Loan Requests</title>
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
			<?php 
				if($_GET['view'] == "true"){ 
			    	include 'func/getData.php';
	        	}
        	
        		else{
			?>

				Approve Loan Requests
			</div>
			<div class='container'>
				<div class='col-md-12'>
					<ul class='nav nav-tabs'>
						<li class='active'><a data-toggle='tab' href='#loan' onclick="getReq('2')">Loan Requests</a></li>
					</ul>

					<div class='tab-content'>
						<div id='process'>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php } ?>

	    <script src="js/jquery-1.11.3.min.js"></script>
	    <script src='js/bootstrap.js'></script>
	    <script>
    		$(document).ready(function() {
        		var type = 2;
        		$.ajax({
					type:     'POST',
					url:      'func/getRequests.php',
					data:     {type:type},
					success:  function(data) {
            			$('#process').html(data);
          			}
        		});
      		});

			function getReq(type) {
    		    $.ajax({
					type:     'POST',
					url:      'func/getRequests.php',
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