<?php
	session_start();
	include '../needs/connString.php';

	echo "<form method='POST' action='func/generate.php'>";
		echo "Payroll Start Date:";
		
		echo "<div class = 'styled-select'>";
			echo "<select name='smonth' id='smonth'>";
				echo "<option value='1'>January</option>";
				echo "<option value='2'>February</option>";
				echo "<option value='3'>March</option>";
				echo "<option value='4'>April</option>";
				echo "<option value='5'>May</option>";
				echo "<option value='6'>June</option>";
				echo "<option value='7'>July</option>";
				echo "<option value='8'>August</option>";
				echo "<option value='9'>September</option>";
				echo "<option value='10'>October</option>";
				echo "<option value='11'>November</option>";
				echo "<option value='12'>December</option>";
			echo "</select>";
		echo "</div>";
            
		echo "<div class = 'styled-selects'>";
			echo "<select name='sday' id='sday'>";
				for($x=1; $x <= 31; $x++){
					echo "<option value='$x'> $x</option>";
				}
			echo "</select>";
		echo "</div>";
 			
		echo "<div class = 'styled-selects'>";
			echo "<select name='syear' id='syear'>";
				for($x=2015; $x <= 2050; $x++){
					echo "<option value='$x'> $x</option>";
				}
			echo "</select>";
		echo "</div>";
			
		echo "Payroll End Date:";
		echo "<div class = 'styled-select'>";
			echo "<select name='emonth' id='emonth'>";
				echo "<option value='1'>January</option>";
				echo "<option value='2'>February</option>";
				echo "<option value='3'>March</option>";
				echo "<option value='4'>April</option>";
				echo "<option value='5'>May</option>";
				echo "<option value='6'>June</option>";
				echo "<option value='7'>July</option>";
				echo "<option value='8'>August</option>";
				echo "<option value='9'>September</option>";
				echo "<option value='10'>October</option>";
				echo "<option value='11'>November</option>";
				echo "<option value='12'>December</option>";
			echo "</select>";
		echo "</div>";

		echo "<div class='styled-selects'>";
			echo"<select name='eday' id='eday'>";
					for($x=1; $x <= 31; $x++){
						echo "<option value='$x'> $x</option>";
					}
			echo "</select>";
 		echo "</div>";
 				
		echo "<div class = 'styled-selects'>";
			echo "<select name='eyear' id='eyear'>";
				for($x=2015; $x >= 1900; $x--){
					echo "<option value='$x'> $x</option>";
				}
			echo "</select>";
		echo "</div>";	
		
		echo "<div class='icon-viewer'>";
			echo "<button value='Submit'>Submit</button></a>";
        echo "</div>";
	echo "</form>";

	echo "<h1><a href='generatePayroll.php?view=1'>View Generated Payroll Summary</a></h1>";

?>