<!-- inculde server.php to connect db and verify the form data -->
<?php include('../server/server.php') ?>
<!-- Redirect to user dashboard page if the form was successfully submitted -->
<?php include_once('../header.php');?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>User preference</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- DO NOT DELETE THIS PART (WHOLE HEAD PART),  CSS WILL BROKE IF THIS PART IS REMOVED -->
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
							<?php
							echo $_SESSION['email'];
							echo '</br>';
							
							// echo $_SESSION['gender'];
							
							?>
	<div class="limiter">
		<div class="row">
            <div class="col-lg-12 col-md-12"></div>
            <a href="../index.php"><<img id="logo" src="/assets/img/logo.png"></a>
            
        </div>
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form class="login100-form validate-form flex-sb flex-w" method="post" action="preference.php">
						<?php include('errors.php'); ?>
					<span class="login100-form-title p-b-51">
						Type your prefrences
						

					</span>

			  <p>Please choose preferred minimum age:</p>
				<div class="wrap-input100 validate-input m-b-16" data-validate = "Age is required">
					
				<select class ="input100" name="age_min">
  			
					<?php
    				for ($i=18; $i<=60; $i++)
    				{
					?>
           	 <option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php
    			}
					?>
				</select>
				</div>
			  <p>Please choose preferred maximum age:</p>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Age is required">
					
				<select class ="input100" name="age_max">
  			
					<?php
    				for ($i=18; $i<=60; $i++)
    				{
					?>
           	 <option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php
    			}
					?>
				</select>
				</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Gender is required">
					
						<select class ="input100" name="pre_gender">
  							<option value="male">Male</option>
 							 <option value="female">Female</option>
						</select>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "City is required">
					
					<select class ="input100" name="pre_city">
  							<option value="Melbourne">Melbourne</option>
 							 <option value="Sydney">Sydney</option>
 						 <option value="Perth">Perth</option>
  						<option value="Brisbane">Brisbane</option>
  						<option value="Brisbane">Adelaide</option>
						</select>
						<span class="focus-input100"></span>
					</div>
			        <p>Please select preferred occupation:</p>
			        <div class="wrap-input100 validate-input m-b-16" data-validate = "Occupation is required">
					
					<select class ="input100" name="pre_occupation">
  					     <option value="Advertising, Arts & Media">Advertising, Arts & Media</option>
 					     <option value="Banking & Financial Services">Banking & Financial Services</option>
 						 <option value="Call Centre & Customer Service">Call Centre & Customer Service</option>
  						<option value="CEO & General Management">CEO & General Management</option>
  						<option value="Community Services & Development">Community Services & Development</option>
  						<option value="Construction">Construction</option>
  						<option value="Consulting & Strategy">Consulting & Strategy</option>
  						<option value="Design & Architecture">Design & Architecture</option>
  						<option value="Education & Training">Education & Training</option>
  						<option value="Engineering">Engineering</option>
  						<option value="Information & Communication Technology">Information & Communication Technology</option>
  						<option value="Real Estate & Property">Real Estate & Property</option>
						</select>
					
						<span class="focus-input100"></span>
					</div>
					
						<div class="wrap-input100 validate-input m-b-16"> 
						<input class="input100" type="text" name="pre_education" placeholder="Education (optional)">
						<span class="focus-input100"></span>
					</div>
					
				
					
					
				
					
				
					<div class="container-login100-form-btn m-t-17">
						<button type="submit" name="user_preference"  class="login100-form-btn">
						     Submit
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>
	
	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>