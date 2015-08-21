<?php 
	SESSION_START();
	include 'needs/connString.php';
	include 'func/functions.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>My Daily Logs</title>
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

			else{
				header("LOCATION: login.php");
			}
		?>
	</body>
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src='js/bootstrap.js'></script>
	<script>
		$(document).ready(function(){
			 var index = $( '#posCode' ).attr('value');
			 var empNum = $( '#empNum' ).attr('value');

			 $.ajax({
			 	type: 'POST',
			 	url:  'func/forLogs.php',
			 	data: {index:index, empNum:empNum},
			 	success: function(data){
			 		$( '#view' ).html(data);
			 	} 
			 });
		});
	</script>
</html>