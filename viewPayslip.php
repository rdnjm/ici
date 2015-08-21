<?php 
	SESSION_START();
	include 'needs/connString.php';
	include 'func/functions.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Payroll Period <?php echo $_GET['date'] . " - " . $_GET['end'];?></title>
		<meta name="viewport" content = "width=device-width, initial-scale=1.0">
		<link rel='stylesheet' type='text/css' href='css/bootstrap.css'>
	</head>
	
	<body>
		<?php
			if(isset($_SESSION['posCode'])){
				accessType();	
				echo getPos();?>
			
				<div class='container'>
					<input type='hidden' id='date' <?php echo "value='" . $_GET['date'] . "'";?> name='date'>
					<input type='hidden' id='end' <?php echo "value='" . $_GET['end'] . "'";?> name='end'>
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
			 var date = $( '#date' ).attr('value');
			 var end = $( '#end' ).attr('value');

			 $.ajax({
			 	type: 'POST',
			 	url:  'func/forSinglePayslip.php',
			 	data: {date:date, end:end},
			 	success: function(data){
			 		$( '#view' ).html(data);
			 	} 
			 });
		});
	</script>
</html>