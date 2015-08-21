<?php 
	SESSION_START();
	include 'needs/connString.php';
	include 'func/functions.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ICI Ministries Philippines Portal</title>
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
						<div class='col-sm-2 col-xs-2 col-md-2'>
							<div class='row'>
								<div class='row-sm-12 row-xs-12 col-md-12'>
									<img src="images/pic.jpg" width="100%">
								</div>

								<div class='row-sm-12 row-xs-12 col-md-12'>
									Welcome <?php echo getName();?>
								</div>
							</div>
						</div>
						
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
			 	url:  'func/forIndex.php',
			 	data: {index:index, empNum:empNum},
			 	success: function(data){
			 		$( '#view' ).html(data);
			 	} 
			 });
		});
	</script>
</html>