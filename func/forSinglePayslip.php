<?php
	session_start();
	include '../needs/connString.php';
	include 'functions.php';
	$empNum = $_SESSION['empNum'];

	$query = "SELECT payslip.*, employee.LastName, employee.Firstname FROM payslip INNER JOIN employee ON employee.empNum = payslip.empNum WHERE payslip.empNum='" . $empNum . "' AND payrollstart='" . $_POST['date'] . "' AND payrollend='" . $_POST['end'] . "';" or die(mysqli_error($link));
	$result = conString($query);
	$rows = mysqli_fetch_array($result);

	$payrollstart = $rows[1];
	$payrollend = $rows[2];
	$_SESSION['date'] = $payrollstart;
	$_SESSION['end'] = $payrollend;
	$basic = $rows[3];
	$otAdd = $rows[4];
	$utDed = $rows[5];
	$lateDed = $rows[6];
	$tax = $rows[7];
	$sss = $rows[8];
	$philhealth = $rows[9];
	$pagibig = $rows[10];
	$grossearn = $rows[11];
	$grossded = $rows[12];
	$takehome = $rows[13];
	$LastName = $rows[14];
	$firstName = $rows[15];
	$_SESSION['type'] = 'single';

	echo "<div class='icons'><a href='func/download_single.php'>";
       echo "<button>&nbsp;Download as PDF file</button></a>";
    echo "</div>";

	echo "<h1>ICI MINISTRIES-FOUNDATION, INC.</h1>";
	echo "Payslip Pay Period Ending " . $payrollstart . " - " . $payrollend . "<br>";
	echo "Statement of Earnings and Deductions<br>";
    echo "Name: " . $LastName . ", " . $firstName . "</u>";
    echo "<table class='table table-bordered table-hover'>";         
    	echo "<tr>";
			echo "<th colspan='2'>Earnings</th>";
            echo "<th colspan='2'>Deductions</th>";
        echo "</tr>";
          
        echo "<tr>";
			echo "<td>Title</td>";
            echo "<td>Amount</td>";
            echo "<td>Title</td>";
            echo "<td>Amount</td>";
        echo "</tr>";

        echo "<tr>";
 			echo "<td>Basic</td>";
            echo "<td>" . $basic . "</td>";
            echo "<td>Tax Withheld</td>";
            echo "<td>(" . $tax . ")</td>";
        echo "</tr>";

        echo "<tr>";
            echo "<td>OT</td>";
            echo "<td>" . $otAdd . "</td>";
            echo "<td>SSS</td>"; 
            echo "<td>(" . $sss . ")</td>";
        echo "</tr>";

        echo "<tr>";
        	echo "<td>UT</td>";
            echo "<td>(" . $utDed . ")</td>";
            echo "<td>PhilHealth</td>";
            echo "<td>(" . $philhealth . ")</td>";
        echo "</tr>";

        echo "<tr>";
        	echo "<td>Late</td>";
            echo "<td>(" . $lateDed . ")</td>";
            echo "<td>Pag-IBIG</td>";
            echo "<td>(" . $pagibig . ")</td>";
        echo "</tr>";

        echo "<tr>";
            echo "<td>Gross Earnings</td>";
            echo "<td>" . $grossearn . "</td>";
            echo "<td>Gross Deductions</td>";
            echo "<td>(" . $grossded . ")</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<th colspan='4'>Total Take Home Pay: " . $takehome . "</th>";
        echo "</tr>";     
    echo "</table>";
?>