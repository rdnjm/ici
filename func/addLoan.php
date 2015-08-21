<?php 
	session_start();

	if(isset($_POST['type'])){
		$type = $_POST['type'];

		if($type == 1 && $_SESSION['posCode'] == '0002'){
			echo "<form class='form-horizontal' action='func/applyLoan.php' method='POST'>";
				echo "<div class='form-group'>";
					echo "<label for='empNum' class='col-sm-3 control-label'>Employee Number</label>";
					echo "<div class='col-sm-9'>";
						echo "<input class='form-control' id='empNum' name='empNum'>";
					echo "</div>";
				echo "</div>";
				
				echo "<div class='form-group'>";
					echo "<label for='name' class='col-sm-3 control-label'>Employee Name</label>";
					echo "<div class='col-sm-9'>";
						echo "<div id='name' class='emp'>";
						echo "</div>";
					echo "</div>";
				echo "</div>";

				echo "<div class='form-group'>";
					echo "<label for='type' class='col-sm-3 control-label'>Loan Type</label>";
					echo "<div class='col-sm-9'>";
						echo "<select class='form-control' id='type' name='type'>";
							echo "<option selected='selected' value='Pag-IBIG Loan'>Pag-IBIG Loan</option>";
							echo "<option value='SSS Loan'>SSS Loan</option>";
						echo "</select>";
					echo "</div>";
				echo "</div>";
				
				echo "<div class='form-group'>";
					echo "<label for='amt' class='col-sm-3 control-label'>Amount</label>";
					echo "<div class='col-sm-3'>";
						echo "<input id='amt' name='amount' class='form-control' type='text'>";
					echo "</div>";
				echo "</div>";
				
				echo "<div class='form-group'>";
					echo "<label for='toPay' class='col-sm-3 control-label'>Months to Pay</label>";
					echo "<div class='col-sm-9'>";
						echo "<select class='form-control' id='toPay' name='toPay'>";
							for ($i = 6; $i <= 30; $i+=6){
								echo "<option value='$i'>$i</option>";
							}
						echo "</select>";
					echo "</div>";
				echo "</div>";

				echo "<div class='form-group'>";
					echo "<label for='monthly' class='col-sm-3 control-label'>Monthly Deduction</label>";
					echo "<div class='col-sm-9'>";
						echo "<input type='text' id='monthly' name='monthly' class='form-control'>";
					echo "</div>";
				echo "</div>";

				echo "<div class='form-group'>";
					echo "<label for='remarks' class='col-sm-3 control-label'>Remarks</label>";
					echo "<div class='col-sm-9'>";
						echo "<textarea id='remarks' name='remarks' class='form-control' rows='3'></textarea>";
					echo "</div>";
				echo "</div>";

				echo "<input type='hidden' name='get' value='other'>";
				echo "<div class='form-group'>";
					echo "<div class='col-sm-12' style='align: right;'>";
						echo "<button value='Submit' name='submit' class='btn btn-success'>Submit</button>";
						echo "<button onclick='goBack()' class='btn btn-danger'>Close</button>";
					echo "</div>";
				echo "</div>";
			echo "</form>";
		}
	}
?>

<script>
	$('#empNum').keyup(function(){
		var num = $(this).val();
		$.ajax({
			type: 'POST',
			url: 'func/getEmp.php',
			data: {num:num},
			success: function(data){
				$('.emp').html(data);
			}
		});
	});
</script>