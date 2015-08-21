<?php 
	session_start();
    error_reporting(0);
	include 'needs/connString.php';
	include 'func/functions.php';	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>My Info</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' type='text/css' href='css/bootstrap.css'>
    </head>
	
	<body>
		<?php
			if(isset($_SESSION['posCode'])){
				accessType();	
			}

			else{
				header("LOCATION: login.php");
			}

			if(isset($_GET['edit'])){
				include 'func/editMyInfo.php';
			}

			else{
				$_GET['empNum'] = $_SESSION['logged'];
				include 'func/inDetailsViewer.php';
			}
		?>
	</body>
</html>