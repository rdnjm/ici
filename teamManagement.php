<?php 
	SESSION_START();
	error_reporting(0);
	include 'needs/connString.php';
	include 'func/functions.php';
    $dept = getDept($_SESSION['posCode']);
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $dept;?> Management</title>
		<meta name="viewport" content = "width=device-width, initial-scale=1.0">
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
		?>

		<div class='container-fluid'>
            <div class='container'>
            <?php 
                    if($_GET['view'] == "true" && $_GET['empNum']){ 
                        include 'func/teamDetailsViewer.php';
                    }
                    
                    else if($_GET['edit'] == "true" && $_GET['empNum']){ 
                        include 'func/editDetails.php';
                    }

            		else{	?>
                        <div class='row'>
                            <div class='col-md-6'>
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
        <script>
            $(document).ready(function(){
                var type = 1;
                    $.ajax({
                        type:     'POST',
                        url:      'func/teamEmp.php',
                        data:     {type:type},
                        success:  function(data) {
                            $('#emp-list-table').html(data);
                    }
                });
            });
        </script>
	</body>
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src='js/bootstrap.js'></script>
</html>