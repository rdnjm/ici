<?php 
	SESSION_START();
	include 'needs/connString.php';
	include 'func/functions.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Payroll Generation</title>
		<meta name="viewport" content = "width=device-width, initial-scale=1.0">
		<link rel='stylesheet' type='text/css' href='css/bootstrap.css'>
	</head>
	
	<body>
		<?php
			if(isset($_SESSION['posCode'])){
				accessType();	
				echo getPos();?>
			
				<div class='container'>
					<div class='row'>						
						<div id='view'>
						</div>
					</div>
				</div>

			<?php }

			if(isset($_GET['view'])){
							
			}

			else{
				header("LOCATION: login.php");
			}

		?>
	</body>
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src='js/bootstrap.js'></script>
	<script>
		$(document).ready(function(){
			 $.ajax({
			 	type: 'POST',
			 	url:  'func/generateDate.php',
			 	success: function(data){
			 		$( '#view' ).html(data);
			 	} 
			 });
		});
	</script>
</html>