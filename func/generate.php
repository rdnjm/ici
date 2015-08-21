<?php 
	session_start();
	include '../needs/connString.php';
	$sdate = $_POST['syear'] . '-' . $_POST['smonth'] . '-' . $_POST['sday'];
	$edate = $_POST['eyear'] . '-' . $_POST['emonth'] . '-' . $_POST['eday'];
	
	$query = "SELECT empNum, lastname, firstname, middlename, rateperhour FROM employeemasterfile.employee ORDER BY empNum" or die("Error " . mysqli_error($link));
	$result = constring($query);
	while ($rows = mysqli_fetch_array($result)){
		$empnum = $rows[0];
		$lastname = $rows[1];
		$firstname = $rows[2];
		$middlename = $rows[3];
		$rateperhour = $rows[4];
		$basic = (($rateperhour * 8) * 20)/2;
		$basic = round($basic, 2);
		$late = 0;
		$ot = 0;
		$ut = 0;
		
		$query2 = "SELECT * FROM employeemasterfile.temp_logs WHERE employeenumber='$empnum' AND workdate BETWEEN '$sdate' AND '$edate' ORDER BY workdate;" or die("Error " . mysqli_error($link));
		$result2 = constring($query2);
		while ($rows2 = mysqli_fetch_array($result2)){
			$late = $late + $rows2[4];	
			$ot = $ot + $rows2[5];	
			$ut = $ut + $rows2[6];	
		}

		$utDed = ($rateperhour/60) * $ut;
		$utDed = round($utDed, 2);
		$otAdd = (($rateperhour/60) * 1.30) * $ot;
		$otAdd = round($otAdd, 2);
		$lateDed = ($rateperhour/60) * $late; 
		$lateDed = round($lateDed, 2);

		$query2 = "SELECT ee FROM employeemasterfile.ssstable WHERE endAmount >= '$basic' AND amount <= '$basic';" or die("Error " . mysqli_error($link));
		$result2 = constring($query2);
		$rows2 = mysqli_fetch_array($result2);
		$sss = $rows2[0];
		$sss = round($sss/2, 2);

		$query2 = "SELECT ee FROM employeemasterfile.pagibigtable WHERE endAmount >= '$basic' AND amount <= '$basic';" or die("Error " . mysqli_error($link));
		$result2 = constring($query2);
		$rows2 = mysqli_fetch_array($result2);
		$pagibig = $basic * $rows2[0];
		$pagibig = round(100/2, 2);

		$query2 = "SELECT ee FROM employeemasterfile.philhealthtable WHERE endAmount >= '$basic' AND amount <= '$basic';" or die("Error " . mysqli_error($link));
		$result2 = constring($query2);
		$rows2 = mysqli_fetch_array($result2);
		$philhealth = $rows2[0];
		$philhealth = round($philhealth/2, 2);

		if ($rateperhour > 56.38){
		$annual = $basic * 24;
		$query2 = "SELECT base, rate, over FROM employeemasterfile.taxtable WHERE butnotover >= '$annual' AND over <= '$annual';" or die("Error " . mysqli_error($link));
		$query3 = "SELECT noofdependents FROM employeemasterfile.birmasterfile WHERE employeenumber = '$empnum';" or die("Error " . mysqli_error($link));
		$result2 = constring($query2);
		$result3 = constring($query3);
		$rows2 = mysqli_fetch_array($result2);
		$rows3 = mysqli_fetch_array($result3);
		$dep = $rows3[0];
		$base = $rows2[0];
		$rate = $rows2[1];
		$over = $rows2[2];
		$annual = $annual - (50000 + ($dep * 25000));
		$tax = ($annual - $over) * $rate;
		$tax = ($tax + $base) /12;
		$tax = $tax/2;
		$tax = round($tax, 2);

		if ($tax < 0){
			$tax = 0;
		}	
		}

		else{
			$tax = 0;
		}	

		$grossearn = $otAdd + $basic - ($utDed + $lateDed);
		$grossded = $tax + $sss + $philhealth + $pagibig;
		$takehome = $grossearn - $grossded;
		$dt = new DateTime($sdate);
		$db = $dt->format('F');
		$dt = new DateTime($sdate);
		$da = $dt->format('m');
		$temps = $_POST['eyear'] . "-" . $da . "-" . $_POST['sday'];
		$tempe = $_POST['eyear'] . "-" . $da . "-" . $_POST['eday'];

		$query = "INSERT INTO employeemasterfile.payslip VALUES('$empnum', '$temps', '$tempe', '$basic', '$ot', '$ut', '$late', '$tax', '$sss', '$philhealth', '$pagibig', '$grossearn', '$grossded', '$takehome');" or die(mysqli_error($link));
		constring($query);

		/*echo "
			<table border='1'>
				<th colspan='4'>ICI MINISTRIES-FOUNDATION, INC.</th>
				<tr>
					<th colspan='4'>Pay Period Ending " . $db . " " . $_POST['sday'] . " - " . $_POST['eday'] . ", " . $_POST['eyear'] . "</th>	
				</tr>
				<tr>
					<th colspan='4'>Payslip</th>	
				</tr>
				<tr>
					<th colspan='4'>Statement of Earnings and Deductions</th>	
				</tr>
				<tr>
					<th colspan='4'>Name: $lastname, $firstname $middlename</th>	
				</tr>
				<tr>
				<th colspan='2'>Earnings</th>
				<th colspan='2'>Deductions</th>
				</tr>
				<tr>
					<td>Title</td>
					<td>Amount</td>
					<td>Title</td>
					<td>Amount</td>
				</tr>

				<tr>
					<td>Basic</td>
					<td>$basic</td>
					<td>Tax Withheld</td>
					<td>($tax)</td>
				</tr>

				<tr>
					<td>OT</td>
					<td>$otAdd</td>
					<td>SSS</td>
					<td>($sss)</td>
				</tr>

				<tr>
					<td>UT</td>
					<td>($utDed)</td>
					<td>PhilHealth</td>
					<td>($philhealth)</td>
				</tr>

				<tr>
					<td>Late</td>
					<td>$lateDed</td>
					<td>Pag-IBIG</td>
					<td>($pagibig)</td>
				</tr>

				<tr>
					<td>Gross Earnings</td>
					<td>($grossearn)</td>
					<td>Gross Deductions</td>
					<td>$grossded</td>
				</tr>

				<tr>
					<th colspan='4'>Total Take Home Pay: $takehome</th>
				</tr>
		";*/	

	}
	echo "<script>
    		alert('Success');
        	window.location.href='generatePayroll.php';
        </script>";
?>