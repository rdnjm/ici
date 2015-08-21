<?php 
	$result = detailsMain($_GET['empNum']);
	while($rows = mysqli_fetch_array($result)){
		$lastname = $rows[1];
		$firstname = $rows[2];
		$middlename = $rows[3];		
		$address = $rows[4];		
		$bday = $rows[5];		
		$conNum = $rows[6];		
		$posCode = $rows[7];		
		$rate = $rows[8];		
		$nationality = $rows[9];		
		$maritalStatus = $rows[10];		
		$gender = ucfirst($rows[11]);		
	} 

	$year = substr($bday, 0, 4);
	$month = substr($bday, 5, 2);
	$day = substr($bday, 8, 2);

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
<div class="container v-center">
    <div class="row">
    	<div class="col-md-12">
        	<h1 class="text-center">Edit Employee Info</h1>
            <hr>
        </div>
    </div>
	
	<center><img src="images/pic.JPG" width="20%"><center></center>
    <center><label>Employee Name: </label> <?php echo $name; ?> </center> <br><br>
	
	<form class="form-horizontal" role="form" action='func/saveMyInfo.php' method='POST'>
    	<div class="form-group form-group-sm">
      		<label class="col-sm-2 control-label" for="lg">Employee Number: </label>
      		<div class="col-sm-3">
         		<input <?php echo "value='" . $_GET['empNum'] . "'"; ?> name='empNum' class = 'form-control' disabled>
      		</div>
         
         	<label class="col-sm-2 control-label" for="sm">Date Employed:  </label>
      		<div class="col-sm-3">
        		<input <?php echo "value='" . $dateEmployed . "'"; ?> name='dateEmployed' class = 'form-control' disabled>
    		</div>   
    	</div>

    	<div class="form-group form-group-sm">
      		<label class="col-sm-2 control-label" for="lg">Last Name: </label>
      		<div class="col-sm-3">
         		<input <?php echo "value='" . $lastname . "'"; ?> name='lastName' class = 'form-control' disabled>
      		</div>
       
       		<label class="col-sm-2 control-label" for="sm">Marital Status:  </label>
      		<div class="col-sm-3">
      			<select name='maritalstatus' class="form-control" disabled>
					<option <?php if($maritalStatus == "Single"){ echo "selected='selected'";}?> value='Single'>Single</option>	
					<option <?php if($maritalStatus == "Married"){ echo "selected='selected'";}?> value='Married'>Married</option>	
					<?php if($gender == "Male"){ ?>
						<option <?php if($maritalStatus == "Widower"){ echo "selected='selected'";}?> value='Widower'>Widower</option>
					<?php }
					else{ ?>
						<option <?php if($maritalStatus == "Widow"){ echo "selected='selected'";}?> value='Widow'>Widow</option>
					<?php } ?>	
				</select>
    		</div>   
    	</div>
        
        <div class="form-group form-group-sm">
      		<label class="col-sm-2 control-label" for="sm">First Name: </label>
      		<div class="col-sm-3">
       			<input <?php echo "value='" . $firstname . "'"; ?> name='firstName' class="form-control" disabled>
          	</div>
          	
          	<label class="col-sm-2 control-label" for="sm">Rate Per Hour:  </label>
      		<div class="col-sm-3">
        		<input <?php echo "value='" . $rate . "'"; ?> name='rate' class = 'form-control' disabled>
    		</div>   
	    </div>
		
	    <div class="form-group form-group-sm">
    	  	<label class="col-sm-2 control-label" for="sm">Middle Name: </label>
      		<div class="col-sm-3">
      			<input <?php echo "value='" . $middlename . "'"; ?> name='middleName' class="form-control" disabled>
          	</div>
         	
         	<label class="col-sm-2 control-label" for="lg">Position: </label>
      		<div class="col-sm-3">
         		<select name='position' class = "form-control" disabled>
					<?php 
						$result = getPositionInfo();
						while($rows = mysqli_fetch_array($result)){
							if($rows[1] == $position){
								echo "<option selected='selected' value='$rows[0]'>$rows[1]</option>";
							}
							else{
								echo "<option value='$rows[0]'>$rows[1]</option>";
							}
						}
					?>
				</select>
      		</div>
    	</div>

	    <div class="form-group form-group-sm">
    		<label class="col-sm-2 control-label" for="lg">Address: </label>
      		<div class="col-sm-3">
         		<input <?php echo "value='" . $address . "'"; ?> name='address' class = 'form-control'>
      		</div>
         
         	<label class="col-sm-2 control-label" for="sm">Number of Dependents:  </label>
      		<div class="col-sm-3">
       			<select name='dependents' class="form-control" disabled>
					<?php 
						for($i=0;$i<=4;$i++){
							if($dependents == $i){
								echo "<option selected='selected' value='$i'>$i</option>";
						}

							else{
								echo "<option value='$i'>$i</option>";
							}
						}
					?>
				</select>
    		</div>   
    	</div>
        
        <div class="form-group form-group-sm">
     		<label class="col-sm-2 control-label" for="lg">Gender: </label>
      		<div class="col-sm-3">
         		<select name='gender' class="form-control" disabled>
					<option <?php if($gender == "Male"){ echo "selected='selected'";}?> value='Male'>Male</option>
					<option <?php if($gender == "Female"){ echo "selected='selected'";}?> value='Female'>Female</option>
				</select>
      		</div>
        	
        	<label class="col-sm-2 control-label" for="sm">TIN:  </label>
    		<div class="col-sm-3">
      			<input name='tin'  class = "form-control"<?php echo "value='" .  $tin . "'"; ?> disabled>
    		</div>   
    	</div>

	    <div class="form-group form-group-sm">
    		<label class="col-sm-2 control-label" for="lg">Birthday: </label>
      		<div class="col-sm-1">
        	 	<select name='month' class="form-control" disabled>
					<option <?php if($month == 1){ echo "selected='selected'";}?> value='1'>January</option>
					<option <?php if($month == 2){ echo "selected='selected'";}?> value='2'>February</option>
					<option <?php if($month == 3){ echo "selected='selected'";}?> value='3'>May</option>
					<option <?php if($month == 4){ echo "selected='selected'";}?> value='4'>April</option>
					<option <?php if($month == 5){ echo "selected='selected'";}?> value='5'>May</option>
					<option <?php if($month == 6){ echo "selected='selected'";}?> value='6'>June</option>
					<option <?php if($month == 7){ echo "selected='selected'";}?> value='7'>July</option>
					<option <?php if($month == 8){ echo "selected='selected'";}?> value='8'>August</option>
					<option <?php if($month == 9){ echo "selected='selected'";}?> value='9'>September</option>
					<option <?php if($month == 10){ echo "selected='selected'";}?> value='10'>October</option>
					<option <?php if($month == 11){ echo "selected='selected'";}?> value='11'>November</option>
					<option <?php if($month == 12){ echo "selected='selected'";}?> value='12'>December</option>
				</select>
			</div>
        
        	<div class="col-sm-1">
        		<select name='date' class="form-control" disabled>
					<?php
						for($i=1;$i<=31;$i++){
							if($day == $i){
								echo "<option selected='selected' value='$i'>$i</option>";
							}
							
							else{
								echo "<option value='$i'>$i</option>";
							}
						}
					?>
				</select>
   			</div>
            
            <div class="col-sm-1">
            	<select name='year' class="form-control" disabled>
					<?php
						for($i=2015;$i>=1900;$i--){
							if($year == $i){
								echo "<option selected='selected' value='$i'>$i</option>";
							}
							
							else{
								echo "<option value='$i'>$i</option>";
							}
						}
					?>
				</select>
			</div>
         
         	<label class="col-sm-2 control-label" for="sm">SSS Number:  </label>
      		<div class="col-sm-3">
       			<input name='sss' class = "form-control" <?php echo "value='" . $sss . "'"; ?> disabled>
    		</div>   
    	</div>

	    <div class="form-group form-group-sm">
    		<label class="col-sm-2 control-label" for="lg">Contact Number: </label>
      		<div class="col-sm-3">
         		<input name='conNum' class = "form-control" <?php echo "value='" . $conNum . "'"; ?>>
      		</div>
         
         	<label class="col-sm-2 control-label" for="sm">PhilHealth:  </label>
      		<div class="col-sm-3">
       			<input name='philhealth' class = "form-control" <?php echo "value='" .  $philhealth . "'"; ?> disabled>
    		</div>   
    	</div>
       	
    	<div class="form-group form-group-sm">
      		<label class="col-sm-2 control-label" for="lg">Nationality: </label>
      		<div class="col-sm-3">
      			<select name='nationality' class='form-control' disabled>
					<option value='Filipino' <?php if ($nationality == 'Filipino'){ echo "selected='selected'";}?>>Filipino</option>
					<option value='American' <?php if ($nationality == 'American'){ echo "selected='selected'";}?>>American</option>
      			</select>
      		</div>
    		
    		<label class="col-sm-2 control-label" for="sm">PagIbig:  </label>
      		<div class="col-sm-3">
       			<input name='pagibig' class = "form-control" <?php echo "value='" .  $pagibig . "'"; ?>>
    		</div>   
    	</div>

    	<input type='hidden' <?php echo "value='" . $_GET[empNum] . "'"; ?> name='empNum'>
    	<input type='hidden' <?php echo "value='user'"; ?> name='type'>
	<div align = "right">
		<!-- pakilagay na lang to sa right side-->
		<button class="btn btn-primary glyphicon glyphicon-floppy-saved" value='save' name='button'>SAVE</button></a>
		<button onclick="history.go(-1);" class = "btn btn-default">Back</button>
	</div>
	</form>
</div>