<!DOCTYPE html>
<html>
	<head>
		<title>DateTime Picker</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.css">
	</head>

	<body>
		<form action='dateTime.php?submit=1' method='POST'>
			<div class="input-append date form_datetime">
 				<input size="16" type="text" name='bday' value="" readonly id='datetimepicker'>
    			<span class="add-on"><i class="glyphicon glyphicon-th"></i></span>
			</div>
		</form>
	</body>
	<script href='js/bootstrap.js'></script>
	<script href='js/bootstrap-datetimepicker.min.js'></script>
	<script href='js/bootstrap-datetimepicker.js'></script>
	<script href='js/jquery-1.8.3.min.js'></script>
	<script href='js/jquery.js'></script>
	<script type="text/javascript">
    	$('#datetimepicker').datetimepicker({
    		format: 'yyyy-mm-dd hh:ii'
		});
	</script>  
</html>