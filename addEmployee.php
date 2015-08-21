<?php
	session_start();
	include 'needs/connString.php';
	include 'func/functions.php';
	accessType();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Add New Employee</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' type='text/css' href='css/bootstrap.css'>
        <link rel='stylesheet' type='text/css' href='css/toastr.css'>
        <script type='text/javascript' src='js/toastr.js'></script>
	</head>

	<body>
		<div class='container'>
			<div class='container'>
				<?php
					if(isset($_GET['code'])){
						if($_GET['code'] == 1){
							echo "Employee Record has been successfully added!";
						}

						else if($_GET['code'] == 101){
							echo "There's seem to be a problem. Please contact your IT Technical Support.";
						}
					}
				?>
			</div>
			<form class='form-horizontal' action='func/addEmp.php' method='POST'>
				
			
		</div>
        <section id="section4">
    <div class="container v-center">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Add Employee</h1>
                <hr>
            </div>
        </div>
       
        <div class="row">
            <div class="col-sm-9">
                 <div class="row form-group">
                    <div class="col-sm-5">
                    <Label>Employee Number: </Label><input type='text' class='form-control' id='empNum' placeholder='Employee Number(ex. 2015-001)' name='empNum' required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-3">
                    <Label>First Name: </Label><input type='text' class='form-control' id='firstname' placeholder='First Name' name='firstname' required>
                    </div>
                    <div class="col-sm-3">
                    <Label>Middle Name</Label><input type='text' class='form-control' id='middlename' placeholder='Middle Name' name='middlename' required>
                    </div>
                    <div class="col-sm-4">
                     <Label>Last Name: </Label><input type='text' class='form-control' id='lastname' placeholder='Last Name' name='lastname' required>
                    </div>
                   
				</div> 
                <div class="row form-group">
               <div class='col-sm-10'>
					<Label>Address: </Label><input type='text' class='form-control' id='address' placeholder='Address' name='address' required>
					</div>
                    </div>
                <div class="row form-group">
                    <div class="col-sm-3">
                     <Label>Gender</Label><select class="form-control" id="gender" name='gender'>
                            <option value='Single'>Gender</option>
							<option value='Male'>Male</option>
							<option value='Female'>Female</option>
						</select>
                    </div>
                    <div class="col-sm-3">
                     <Label>Nationality</Label><select class="form-control" id="nationality" name='nationality'>
							<option value='Filipino'>Filipino</option>
							<option value='American'>American</option>
						</select>	
                    </div>
                     <div class="col-sm-4">
                     <Label>Contact Number</Label><input type='text' class='form-control' id='conNum' placeholder='Contact Number(ex. 0917XXXXXXX)' length='11' name='conNum' required>
                    </div>
                </div>
                <Label>Birthday: </Label><div class="row form-group">
				<div class='col-sm-4'>
						<select class="form-control" id="bday" name='month'>
							<option value='1'>January</option>
							<option value='2'>February</option>
							<option value='3'>May</option>
							<option value='4'>April</option>
							<option value='5'>May</option>
							<option value='6'>June</option>
							<option value='7'>July</option>
							<option value='8'>August</option>
							<option value='9'>September</option>
							<option value='10'>October</option>
							<option value='11'>November</option>
							<option value='12'>December</option>
						</select>	
					</div>

					<div class='col-sm-3'>
						<select class="form-control" id="bday" name='day'>
							<?php
								for($i=1;$i<=31;$i++){
									echo "<option value='$i'>$i</option>";
								}
							?>
						</select>	
					</div>

					<div class='col-sm-3'>
						<select class="form-control" id="bday" name='year'>
							<?php
								for($i=2015;$i>=1900;$i--){
									echo "<option value='$i'>$i</option>";
								}
							?>
						</select>	
					</div>
				</div>

                <div class="row form-group">
                    <div class="col-sm-4">
                     <Label>Position: </Label><select class="form-control" id="position" name='position'>
							<?php 
								$result = getPositionInfo();
								while($rows = mysqli_fetch_array($result)){
										echo "<option value='$rows[0]'>$rows[1]</option>";
								}
							?>
						</select>	
                    </div>
                     <div class="col-sm-3">
                      <Label>Marital Status: </Label>  <select class="form-control" id="maritalStatus" name='maritalStatus'>
                            <option value='Single'>Marital Status</option>
							<option value='Single'>Single</option>
							<option value='Married'>Married</option>
							<option value='Widow'>Widow</option>
							<option value='Widower'>Widower</option>
						</select>	
                    </div>
                    <div class="col-sm-3">
                     <Label>Number of Dependents: </Label>  <select class="form-control" id="dependents" name='dependents'>
							<?php 
								for($i=0;$i<=4;$i++){
									echo "<option value='$i'>$i</option>";
								}
							?>
						</select>	
                    </div>
                </div>
                 <div class="row form-group">
                    <div class="col-sm-3">
                    <Label>SSS Number: </Label>    <input type='text' class='form-control' id='sss' placeholder='(ex. 01-2345678-0)' name='sss' required>
                    </div>
                     <div class="col-sm-3">
                      <Label>Pag-IBIG Number: </Label>  <input type='text' class='form-control' id='pagibig' placeholder='(ex. 1234-5678-9012)' name='pagibig' required>
                    </div>
                     <div class="col-sm-4">
                      <Label>PhilHealth Number: </Label>  <input type='text' class='form-control' id='philhealth' placeholder='(ex. 01-234567890-1)' name='philhealth' required>
                    </div>
                     </div>
                 <div class="row form-group">
                    <div class="col-sm-5">
                     <Label>Tax Identifier Number: </Label>   <input type='text' class='form-control' id='tin' placeholder='(ex. 123-456-789-0123)' name='tin' required>
                    </div>
                      <div class="col-sm-5">
                       <Label>Daily Rate: </Label> <input type='text' class='form-control' id='rate' placeholder='(ex. 481.00)' name='rate' required>
                    </div>
                     </div>
                <div class="row form-group">
                    <div class="col-sm-10">
                        <button class="btn btn-danger btn-lg pull-right">Cancel</button>
                        <button class="btn btn-success btn-lg pull-right">Save</button>
                        
                    </div>
                    
                </div>
            </div>
            <div class="col-sm-3 pull-right">
                <address>
              <strong>Image Upload<br><br>
              <div class="col-sm-9">
				<input type='file' id='image'>
    				</div><br>
					<p class='help-block'> Up to 2MB filesize of image only</p>
				</address>
               
            </div>
                
	</body>

	<script src="js/jquery-1.11.3.min.js"></script>
	<script src='js/bootstrap.js'></script>
</html>