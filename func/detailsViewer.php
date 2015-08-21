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

  <div class="container v-center">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">Employee Information</h1>
        <hr>
      </div>
    </div>
		
    <center><img src="images/pic.JPG" width="20%"><center></center>
    <center><label>Employee Name: </label> <?php echo $name; ?> </center> <br><br>
		<form class="form-horizontal" role="form">
      <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="lg">Employee Number: </label>
        
        <div class="col-sm-3">
         <input type='text' name='lastName' id= 'lastName' value='<?php echo $_GET['empNum']; ?>' disabled class = 'form-control btn btn-default'>
        </div>
        
        <label class="col-sm-2 control-label" for="sm">Date Employed:  </label>
        <div class="col-sm-3">
          <?php echo "<input type='text' name='dateEmployed' id= 'dateEmployed' value='$dateEmployed' disabled class = 'form-control btn btn-default'>";?>
        </div>   
      </div>
    
      <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="sm">Full Name: </label>
    
        <div class="col-sm-3">
         <?php echo "<input type='text' name='fullName' id= 'fullName' value='$name' disabled class = 'form-control btn btn-default'>";?>
        </div>
        <label class="col-sm-2 control-label" for="sm">Marital Status:  </label>
    
        <div class="col-sm-3">
          <?php echo "<input type='text' name='maritalStatus' id= 'maritalStatus' value='$maritalStatus' disabled class = 'form-control btn btn-default'>";?>
        </div>   
      </div>
    
    <div class="form-group form-group-sm">
      <label class="col-sm-2 control-label" for="sm">Address:  </label>
      <div class="col-sm-3">
        <?php echo "<input type='text' name='address' id= 'address' value='$address' disabled class = 'form-control btn btn-default'>";?>
      </div>
      
      <label class="col-sm-2 control-label" for="sm">Rate Per Hour: </label>
      <div class="col-sm-3">
        <?php echo "<input type='text' name='rate' id= 'rate' value='" . $rate . "' disabled class = 'form-control btn btn-default'>";?>
      </div>   
    </div>

    <div class="form-group form-group-sm">
      <label class="col-sm-2 control-label" for="sm">Gender:  </label>
      <div class="col-sm-3">
        <?php echo "<input type='text' name='gender' id= 'gender' value='$gender' disabled class = 'form-control btn btn-default'>";?>
      </div>
      
      <label class="col-sm-2 control-label" for="sm">Number of Dependents: </label>
      <div class="col-sm-3">
        <?php echo "<input type='text' name='dependents' id= 'dependents' value='$dependents' disabled class = 'form-control btn btn-default'>";?>
      </div>   
    </div>
    
    <div class="form-group form-group-sm">
      <label class="col-sm-2 control-label" for="sm">Birthday:  </label>
      <div class="col-sm-3">
        <?php echo "<input type='text' name='bday' id= 'bday' value='$bday' disabled class = 'form-control btn btn-default'>";?>
      </div>
      
      <label class="col-sm-2 control-label" for="sm">Tax Identifier Number:  </label>
      <div class="col-sm-3">
        <?php echo "<input type='text' name='tin' id= 'tin' value='$tin' disabled class = 'form-control btn btn-default'>";?>
      </div>   
    </div>
               
    <div class="form-group form-group-sm">
      <label class="col-sm-2 control-label" for="sm">Contact Number:  </label>
      <div class="col-sm-3">
        <?php echo "<input type='text' name='conNum' id= 'conNum' value='$conNum' disabled class = 'form-control btn btn-default'>";?>
      </div>
      
      <label class="col-sm-2 control-label" for="sm">SSS Number: </label>
      <div class="col-sm-3">
        <?php echo "<input type='text' name='sss' id= 'sss' value='$sss' disabled class = 'form-control btn btn-default'>";?>
      </div>   
    </div>   
                  
    <div class="form-group form-group-sm">
      <label class="col-sm-2 control-label" for="sm">Nationality:  </label>
      <div class="col-sm-3">
        <?php echo "<input type='text' name='nationality' id= 'nationality' value='$nationality' disabled class = 'form-control btn btn-default'>";?>
      </div>   
      
      <label class="col-sm-2 control-label" for="sm">PhilHealth Number: </label>
      <div class="col-sm-3">
        <?php echo "<input type='text' name='philhealth' id= 'philhealth' value='$philhealth' disabled class = 'form-control btn btn-default'>";?>
      </div>   
    </div>     
                    
    <div class="form-group form-group-sm">
      <label class="col-sm-2 control-label" for="sm">Position:  </label>
      <div class="col-sm-3">
        <?php echo "<input type='text' name='position' id= 'position' value=' $position ' disabled class = 'form-control btn btn-default'>";?>
      </div>   
      
      <label class="col-sm-2 control-label" for="sm">Pag-IBIG Number: </label>
      <div class="col-sm-3">
        <?php echo "<input type='text' name='pagibig' id= 'pagibig' value='$pagibig' disabled class = 'form-control btn btn-default'>";?>
      </div>  
    </div>  
  </form>
</div>

<div align = 'right'>
	<a <?php echo "href=\"employeemanagement.php?edit=true&empNum=" . $_GET['empNum'] . "\""?>><button type="button" class="btn btn-primary">EDIT</button></a>
	<a <?php echo "href=\"employeemanagement.php?delete=false&empNum=" . $_GET['empNum'] . "\""?>><button type="button" class="btn btn-danger">DELETE</button></a>
	<button type="button" class="btn btn-default" onclick="history.go(-1);">BACK</button>
</div>