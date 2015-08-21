<?php 
	session_start();
    error_reporting(0);
	include 'needs/connString.php';
	include 'func/functions.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Employee Mangement</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' type='text/css' href='css/bootstrap-datetimepicker.css'>
        <link rel='stylesheet' type='text/css' href='css/bootstrap.css'>
        <script src='js/jQueryFunc.js' defer></script>
    </head>
	
	<body>
        <?php
            if(isset($_SESSION['posCode'])){
                accessType();   
        }?>
        
        <div class='container-fluid'>
            <div class='container'>
                <?php 
                    if($_GET['view'] == "true" && $_GET['empNum']){ 
                        include 'func/detailsViewer.php';
                    }

                    else if($_GET['delete'] == "false" && $_GET['empNum']){
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

                    else if($_GET['delete'] == "true" && $_GET['empNum']){
                        include 'func/deleteFunc.php';
                    }

                    else if($_GET['edit'] == "true" && $_GET['empNum']){
                        include 'func/editDetails.php';
                    }

            		else{	?>
                        <div class='row'>
                            <div class='col-md'>
                               <div align = "right">
<a href='addEmployee.php'><button class='btn btn-primary'>Add Employee</button></a>
</div><br>
                                <div class='table-responsive' id='emp-list-table'>
                                                </table>
                                </div>
                             </div>
                        </div> 
                <?php }?>
            </div>
        </div>
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src='js/bootstrap.js'></script>
        <script src='js/bootstrap-datetimepicker.js'></script>
        <script>
            $(document).ready(function(){
                var type = 1;
                    $.ajax({
                        type:     'POST',
                        url:      'func/emp.php',
                        data:     {type:type},
                        success:  function(data) {
                            $('#emp-list-table').html(data);
                    }
                });
            });
        </script>

	</body>
</html>