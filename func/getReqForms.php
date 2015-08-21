<?php
	if(isset($_POST['type'])){
		$type = $_POST['type'];
		$today = date('Y-m-d');
		$year = substr($today, 0, 4);
		$month = substr($today, 6, 2);
		$day = substr($today, 8, 2);
		
		if($type == 1){
        	echo "<link rel='stylesheet' type='text/css' href='css/bootstrap-datetimepicker.css'>";
			echo "<form class='form-horizontal' action='func/applyLeave.php' method='POST'><br>";
            echo "	<div class='row'>
            			<div class='col-md-12'>
                			<h2 class='text-left'>Leave Request</h2>
                		</div>
        			</div>"; 
				echo "<div class='form-group'><br>"; 
					echo "<label for='type' class='col-sm-3 control-label'>Type: </label>";
					echo "<div class='col-sm-4'>";
						echo "<select name='type' class = 'form-control'>";
							echo "<option value='sick'>Sick Leave</option>";
							echo "<option value='vacation'>Vacation</option>";
							echo "<option value='emergency'>Emergency Leave</option>";
							echo "<option value='off-set'>Off-Set Leave</option>";
						echo "</select>";
					echo "</div>";
				echo "</div>";



				echo "<div class='form-group'>";
					echo "<label for='start' class='col-sm-3 control-label'>From: </label>";
					echo "<div class='col-sm-3'>";
						echo "<select class='form-control' id='start' name='startmonth'>";?>
							<option value='1' <?php if ($month == 1){ echo "selected='selected'";}?>>January</option>
							<option value='2' <?php if ($month == 2){ echo "selected='selected'";}?>>February</option>
							<option value='3' <?php if ($month == 3){ echo "selected='selected'";}?>>May</option>
							<option value='4' <?php if ($month == 4){ echo "selected='selected'";}?>>April</option>
							<option value='5' <?php if ($month == 5){ echo "selected='selected'";}?>>May</option>
							<option value='6' <?php if ($month == 6){ echo "selected='selected'";}?>>June</option>
							<option value='7' <?php if ($month == 7){ echo "selected='selected'";}?>>July</option>
							<option value='8' <?php if ($month == 8){ echo "selected='selected'";}?>>August</option>
							<option value='9' <?php if ($month == 9){ echo "selected='selected'";}?>>September</option>
							<option value='10' <?php if ($month == 10){ echo "selected='selected'";}?>>October</option>
							<option value='11' <?php if ($month == 11){ echo "selected='selected'";}?>>November</option>
							<option value='12' <?php if ($month == 12){ echo "selected='selected'";}?>>December</option>
						<?php echo "</select>";
					echo "</div>";

					echo "<div class='col-sm-3'>";
						echo "<select class='form-control' id='start' name='startday'>";
							for($i=1;$i<=31;$i++){
								if($i == $day){
									echo "<option value='$i' selected='selected'>$i</option>";
								}

								else{
									echo "<option value='$i'>$i</option>";
								}
							}
						echo "</select>";	
					echo "</div>";

					echo "<div class='col-sm-3'>";
						echo "<select class='form-control' id='start' name='startyear'>";
								for($i=2014;$i<=2020;$i++){
									if($i == $year){
										echo "<option value='$i' selected='selected'>$i</option>";
									}
									else{
										echo "<option value='$i'>$i</option>";
									}
								}
						echo "</select>";
					echo "</div>";
				echo "</div>";



/*				
				echo "<div class='input-group date form_datetime col-md-5' data-date='" . $today . "' data-date-format='yyyy-mm-dd' >";
                    echo "<input class='form-control' size='16' type='text' value='' readonly>";
                    echo "<span class='input-group-addon'><span class='glyphicon glyphicon-remove'></span></span>";
					echo "<span class='input-group-addon'><span class='glyphicon glyphicon-th'></span></span>";
                echo "</div>";
*/

				echo "<div class='form-group'>";
					echo "<label for='end' class='col-sm-3 control-label'>To: </label>";
					echo "<div class='col-sm-3'>";
						echo "<select class='form-control' id='end' name='endmonth'>";?>
							<option value='1' <?php if ($month == 1){ echo "selected='selected'";}?>>January</option>
							<option value='2' <?php if ($month == 2){ echo "selected='selected'";}?>>February</option>
							<option value='3' <?php if ($month == 3){ echo "selected='selected'";}?>>May</option>
							<option value='4' <?php if ($month == 4){ echo "selected='selected'";}?>>April</option>
							<option value='5' <?php if ($month == 5){ echo "selected='selected'";}?>>May</option>
							<option value='6' <?php if ($month == 6){ echo "selected='selected'";}?>>June</option>
							<option value='7' <?php if ($month == 7){ echo "selected='selected'";}?>>July</option>
							<option value='8' <?php if ($month == 8){ echo "selected='selected'";}?>>August</option>
							<option value='9' <?php if ($month == 9){ echo "selected='selected'";}?>>September</option>
							<option value='10' <?php if ($month == 10){ echo "selected='selected'";}?>>October</option>
							<option value='11' <?php if ($month == 11){ echo "selected='selected'";}?>>November</option>
							<option value='12' <?php if ($month == 12){ echo "selected='selected'";}?>>December</option>
						<?php echo "</select>";
					echo "</div>";

					echo "<div class='col-sm-3'>";
						echo "<select class='form-control' id='end' name='endday'>";
							for($i=1;$i<=31;$i++){
								if($i == $day){
									echo "<option value='$i' selected='selected'>$i</option>";
								}

								else{
									echo "<option value='$i'>$i</option>";
								}
							}
						echo "</select>";	
					echo "</div>";

					echo "<div class='col-sm-3'>";
						echo "<select class='form-control' id='end' name='endyear'>";
								for($i=2014;$i<=2020;$i++){
									if($i == $year){
										echo "<option value='$i' selected='selected'>$i</option>";
									}
									else{
										echo "<option value='$i'>$i</option>";
									}
								}
						echo "</select>";
					echo "</div>";
				echo "</div>";
		
				echo "<div class='form-group'>";
					echo "<label for='reason' class='col-sm-3 control-label'>Reason: </label>";
					echo "<div class='col-sm-9'>";
						echo "<textarea id='reason' name='reason' class='form-control' rows='3'></textarea>";
					echo "</div>";
				echo "</div>";

				echo "<div class='form-group'>";
					
            echo "<div align = 'right'>";
						echo "<button value='Submit' name='submit' class='btn-success'>Submit</button>&nbsp;";
						echo "<button onclick='goBack()' class='btn-danger'>Close</button>";
					echo "</div>";
				echo "</div>";
			echo "</form>";
		}

		else if($type == 2){
		echo "<form class='form-horizontal' action='func/applyLoan.php' method='POST'><br>";
            echo "<div class='row'>
            <div class='col-md-12'>
                <h2 class='text-left'>Leave Request</h2>
                </div>
        </div>"; 
				echo "<div class='form-group'><br>"; 
					echo "<label for='type' class='col-sm-3 control-label'>Type: </label>";
					echo "<div class='col-sm-4'>";
						echo "<select name='type' class = 'form-control'>";
							echo "<option value='Emergency Loan' selected='selected'>Emergency Loan</option>";
						echo "</select>";
					echo "</div>";
				echo "</div>";

				echo "<div class='form-group'><br>"; 
					echo "<label for='toPay' class='col-sm-3 control-label'>Months to Pay: </label>";
					echo "<div class='col-sm-4'>";
						echo "<select name='toPay' class='form-control'>";
							for($i=6; $i <= 30; $i+=6){
								echo "<option value='" . $i . "'>" . $i . " Months</option>";
							}
						echo "</select>";
					echo "</div>";
				echo "</div>";
		
				echo "<div class='form-group'><br>"; 
					echo "<label for='amount' class='col-sm-3 control-label'>Amount: </label>";
					echo "<div class='col-sm-4'>";
						echo "<input name='amount' id='amount'>";
					echo "</div>";
				echo "</div>";

				echo "<div class='form-group'>";
					echo "<label for='reason' class='col-sm-3 control-label'>Reason: </label>";
					echo "<div class='col-sm-9'>";
						echo "<textarea id='reason' name='reason' class='form-control' rows='3'></textarea>";
					echo "</div>";
				echo "</div>";

				echo "<div class='form-group'>";
					
            echo "<div align = 'right'>";
						echo "<button value='Submit' name='submit' class='btn btn-success'>Submit</button>&nbsp;";
						echo "<button onclick='goBack()' class='btn btn-danger'>Close</button>";
					echo "</div>";
				echo "</div>";
			echo "</form>";
		}

		else if($type == 3){
			echo "<form class='form-horizontal' action='func/applyOT.php' method='POST'><br>";
             echo "<div class='row'>
            <div class='col-md-12'>
                <h2 class='text-left'>Overtime Request</h2>
                
            </div>
        </div>"; 
				echo "<div class='form-group'><br>";
					echo "<label for='start' class='col-sm-3 control-label'>For: </label>";
					echo "<div class='col-sm-3'>";
						echo "<select class='form-control' id='start' name='month'>";?>
							<option value='1' <?php if ($month == 1){ echo "selected='selected'";}?>>January</option>
							<option value='2' <?php if ($month == 2){ echo "selected='selected'";}?>>February</option>
							<option value='3' <?php if ($month == 3){ echo "selected='selected'";}?>>May</option>
							<option value='4' <?php if ($month == 4){ echo "selected='selected'";}?>>April</option>
							<option value='5' <?php if ($month == 5){ echo "selected='selected'";}?>>May</option>
							<option value='6' <?php if ($month == 6){ echo "selected='selected'";}?>>June</option>
							<option value='7' <?php if ($month == 7){ echo "selected='selected'";}?>>July</option>
							<option value='8' <?php if ($month == 8){ echo "selected='selected'";}?>>August</option>
							<option value='9' <?php if ($month == 9){ echo "selected='selected'";}?>>September</option>
							<option value='10' <?php if ($month == 10){ echo "selected='selected'";}?>>October</option>
							<option value='11' <?php if ($month == 11){ echo "selected='selected'";}?>>November</option>
							<option value='12' <?php if ($month == 12){ echo "selected='selected'";}?>>December</option>
						<?php echo "</select>";
					echo "</div>";

					echo "<div class='col-sm-3'>";
						echo "<select class='form-control' id='start' name='day'>";
							for($i=1;$i<=31;$i++){
								if($i == $day){
									echo "<option value='$i' selected='selected'>$i</option>";
								}

								else{
									echo "<option value='$i'>$i</option>";
								}
							}
						echo "</select>";	
					echo "</div>";

					echo "<div class='col-sm-3'>";
						echo "<select class='form-control' id='start' name='year'>";
								for($i=2014;$i<=2020;$i++){
									if($i == $year){
										echo "<option value='$i' selected='selected'>$i</option>";
									}
									else{
										echo "<option value='$i'>$i</option>";
									}
								}
						echo "</select>";
					echo "</div>";
				echo "</div>";
				
				echo "<div class='form-group'>";
					echo "<label for='hours' class='col-sm-3 control-label'>Number of OT hours: </label>";
					echo "<div class='col-sm-9'>";
						echo "<select class='form-control' id='numhours' name='numhours'>";
							for ($i = 1; $i <= 5; $i++){
								echo "<option value='$i'>$i</option>";
							}
						echo "</select>";
					echo "</div>";
				echo "</div>";

				echo "<div class='form-group'>";
					echo "<label for='reason' class='col-sm-3 control-label'>Reason: </label>";
					echo "<div class='col-sm-9'>";
						echo "<textarea id='reason' name='reason' class='form-control' rows='3'></textarea>";
					echo "</div>";
				echo "</div>";

				echo "<div class='form-group'>";
					echo "<div align = 'right'>";
						echo "<button value='Submit' name='submit' class='btn-success'>Submit</button>&nbsp;";
						echo "<button onclick='goBack()' class='btn-danger'>Close</button>";
					echo "</div>";
				echo "</div>";
			echo "</form>";
		}

		else if($type == 4){
			echo "<form class='form-horizontal' action='func/applyUT.php' method='POST'><br>";
             echo "<div class='row'>
            <div class='col-md-12'>
                <h2 class='text-left'>Undertime Request</h2>
                
            </div>
        </div>"; 
				echo "<div class='form-group'><br>";
					echo "<label for='start' class='col-sm-3 control-label'>For: </label>";
					echo "<div class='col-sm-3'>";
						echo "<select class='form-control' id='start' name='month'>";?>
							<option value='1' <?php if ($month == 1){ echo "selected='selected'";}?>>January</option>
							<option value='2' <?php if ($month == 2){ echo "selected='selected'";}?>>February</option>
							<option value='3' <?php if ($month == 3){ echo "selected='selected'";}?>>May</option>
							<option value='4' <?php if ($month == 4){ echo "selected='selected'";}?>>April</option>
							<option value='5' <?php if ($month == 5){ echo "selected='selected'";}?>>May</option>
							<option value='6' <?php if ($month == 6){ echo "selected='selected'";}?>>June</option>
							<option value='7' <?php if ($month == 7){ echo "selected='selected'";}?>>July</option>
							<option value='8' <?php if ($month == 8){ echo "selected='selected'";}?>>August</option>
							<option value='9' <?php if ($month == 9){ echo "selected='selected'";}?>>September</option>
							<option value='10' <?php if ($month == 10){ echo "selected='selected'";}?>>October</option>
							<option value='11' <?php if ($month == 11){ echo "selected='selected'";}?>>November</option>
							<option value='12' <?php if ($month == 12){ echo "selected='selected'";}?>>December</option>
						<?php echo "</select>";
					echo "</div>";

					echo "<div class='col-sm-3'>";
						echo "<select class='form-control' id='start' name='day'>";
							for($i=1;$i<=31;$i++){
								if($i == $day){
									echo "<option value='$i' selected='selected'>$i</option>";
								}

								else{
									echo "<option value='$i'>$i</option>";
								}
							}
						echo "</select>";	
					echo "</div>";

					echo "<div class='col-sm-3'>";
						echo "<select class='form-control' id='start' name='year'>";
								for($i=2014;$i<=2020;$i++){
									if($i == $year){
										echo "<option value='$i' selected='selected'>$i</option>";
									}
									else{
										echo "<option value='$i'>$i</option>";
									}
								}
						echo "</select>";
					echo "</div>";
				echo "</div>";
				
				$time = date("h:m");
				$hour = substr($time, 0, 2);
				if ($hour > 12){
					$hour = $hour - 12;
					$ampm = "PM";
				}

				else if ($hour < 12){
					$ampm = "AM";
				}

				else{
					$ampm = "PM";
				}

				$min = substr($time, 3, 2);

				echo "<div class='form-group'>";
					echo "<label for='time' class='col-sm-3 control-label'>Expected Time out: </label>";
					echo "<div class='col-sm-3'>";
						echo "<select class='form-control' id='time' name='hour'>";
							for ($i = 1; $i <= 12; $i++){
								if($i == $hour){
									echo "<option value='$i' selected='selected'>$i</option>";
								}
								
								else{
									echo "<option value='$i'>$i</option>";
								}
							}
						echo "</select>";
					echo "</div>";

					echo "<div class='col-sm-3'>";
						echo "<select class='form-control' id='time' name='min'>";
							for ($i = 0; $i <= 59; $i++){
								if($i >= 10){
									if($min == $i){
										echo "<option value='$i' selected='selected'>$i</option>";	
									}
									else{
										echo "<option value='$i'>$i</option>";
									}
								}

								else{
									if($min == $i){
										echo "<option value='0" . $i . "'selected='selected'>0" . $i ."</option>";
									}
									else{
										echo "<option value='0" . $i . "'>0" . $i ."</option>";
									}
								}
							}
						echo "</select>";
					echo "</div>";

					echo "<div class='col-sm-3'>";
						echo "<select class='form-control' id='time' name='ampm'>";?>
							<option value='AM' <?php if($ampm == "AM"){ echo "selected='selected'";}?>>AM</option>
							<option value='PM' <?php if($ampm == "PM"){ echo "selected='selected'";}?>>PM</option>
						<?php echo "</select>";
					echo "</div>";
				echo "</div>";


				echo "<div class='form-group'>";
					echo "<label for='reason' class='col-sm-3 control-label'>Reason: </label>";
					echo "<div class='col-sm-9'>";
						echo "<textarea id='reason' name='reason' class='form-control' rows='3'></textarea>";
					echo "</div>";
				echo "</div>";

				echo "<div class='form-group'>";
					echo "<div align = 'right'>";
						echo "<button value='Submit' name='submit' class='btn-success'>Submit</button>&nbsp;";
						echo "<button onclick='goBack()' class='btn-danger'>Close</button>";
					echo "</div>";
				echo "</div>";
			echo "</form>";
		}
	}
?>
<script src='js/bootstrap-datetimepicker.js'></script>
<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd";
    });
</script> 