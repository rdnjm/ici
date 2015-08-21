<?php
	session_start();
	include 'needs/connString.php';
	include 'func/functions.php';
	if(isset($_SESSION['posCode'])){
		header("LOCATION: /ici/");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Employee's Portal</title>
		<meta name="viewport" content = "width=device-width, initial-scale=1.0">
		<link rel='stylesheet' type='text/css' href='css/bootstrap.css'>
	</head>
	
	<body background ="images/1.jpg">
     <div class="container">
         <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
              <div class="col-md-4">
      <section class="login-form">
        
		<form method='POST' action='func/checkPW.php' name='login' role="login">
			<table>
			<?php if(isset($_GET['err']) == 1){?>
				<tr>
					<td colspan='2' align='center'>Invalid Employee Number or Password</td>
				</tr>
			<?php } else if(isset($_GET['err']) == 2){?>
				<tr>
					<td colspan='2' align='center'>Please login first</td>
				</tr>
			<?php } else if (isset($_GET['err']) == 101){?>
				<tr>
					<td>There's seem to be a problem. Please contact your HR Department to get rid of this error.</td>
				</tr>
			<?php }?>	
								  <img src="images/header.png" class="img-responsive" alt="" />
          <input type="text" id="username" name="empNum" placeholder="Username"  class="form-control input-lg" />
          
          <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password" class="" />
          
          
          <button type="submit"  class="btn btn-lg btn-primary btn-block">Sign in</button>
             <button type="reset"  class="btn btn-lg btn-success btn-block">Reset</button>
          
          
        </form>
        
        
      </section>  
      </div>
      
     
      

  </div>
  
      
  
  
</div>

</body>
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src='js/bootstrap.js'></script>
</html>