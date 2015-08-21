<?php 
	include '../needs/connString.php';
	include 'functions.php';

	if(isset($_POST['username'])){
		$empNum = $_POST['username'];
		$pw = $_POST['password'];

		$query = "SELECT COUNT(employeeNum) FROM emplogin WHERE employeeNum='" . $empNum . "';" or die(mysqli_error($link));
		$result = conString($query);
		$rows = mysqli_fetch_array($result);
		
		if($rows[0] == 1){
			$query = "SELECT COUNT(pass) FROM emplogin WHERE employeeNum='" . $empNum . "' AND pass='" . $pw . "';" or die(mysqli_error($link));
			$result = conString($query);
			$rows = mysqli_fetch_array($result);			
			if($rows[0] == 1){
				$query = "SELECT LastName, FirstName FROM employee WHERE empNum='" . $empNum ."';" or die(mysqli_error($link));
				$result = conString($query);
				$rows = mysqli_fetch_array($result);

				echo "Hello " . $rows[0] . ", " . $rows[1];
				$date = date('Y-m-d');
				$time = date('h:i:s');

				$query = "SELECT COUNT(workDate) FROM employeelogs WHERE employeeNumber='" . $empNum . "' AND workDate='" . $date . "';" or die(mysqli_error($link));
				$result = conString($query);
				$rows = mysqli_fetch_array($result);

				if($rows[0] == 0){
					$hour = substr($time, 0,2);
					$min = substr($time, 3,2);
					$compHour = $hour - 7;

					if($compHour > 0){
						$hourLate = $compHour * 60;
					}
					else{
						$hourLate = 0;
					}

					if($hour > 7){
						if($hourLate != 0){
							$compMin = $min + $hourLate;
						}
					}

					else if($hour == 7){
						$compMin = $min;
					}

					else{
						$compMin = 0;
					}

					$query = "INSERT INTO employeelogs VALUES('" . $empNum . "', '" . $date . "', '" . $time . "', '00:00:00', 'normal', '" . $compMin . "', '0', '0');";
					conString($query);
					echo $query;
				}

				else if ($rows[0] == 1){
					$hour = substr($time, 0,2);
					$min = substr($time, 3,2);

					if($hour < 17){
						$query = "SELECT COUNT(status) FROM utrequest WHERE status='approved' AND dateAb='" . $date . "' AND empNum = '" . $empNum . "';" or die(mysqli_error($link));
						$result = conString($query);
						$rows = mysqli_fetch_array($result);

						if($rows[0] != 0){
							$query = "SELECT timeout FROM utrequest	WHERE status='approved' AND dateAb='" . $date . "' AND empNum = '" . $empNum . "';" or mysqli_error($link);
							$result = conString($query);
							$rows = mysqli_num_rows($result);

							$setHour  = (17 - $hour) * 60;
							$setMin = (60 - $min) + $setHour;

							if($hour > 17){
								$compMin = 0;
							}

							else{
								if($min != 0){
									$compMin = (17 - $hour) * 60 + (60 - $min);
								}

								else{
									$compMin = (17 - $hour) * 60;
								}

							}

							if($setMin <= $compMin){
								$compMin = $setMin;
							}

							$query = "UPDATE employeelogs SET ut='" . $compMin . "', timeout='" . $time . "' WHERE employeeNumber='" . $empNum ."' AND workDate='" . $date . "';" or die(mysqli_error($link));
							conString($query);
						}
						else{
							echo "<br>";
							echo "Please Apply for an Undertime Request first before going out of the company's premises.";
						}
					}

					else if($hour > 17){
						$query = "SELECT status, numhours FROM otrequest WHERE status='approved' AND dateOT ='" . $date . "' AND empNum='" . $empNum . "';" or die(mysqli_error($link));
						$result = conString($query);
						$rows = mysqli_num_rows($result);

						if ($rows[0] != 0){
							$rows = mysqli_fetch_array($result);

							$compHour = ($hour - 17) * 60;
							$compMin = $min + $compHour;  

							$numhours *= 60;
							if($numhours <= $compMin){
								$compMin = $numhours;
							}

							$query = "UPDATE employeelogs SET ot='" . $compMin . "', timeout='" . $time . "' WHERE employeeNumber='" . $empNum . "' AND workDate='" . $date . "';" or die(mysqli_error($link));
							conString($query);
						}

						else{
							$query = "UPDATE employeelogs set timeout='" . $time . "' WHERE employeeNumber='" . $empNum . "' AND workDate='" . $date . "';" or die(mysqli_error($link));
						}
					}
				}
			}

		}
	}
?>