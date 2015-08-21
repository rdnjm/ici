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
                <h1>SSS Table</h1>
                <table class='table table-bordered table-hover'>
                    <tr>
                        <th>Amount</th>
                        <th>Monthly Salary Credit</th>
                        <th>ER</th>
                        <th>ER</th>
                        <th>Total</th>
                        <th>ec ER</th>
                        <th>tc EE</th>
                        <th>tc ER</th>
                        <th>tc Total</th>
                        <th>Total Contribution</th>
                    </tr>
                    <?php 
                        $query = "SELECT * FROM ssstable;" or die(mysqli_error($link));
                        $result = conString($query);
                        while($rows = mysqli_fetch_array($result)){                            
                            $string = $rows[1] . " - " . $rows[2];

                            if($rows[2] ==  '999999.99'){
                                $string = 'Above Php 15,750.00';
                            }
                            
                            echo "<tr>";
                                echo "<td>" . $string . "</td>";
                                echo "<td>" . number_format($rows[3], 2) . "</td>";
                                echo "<td>" . number_format($rows[4], 2) . "</td>";
                                echo "<td>" . number_format($rows[5], 2) . "</td>";
                                echo "<td>" . number_format($rows[6], 2) . "</td>";
                                echo "<td>" . number_format($rows[7], 2) . "</td>";
                                echo "<td>" . number_format($rows[8], 2) . "</td>";
                                echo "<td>" . number_format($rows[9], 2) . "</td>";
                                echo "<td>" . number_format($rows[10], 2) . "</td>";
                                echo "<td>" . number_format($rows[11], 2) . "</td>";
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