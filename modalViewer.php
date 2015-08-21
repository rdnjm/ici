<?php 
	session_start();
    error_reporting(0);
	include 'needs/connString.php';
	include 'func/functions.php';
	$table = "employee";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Employee Mangement</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' type='text/css' href='css/bootstrap.css'>
    </head>
	
	<body>
    <div class='container-fluid'>
	<?php 
		if($_GET['view'] == "true" && $_GET['empNum']){ 
			include 'func/modalDetails.php';
		}

        if($_GET['delete'] == "false" && $_GET['empNum']){
            //MODAL DAPAT 
            //JQuery

            //temporary code
            ?>

            <div align='center'>
                Are you sure you want to delete this record?
                <?php echo "<a href='func/deleteRecord.php?empNum=" . $_GET['empNum'] . "'\>"; ?><button onclick='func/deleteRecord.php'>Yes</button></a>
                <button onclick='history.go(-1);'>No</button>
                <?php
                    include 'func/detailsViewer.php';
                ?>
            </div>
            <?php 
            //temporary code
        }

        if($_GET['delete'] == "true" && $_GET['empNum']){
            include 'func/deleteFunc.php';
        }

        else if($_GET['edit'] == "true" && $_GET['empNum']){
            include 'func/editDetails.php';
        }?>
    </div>
	</body>
    <script src='js/bootstrap.js'>
</html>