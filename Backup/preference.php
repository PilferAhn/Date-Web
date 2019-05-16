<!-- inculde server.php to connect db and verify the form data -->
<?php include('server/server.php') ?>
<!-- Redirect to user dashboard page if the form was successfully submitted -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>User preference</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script type="text/javascript" src="resources/script.js"></script>
</head>
<body>

<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100 p-t-50 p-b-90">
		
		
			
			<form class="login100-form validate-form flex-sb flex-w" method="post" action="preference.php">
				<?php include('registration/errors.php'); ?>
				<?php echo "Hi ".$_SESSION["email"];?></br>
				<span class="login100-form-title p-b-51">
				Type your prefrences</span>
		
		
				<div class="wrap-input100 validate-input m-b-16" data-validate = "Age is required">
				    <div data-role="rangeslider">
				        <label for="price-min">Show Me</label>
				        <input type="range"  id="age_min" name = "age_min" value="18" min="18" max="100">
				        <label for="price-max">Show Me</label>
				        <input type="range"  id="age_max" name = "age_max"value="30" min="0" max="100">
			        </div>
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
				
				
				<div class="wrap-input100 validate-input m-b-16" data-validate = "habit is required">
					<input class="input100" type="text" name="pre_habit" placeholder="Habit">
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input m-b-16" data-validate = "Education is required">
					<input class="input100" type="text" name="pre_education" placeholder="Education">
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input m-b-16" data-validate = "Occupation is required">
					<input class="input100" type="text" name="pre_occupation" placeholder="Occupation">
					<span class="focus-input100"></span>
				</div>
				
				<div class="container-login100-form-btn m-t-17">
					<button type="submit" name = "user_preference" >Submit</button>
				</div>
		
				</form>
				
			
			
		</div>
	</div>
</div>
	
	
	
	


</body>
</html>