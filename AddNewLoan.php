<?php 
    session_start();
    error_reporting(0);
    include 'needs/connString.php';
    include 'func/functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add New Loan</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' type='text/css' href='css/bootstrap.css'>
    </head>

    <body>
        <?php
            if(isset($_SESSION['posCode'])){
                accessType();   
        }
        ?>
        <div class='container-fluid'>
            <div class='container'>
                <div id='process'>
                </div>
            </div>
        </div>

        <script src="js/jquery-1.11.3.min.js"></script>
        <script src='js/bootstrap.js'></script>
        <script>
            $(document).ready(function(){
                var type = 1;

                $.ajax({
                    type: 'POST',
                    url: 'func/addLoan.php',
                    data: {type:type},
                    success: function(data){
                        $('#process').html(data);
                    }
                });
            });

            function goBack() {
                window.history.go(-1);
            }
        </script>
    </body>
</html>