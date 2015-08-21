<?php
	include '../needs/connString.php';
	include '../func/functions.php';
	$table = "employee";

	if(isset($_GET['search']) && $_GET['search'] == true && isset($_POST['searchBy'])){
		$empNum = $_POST['empNum'];

		if($_POST['searchBy'] == "Employee Number"){
          	$searchBy = "empNum";
        }

        else if($_POST['searchBy'] == "Last Name"){
           	$searchBy = "LastName";
		}

        else if($_POST['searchBy'] == "First Name"){
           	$searchBy = "FirstName";
		}

        else if($_POST['searchBy'] == "Address"){
           	$searchBy = "address";
		}
		
		$query = "SELECT empNum, LastName, FirstName, MiddleName FROM employee WHERE " . $searchBy . " LIKE '%" . $empNum . "%'" or die(mysqli_error());
		$result = $link->query($query);
		echo "<table class='table table-bordered table-hover'>
			<tr>
                <th>Employee Number</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
            </tr>";
		while($rows = mysqli_fetch_array($result)){
			echo 
				"<tr>
                    <td><a href='employeemanagement.php?view=true&empNum=" . $rows[0] . "' title='Click for more info'>" . $rows[0] . "</a></td>
                    <td>" . $rows[1] . "</td>
                    <td>" . $rows[2] . "</td>
                    <td>" . $rows[3] . "</td>
				</tr>";
		}
		echo "</table>";
		//paginationSearch($table);
	}
?>