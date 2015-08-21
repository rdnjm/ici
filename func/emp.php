<?php
	session_start();
	include '../needs/connString.php';
	include '../func/functions.php';
	$empNum = $_SESSION['empNum'];

	if(isset($empNum)){
	    if($_POST['type'] == 1){
	    	echo "<script type='text/javascript' src='js/jquery.js'></script>";
	    	echo "<script type='text/javascript' src='js/bootstrap.js'></script>";
			echo "<script type='text/javascript' src='js/jquery.dataTables.js'></script>";
			echo "<script type='text/javascript'>";
				echo "$(document).ready(function(){";
					echo "$('#emp').dataTable({";
						echo "\"pagingType\": \"full_numbers\"";
					echo "})";
				echo "});";
			echo "</script>";
			echo "<link rel='stylesheet' type='text/css' href='css/jquery.dataTables.css'>";

			echo "<table class='table table-bordered table-hover' id='emp'>";
			    echo "<thead>";
			    	echo "<tr>";
						echo "<th>Employee Number</th>";
						echo "<th>Last Name</th>";
    	    	        echo "<th>First Name</th>";
    	        	    echo "<th>Middle Name</th>";
		            echo "</tr>";
    		    echo "</thead>";
        
	   		 	$query = "SELECT empNum, LastName, FirstName, MiddleName FROM employeemasterfile.employee" or die("Error. " . mysqli_error($link));
	    		$result = conString($query);
			
				echo "<tbody>";
					while($rows = mysqli_fetch_array($result)){
   		    	     	echo "<tr>";
       		        	    echo "<td><a href='employeemanagement.php?view=true&empNum=$rows[0]' title='Click for more info'>$rows[0]</a></td>";
							echo "<td><a href='employeemanagement.php?view=true&empNum=$rows[0]' title='Click for more info'>$rows[1]</a></td>";
							echo "<td><a href='employeemanagement.php?view=true&empNum=$rows[0]' title='Click for more info'>$rows[2]</a></td>";
            	       		echo "<td><a href='employeemanagement.php?view=true&empNum=$rows[0]' title='Click for more info'>$rows[3]</a></td>";
                		echo "</tr>";
            		}
            	echo "</tbody>";
            echo "</table>";
	    }

	}
?>