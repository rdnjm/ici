<?php 
	session_start();
    error_reporting(0);
	include 'needs/connString.php';
	include 'func/functions.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Pag-IBIG Table</title>
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
                <h1>Pag-IBIG Table</h1>
                <table class='table table-bordered table-hover'>
                    <tr>
                        <th>Amount</th>
                        <th>EE</th>
                        <th>ER</th>
                    </tr>
                    <?php 
                        $query = "SELECT * FROM pagibigtable;" or die(mysqli_error($link));
                        $result = conString($query);
                        while($rows = mysqli_fetch_array($result)){
                            if($rows[3] == '16777216'){
                                $rows[3] = 'Php 5,000.00 and Above';
                                $rows[0] = "";
                            }

                            if($rows[0] == '0'){
                                $rows[3] = "";
                                $rows[0] = "Below Php 5,000.00";
                            }
                            echo "<tr>";
                                echo "<td>" . $rows[0] . $rows[3] . "</td>";
                                echo "<td>" . $rows[1] * 100 . "% of the Gross Salary</td>";
                                echo "<td>" . $rows[2] * 100 . "% of the Gross Salary</td>";
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