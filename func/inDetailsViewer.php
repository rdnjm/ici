<?php 
	$result = detailsMain($_SESSION['empNum']);
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

	$result = detailsTIN($_SESSION['empNum']);
	while($rows = mysqli_fetch_array($result)){
		$tin = $rows[1];
		$dependents = $rows[2];
	}

	$result = detailsEmployed($_SESSION['empNum']);
	while($rows = mysqli_fetch_array($result)){
		$dateEmployed = $rows[1];
	}

	$result = detailsPagibig($_SESSION['empNum']);
	while($rows = mysqli_fetch_array($result)){
		$pagibig = $rows[1];
	}

	$result = detailsPhilhealth($_SESSION['empNum']);
	while($rows = mysqli_fetch_array($result)){
		$philhealth = $rows[1];
	}

	$result = detailsSSS($_SESSION['empNum']);
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
		<center><img src="images/pic.JPG"  width='20%'><center></center>
       <center><label>Employee Name: </label> <?php echo $name; ?> </center> <br><br>
		              <form class="form-horizontal" role="form">
    <div class="form-group form-group-sm">
      <label class="col-sm-2 control-label" for="lg">Employee Number: </label>
      <div class="col-sm-3">
         <input type='text' name='lastName' id= 'lastName2' value='<?php echo $_SESSION['empNum']; ?>' disabled class = 'form-control btn btn-default'>
      </div>
         <label class="col-sm-2 control-label" for="sm">Date Employed:  </label>
      <div class="col-sm-3">
       <?php echo "<input type='text' name='lastName' id= 'lastName2' value='$dateEmployed' disabled class = 'form-control btn btn-default'>";?>
    </div>   
    </div>
    <div class="form-group form-group-sm">
      <label class="col-sm-2 control-label" for="sm">Full Name: </label>
      <div class="col-sm-3">
        <?php echo "<input type='text' name='empNum' id= 'lastName2' value='$name' disabled class = 'form-control btn btn-default'>";?>
      </div>
         <label class="col-sm-2 control-label" for="sm">Marital Status:  </label>
      <div class="col-sm-3">
       <?php echo "<input type='text' name='lastName' id= 'lastName2' value='$maritalStatus' disabled class = 'form-control btn btn-default'>";?>
    </div>   
    </div>
                  <div class="form-group form-group-sm">
      <label class="col-sm-2 control-label" for="sm">Address:  </label>
      <div class="col-sm-3">
        <?php echo "<input type='text' name='lastName' id= 'lastName2' value='$address' disabled class = 'form-control btn btn-default'>";?>
      </div>
                       <label class="col-sm-2 control-label" for="sm">Rate Per Hour:  </label>
      <div class="col-sm-3">
       <?php echo "<input type='text' name='lastName' id= 'lastName2' value='" . $rate . "' disabled class = 'form-control btn btn-default'>";?>
    </div>   
    </div>
                  <div class="form-group form-group-sm">
      <label class="col-sm-2 control-label" for="sm">Gender:  </label>
      <div class="col-sm-3">
       <?php echo "<input type='text' name='lastName' id= 'lastName2' value='$gender' disabled class = 'form-control btn btn-default'>";?>
      </div>
                       <label class="col-sm-2 control-label" for="sm">Number of Dependents: </label>
      <div class="col-sm-3">
      <?php echo "<input type='text' name='lastName' id= 'lastName2' value='$dependents' disabled class = 'form-control btn btn-default'>";?>
    </div>   
    </div>
                  <div class="form-group form-group-sm">
      <label class="col-sm-2 control-label" for="sm">Birthday:  </label>
      <div class="col-sm-3">
       <?php echo "<input type='text' name='lastName' id= 'lastName2' value='$bday' disabled class = 'form-control btn btn-default'>";?>
      </div>
                       <label class="col-sm-2 control-label" for="sm">Tax Identifier Number:  </label>
      <div class="col-sm-3">
      <?php echo "<input type='text' name='lastName' id= 'lastName2' value='$tin' disabled class = 'form-control btn btn-default'>";?>
    </div>   
    </div>
               
                  <div class="form-group form-group-sm">
      <label class="col-sm-2 control-label" for="sm">Contact Number:  </label>
      <div class="col-sm-3">
       <?php echo "<input type='text' name='lastName' id= 'lastName2' value='$conNum' disabled class = 'form-control btn btn-default'>";?>
      </div>
                      <label class="col-sm-2 control-label" for="sm">SSS Number: </label>
      <div class="col-sm-3">
      <?php echo "<input type='text' name='lastName' id= 'lastName2' value='$sss' disabled class = 'form-control btn btn-default'>";?>
    </div>   
    </div>   
                  
                  <div class="form-group form-group-sm">
      <label class="col-sm-2 control-label" for="sm">Nationality:  </label>
      <div class="col-sm-3">
       <?php echo "<input type='text' name='lastName' id= 'lastName2' value='$nationality' disabled class = 'form-control btn btn-default'>";?>
    </div>   
                       <label class="col-sm-2 control-label" for="sm">PhilHealth Number: </label>
      <div class="col-sm-3">
     <?php echo "<input type='text' name='lastName' id= 'lastName2' value='$philhealth' disabled class = 'form-control btn btn-default'>";?>
    </div>   
        </div>     
                    
<div class="form-group form-group-sm">
      <label class="col-sm-2 control-label" for="sm">Position:  </label>
      <div class="col-sm-3">
      <?php echo "<input type='text' name='lastName' id= 'lastName2' value=' $position ' disabled class = 'form-control btn btn-default'>";?>
    </div>   
     <label class="col-sm-2 control-label" for="sm">Pag-IBIG Number: </label>
      <div class="col-sm-3">
     <?php echo "<input type='text' name='lastName' id= 'lastName2' value='$pagibig' disabled class = 'form-control btn btn-default'>";?>
        </div>  
        </div>  
                  
                  
                
                 
                
  </form>
</div>

<div align = 'right'>
	<a <?php echo "href=\"myInfo.php?edit=true&empNum=" . $_SESSION['empNum'] . "\""?>><button type="button" class="btn btn-primary">Edit</button></a>
	<button type="button" class="btn btn-default" onclick="history.go(-1);">Back</button>
</div>