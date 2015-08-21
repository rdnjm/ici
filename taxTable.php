<?php 
	session_start();
    error_reporting(0);
	include 'needs/connString.php';
	include 'func/functions.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Tax Table</title>
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
                <h1>Tax Table</h1>
                <table class='table table-bordered table-hover'>
                    <tr>
                        <th>Over</th>
                        <th>But Not Over</th>
                        <th>Base</th>
                        <th>Rate</th>
                    </tr>
                    <?php 
                        $query = "SELECT * FROM taxtable;" or die(mysqli_error($link));
                        $result = conString($query);
                        while($rows = mysqli_fetch_array($result)){
                            echo "<tr>";
                            
                            if($rows[1] == '0'){
                                $rows[1] = 'Below Php 10,000.00';
                                echo "<td align='center' colspan='2'>" . $rows[1] . "</td>";
                                $rows[1] = 0;
                            }

                            else if($rows[2] == '2147483647.00'){
                                $rows[2] = 'Above Php 500,000.00';
                                echo "<td  align='center' colspan='2'>" . $rows[2] . "</td>";
                                $rows[2] = 0;
                            }
                            
                            if ($rows[1] != 0 && $rows[2] != 0){
                                echo "<td>" . $rows[1] . "</td>";
                                echo "<td>" . $rows[2] . "</td>";
                            }
                            

                            if($rows[2] != 0){
                            }

                                echo "<td>" . number_format($rows[3], 2) . "</td>";
                                echo "<td>" . $rows[4] * 100 . "%</td>";
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