<?php 
	SESSION_START();
	include 'needs/connString.php';
	include 'func/functions.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Online Attendance Management</title>
		<meta name="viewport" content = "width=device-width, initial-scale=1.0">
		<link rel='stylesheet' type='text/css' href='css/bootstrap.css'>
		<script type="text/javascript" src='js/date_time.js'></script>
	</head>
	
	<body>
		<?php
			if(isset($_SESSION['posCode'])){
				accessType();	
				echo getPos();?>
			
				<div class='container'>
					<div class='row'>
						<div class='row-sm-12 row-xs-12 col-md-12' id='date'>
							<span id="date_time"></span>
							<script type="text/javascript">window.onload = date_time('date_time');</script>
						</div>
						
						<div id='login'>
							<label for='username'>Employee Number: </label>
							<input type='text' name='username' id='username'>
							<br>
							<label for='password'>Password: </label>
							<input type='password' name='password' id='password'>
							<br>
							<button class='btn btn-success' value='Submit' id='button'>Time-in</button>
						</div>

						<div id='notif'>
							
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
	<script type="text/javascript">
		$( '#button' ).click(function(){
			var username = document.getElementById('username').value;
			var password = document.getElementById('password').value;

			$.ajax({
				url: 'func/checkLogin.php',
				type: 'post',
				data: {username:username, password:password},
				success: function(data){
					$('#notif').html(data);
				}
			});
		});
	</script>
</html>