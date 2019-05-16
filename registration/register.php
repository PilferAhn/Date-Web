<?php include('../server/server.php');?>
         <!-- Custom Header Stylesheets and CSS -->
<?php include_once('../header.php');?>

<!-- DO NOT DELETE THIS PART (WHOLE HEAD PART),  CSS WILL BE BROKED IF THIS PART IS REMOVED -->
 <head>
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

<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:regular,700,600&amp;latin"
          type="text/css"/>
    <!-- Essential styles -->
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/plugins/font-awesome/css/font-awesome.css" type="text/css">

    <link id="theme_style" type="text/css" href="assets/css/style1.css" rel="stylesheet" media="screen">


    <!-- JS Library -->
    <script src="/assets/js/jquery.js"></script>
    <style>

        @import url(https://fonts.googleapis.com/css?family=Oswald:400,300);
        @import url(https://fonts.googleapis.com/css?family=Open+Sans);

        body {
            font-family: 'Open Sans', sans-serif;
        }

    </style>

	<div class="limiter">
        <div class="row">
            <div class="col-lg-12 col-md-12"></div>
            <a href="../index.php"><<img id="logo" src="/assets/img/logo.png"></a>
            
        </div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				
				<!--Form start-->
				<form class="login100-form validate-form flex-sb flex-w" method="post" action="register.php">
				  	<?php include('errors.php'); ?>
					<span class="login100-form-title p-b-51">
						Sign Up
					</span>

				
					
					<?php
						session_start();
						$email = $_SESSION['email'];
						 
						
						echo "<div class= 'wrap-input100 validate-input m-b-16' data-validate = 'Username is required'>";
						
						echo "<input class='input100' type='text' name='email' value= $email></input>";
						echo '<span class="focus-input100"></span>';
						echo '</div>'
					?>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password_1" placeholder="password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password_2" placeholder="confirm password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>
				
					<div class="wrap-input100 validate-input m-b-16">
					<?php include_once('../age.php'); ?>
					<span class="focus-input100"></span>
					</div>
					
			   		
					<div class="wrap-input100 validate-input m-b-16" >
					<select class ="input100" name="gender">
  						<option value="male">Male</option>
 						<option value="female">Female</option>
					</select>
					<span class="focus-input100"></span>
					</div>
					
					
				  <p>Please choose the city you live in:</p>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "City is required">
					
					<select class ="input100" name="city">
  							<option value="Melbourne">Melbourne</option>
 							 <option value="Sydney">Sydney</option>
 						 <option value="Perth">Perth</option>
  						<option value="Brisbane">Brisbane</option>
  						<option value="Brisbane">Adelaide</option>
						</select>
						<span class="focus-input100"></span>
					</div>
					
				<p>Please choose your first interest:</p>
			    <div class="wrap-input100 validate-input m-b-16" data-validate = "Interest 1 is required">
					
					<select class ="input100" name="interest1">
  							<option value="Sports">Sports</option>
 							 <option value="Music">Music</option>
 						 <option value="Traveling">Traveling</option>
  						<option value="Socializing">Socializing</option>
  						<option value="Painting">Painting</option>
  						<option value="Dancing">Dancing</option>
  						<option value="Reading and Writing">Reading and Writing</option>
  						<option value="Computer">Computer</option>
  						<option value="Gardening">Gardening</option>
  						<option value="Animal Care">Animal Care</option>
						</select>
						<span class="focus-input100"></span>
					</div>
				<p>Please choose your second interest:</p>
			<div class="wrap-input100 validate-input m-b-16" data-validate = "Interest 2 is required">
					
					<select class ="input100" name="interest2">
  							<option value="Sports">Sports</option>
 							 <option value="Music">Music</option>
 						 <option value="Traveling">Traveling</option>
  						<option value="Socializing">Socializing</option>
  						<option value="Painting">Painting</option>
  						<option value="Dancing">Dancing</option>
  						<option value="Reading and Writing">Reading and Writing</option>
  						<option value="Computer">Computer</option>
  						<option value="Gardening">Gardening</option>
  						<option value="Animal Care">Animal Care</option>
						</select>
						</select>
						<span class="focus-input100"></span>
					</div>
					
					<p>Tell me your school:</p>
					<div class="wrap-input100 validate-input m-b-16" >
						<input class="input100" type="text" name="education" placeholder="Education (optional)">
						<span class="focus-input100"></span>
					</div>
					
					
						<p>Please select your occupation:</p>
			        <div class="wrap-input100 validate-input m-b-16" data-validate = "Occupation is required">
					
					<select class ="input100" name="occupation">
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
					
					<p>Explain your self</p>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "General information is required">
						<input class="input100" type="text" name="general_info" placeholder="Please introduce your self">
						<span class="focus-input100"></span>
					</div>
					
					

					
					

					<div class="container-login100-form-btn m-t-17">
						<button type="submit" name="reg_user" class="login100-form-btn">
						     Submit
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	


  <?php
        include_once('../footer.php');
    ?>

