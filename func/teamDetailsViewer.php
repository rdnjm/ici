<?php 
	$result = detailsMain($_GET['empNum']);
	while($rows = mysqli_fetch_array($result)){
		$name = $rows[1] . ", " . $rows[2] . " " . $rows[3];		
		$address = $rows[4];		
		$bday = $rows[5];		
		$conNum = $rows[6];		
		$posCode = $rows[7];		
		$rate = $rows[8];		
		$nationality = $rows[9];		
		$maritalStatus = $rows[10];		
		$gender = ucfirst($rows[11]);		
	} 

	$bday = dateFormat($bday);

	$result = detailsTIN($_GET['empNum']);
	while($rows = mysqli_fetch_array($result)){
		$tin = $rows[1];
		$dependents = $rows[2];
	}

	$result = detailsEmployed($_GET['empNum']);
	while($rows = mysqli_fetch_array($result)){
		$dateEmployed = $rows[1];
	}

	$result = detailsPagibig($_GET['empNum']);
	while($rows = mysqli_fetch_array($result)){
		$pagibig = $rows[1];
	}

	$result = detailsPhilhealth($_GET['empNum']);
	while($rows = mysqli_fetch_array($result)){
		$philhealth = $rows[1];
	}

	$result = detailsSSS($_GET['empNum']);
	while($rows = mysqli_fetch_array($result)){
		$sss = $rows[1];
	}

	$result = detailsPosition($posCode);
	while($rows = mysqli_fetch_array($result)){
		$position = $rows[0];
	}
?>
<div class='table-responsive'>
<table class='table table-bordered table-hover'>
	<tr>
		<td rowspan='4'><img src=<?php ?> alt="pic.png"></td>
		<td>Employee Number</td>
		<td colspan='3'><?php echo $_GET['empNum']; ?></td>
	</tr>

	<tr>
		<td>Employee Name</td>
		<td colspan='3'><?php echo $name; ?></td>
	</tr>

	<tr>
		<td>Address</td>
		<td colspan='3'><?php echo $address; ?></td>
	</tr>

	<tr>
		<td>Gender</td>
		<td colspan='3'><?php echo $gender; ?></td>
	</tr>

	<tr>
		<td>Nationality</td>
		<td><?php echo $nationality; ?></td>
		<td>Marital Status</td>
		<td><?php echo $maritalStatus; ?></td>
	</tr>
	
	<tr>
		<td>Birthday</td>
		<td><?php echo $bday; ?></td>
		<td>Number of Dependents</td>
		<td><?php echo $dependents; ?></td>
	</tr>

	<tr>
		<td>Contact Number</td>
		<td><?php echo $conNum; ?></td>
		<td>Tax Identifier Number</td>
		<td><?php echo $tin; ?></td>
	</tr>

	<tr>
		<td>Date Employed</td>
		<td><?php echo $dateEmployed; ?></td>
		<td>SSS Number</td>
		<td><?php echo $sss; ?></td>
	</tr>

	<tr>
		<td>Position</td>
		<td><?php echo $position; ?></td>
		<td>PhilHealth Number</td>
		<td><?php echo $philhealth; ?></td>
	</tr>

	<tr>
		<td>Rate Per Hour</td>
		<td>Click here to view</td>
		<td>Pag-IBIG Number</td>
		<td><?php echo $pagibig; ?></td>
	</tr>
</table>
</div>

<div align = 'right'>
	<a <?php echo "href=\"teamManagement.php?edit=true&empNum=" . $_GET['empNum'] . "\""?>><button type="button" class="btn btn-primary">Edit</button></a>
	<button type="button" class="btn btn-default" onclick="history.go(-1);">Back</button>
</div>