<?php 
    session_start();
    error_reporting(0);
    include 'needs/connString.php';
    include 'func/functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Employee Loan Management</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' type='text/css' href='css/bootstrap.css'>
        <script src='js/jQueryFunc.js' defer></script>
    </head>

    <body>
        <?php
            if(isset($_SESSION['posCode'])){
                accessType();   
        }
        ?>
        <div class='container-fluid'>
            <div class='container'>
                <a href='AddNewLoan.php'><button class='btn btn-info'>Add New Loan</button></a>
                <br>
                <br>
                <ul class='nav nav-tabs'>
                    <li class='active'><a data-toggle='tab' href='#leave' onclick="getReq('2')">Loan Request</a></li>
                </ul>

                <div class='tab-content'>
                    <div class='table-responsive'>
                        <div id='process'>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/jquery-1.11.3.min.js"></script>
        <script src='js/bootstrap.js'></script>
        <script>
            $(document).ready(function() {
                var type = 2;
                $.ajax({
                    type:     'POST',
                    url:      'func/getLoan.php',
                    data:     {type:type},
                    success:  function(data) {
                        $('#process').html(data);
                    }
                });
            });

            function getReq(type) {
                $.ajax({
                    type:     'POST',
                    url:      'func/getLoan.php',
                    data:     {type:type},
                    success:  function(data) {
                        $('#process').html(data);
                    }
                });
            }

            function addsubj(e){
                $('#addsubject').modal('show');
            }

            function goBack() {
                window.history.go(-1);
            }
        </script>
    </body>
</html>