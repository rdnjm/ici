<?php
	//getting position code
	function getPosition($empNum){
		$query = "SELECT PositionCode, empNum FROM employee WHERE empNum = '$empNum'" or die("Error " . mysqli_error());
		$result = conString($query);
		$row = mysqli_fetch_array($result);
		$_SESSION['empNum'] = $row[1];
		$_SESSION['posCode'] = $row[0];
	}

	//getting access type through position code
	function accessType(){
		$type = $_SESSION['posCode'];

/* try lang pero pwede yata ipalit. ndi ko pa natest
	switch($type){
			case '0001':
				require 'navbar/dir.php';
				break;

			case '0002A':
				require 'navbar/account.php';
				break;

			case strpos($type, 'A'):
			case strpos($type, 'B'):
				require 'navbar/norm.php';
				break;

			case '0003':
				require 'navbar/hr.php';
				break;

			case '0004':
			case '0005':
			case '0006':
			case '0007':
			case '0008':
			case '0009':
				require 'navbar/head.php';
				break;

			case '0010':
				require 'navbar/consultant.php';
				break;

			case '0011':
				require 'navbar/contractuals.php';
				break;

			default:
				header("LOCATION: login.php?err=2");
				break;
		}
*/

		if($type == '0001'){ //kapag nakitang 0001 ung position code,
			require 'navbar/dir.php'; //ung dir.php ung tatawagin nya. ibigsabihin para kay director
		}

		else if($type == '0002'){
			require 'navbar/account.php';
		}

		else if($type == '0002A'){
			require 'navbar/payroll.php';
		}

		else if($type == '0003'){
			require 'navbar/hr.php';
		}

		else if(strpos($type, 'A')){
			require 'navbar/norm.php';
		}

		else if(strpos($type, 'B')){
			require 'navbar/norm.php';
		}

		else if($type == '0004'){
			require 'navbar/head.php';
		}

		else if($type == '0005'){
			require 'navbar/head.php';
		}

		else if($type == '0006'){
			require 'navbar/head.php';
		}

		else if($type == '0007'){
			require 'navbar/head.php';
		}

		else if($type == '0008'){
			require 'navbar/head.php';
		}

		else if($type == '0009'){
			require 'navbar/head.php';
		}

		else if($type == '0010'){
			require 'navbar/consultant.php';
		}

		else if($type == '0011'){
			require 'navbar/contractuals.php';
		}

		else{
			header("LOCATION: login.php?err=2");
		}
	}

	//pagination
	function pagination($table){
        $query = "SELECT COUNT(empNum) FROM employeemasterfile." . $table; 
		$result = conString($query);  
        $row = mysqli_fetch_row($result); 
        $total_records = $row[0]; 
        $total_pages = ceil($total_records / 10);  
    	
        $url = $_SERVER['REQUEST_URI'];
        $url = substr($url, 0, 27);
        if(!isset($_GET['page'])){
        	$_GET['page'] = 1;
        	$page = 1;
        }
        
        else{
        	$page = $_GET['page'];	
        }

        echo "<ul class='pagination'>";
        for ($i=1; $i<=$total_pages; $i++) { 
        	if($i == $page){
        		echo "<li class='active'><a href='" . $url . "?page=".$i."'>".$i."</a></li>";  
        	}

        	else{
        		echo "<li><a href='" . $url . "?page=".$i."'>".$i."</a></li>"; 
        	}
        }
        echo "</ul>";
	}

	function paginationSearch($table){
        $query = "SELECT COUNT(empNum) FROM employeemasterfile." . $table . " WHERE empNum LIKE '%" . $_GET['search'] . "%'" or die("Error " . mysqli_error($link)); 
		$result = conString($query);  
        $row = mysqli_fetch_row($result); 
        $total_records = $row[0]; 
        $total_pages = ceil($total_records / 10);  
    	
        $url = $_SERVER['REQUEST_URI'];
        $url = substr($url, 0, 27);
        if(!isset($_GET['page'])){
        	$_GET['page'] = 1;
        	$page = 1;
        }
        
        else{
        	$page = $_GET['page'];	
        }

        echo "<ul class='pagination'>";
        for ($i=1; $i<=$total_pages; $i++) { 
        	if($i == $page){
        		echo "<li class='active'><a href='" . $url . "?page=".$i."'>".$i."</a></li>";  
        	}

        	else{
        		echo "<li><a href='" . $url . "?page=".$i."'>".$i."</a></li>"; 
        	}
        }
        echo "</ul>";
	}

	//start ng pangkuha ng details ng employee
	function detailsMain($empNum){
		$query = "SELECT * FROM employeemasterfile.employee WHERE empNum='". $empNum ."'" or die(mysqli_error($link));
		$result = conString($query);
		return $result;
	}

	function detailsTIN($empNum){
		$query = "SELECT * FROM employeemasterfile.birmasterfile WHERE EmployeeNumber='". $empNum ."'" or die(mysqli_error($link));
		$result = conString($query);
		return $result;
	}

	function detailsPagibig($empNum){
		$query = "SELECT * FROM employeemasterfile.pagibigmasterfile WHERE employeenumber='". $empNum ."'" or die(mysqli_error($link));
		$result = conString($query);
		return $result;
	}

	function detailsPhilhealth($empNum){
		$query = "SELECT * FROM employeemasterfile.philhealthmasterfile WHERE EmployeeNumber='". $empNum ."'" or die(mysqli_error($link));
		$result = conString($query);
		return $result;
	}

	function detailsSSS($empNum){
		$query = "SELECT * FROM employeemasterfile.sss WHERE EmployeeNumber='". $empNum ."'" or die(mysqli_error($link));
		$result = conString($query);
		return $result;
	}

	function detailsEmployed($empNum){
		$query = "SELECT * FROM employeemasterfile.dateemployed WHERE empNum='". $empNum ."'" or die(mysqli_error($link));
		$result = conString($query);
		return $result;
	}

	function detailsPosition($posCode){
		$query = "SELECT posDetails FROM employeemasterfile.positions WHERE posCode = '" . $posCode . "'" or die (mysqli_error($link));
		$result = conString($query);
		return $result;
	}
	//end ng pangkuha ng details ni employee

	//pangayos ng date para maging madaling mabasa
	function dateFormat($date){
		$year = substr($date, 0, 4);
		$month = substr($date, 5, 2);
		$day = substr($date, 8, 2);

		switch ($month) {
			case 1:
				$month = "January";
				break;
			
			case 2:
				$month = "February";
				break;
			
			case 3:
				$month = "March";
				break;
			
			case 4:
				$month = "April";
				break;
			
			case 5:
				$month = "May";
				break;
			
			case 6:
				$month = "June";
				break;
			
			case 7:
				$month = "July";
				break;
			
			case 8:
				$month = "August";
				break;
			
			case 9:
				$month = "September";
				break;
			
			case 10:
				$month = "October";
				break;
			
			case 11:
				$month = "November";
				break;
			
			case 12:
				$month = "December";
				break;

			default:
				break;
		}

		$date = $month . " " . $day . ", " . $year;
		return $date; 
	}

	//getting positions info
	function getPositionInfo(){
		$query = "SELECT * FROM employeemasterfile.positions" or die(mysqli_error($link));
		$result = conString($query);
		return $result;
	}

	function getDept($viewer){
		$query = "SELECT positions.posDetails FROM employee INNER JOIN positions ON employee.PositionCode = positions.posCode WHERE employee.PositionCode = '" . $viewer . "';" or die(mysqli_error($link));
		$result = conString($query);
		$rows = mysqli_fetch_array($result);
		$num = stripos($rows[0], "-");
		$dept = substr($rows[0], 0, $num);
		return $dept . "Department";
	}

	function getPos(){
		$posCode = $_SESSION['posCode'];
		$empNum = $_SESSION['empNum'];
		return "<input type='hidden' id='posCode' name='posCode' value='" . $posCode . "'>
			<br>
			<input type='hidden' id='empNum' name='empNum' value='" . $empNum . "'>";
	}

	function getName(){
		$query = "SELECT LastName, FirstName FROM employee WHERE empNum='" . $_SESSION['empNum'] . "';" or die(mysqli_error($link));
		$result = conString($query);
		$rows = mysqli_fetch_array($result);

		return $rows[0] . ", " . $rows[1];
	}
?>