<?php 
	session_start();
    error_reporting(0);
	include 'needs/connString.php';
	include 'func/functions.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PhilHealth Table</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                <h1>PhilHealth Table</h1>
                <table class='table table-bordered table-hover'>
                    <tr>
                        <th>Amount</th>
                        <th>Salary Base</th>
                        <th>Total Monthly Premium</th>
                        <th>EE</th>
                        <th>ER</th>
                    </tr>
                    <?php 
                        $query = "SELECT * FROM philhealthtable;" or die(mysqli_error($link));
                        $result = conString($query);
                        while($rows = mysqli_fetch_array($result)){
                            $string = $rows[1] . " - " . $rows[2];

                            if($rows[2] ==  '999999.99'){
                                $string = 'Above Php 35,000.00';
                            }

                            if($rows[1] == '0'){
                                $string = 'Below Php ' . number_format($rows[2], 2);
                            }


                            echo "<tr>";
                                echo "<td>" . $string . "</td>";
                                echo "<td>" . number_format($rows[3], 2) . "</td>";
                                echo "<td>" . number_format($rows[4], 2) . "</td>";
                                echo "<td>" . number_format($rows[5], 2) . "</td>";
                                echo "<td>" . number_format($rows[6], 2) . "</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
        </div>

        <script src="js/jquery-1.11.3.min.js"></script>
        <script src='js/bootstrap.js'></script>
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