<?php include('../server/server.php');?>
         <!-- Custom Header Stylesheets and CSS -->
<?php include_once('../header.php');?>

<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:regular,700,600&amp;latin" type="text/css"/>
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
		
		<div class="container">
			<div class="col-md-4 col-lg-6 col-lg-offset-3 col-md-offset-4 menu-div">
				<div class="">
			
				<!--Form start-->
					<form class="" id="registrationForm" method="post" action="registerNew.php">
					  	<?php include('errors.php'); ?>
						<span class="login100-form-title p-b-51">
							Sign Up
						</span>
						<div>
							Thank you for creating an account now we just need a few more details before you get started: <br>
						</div>

						<?php
							//session_start();
						//	$email = $_SESSION['email'];
						//print_r($_SESSION);	 
						//echo $_SESSION['email'];
						$email = $_SESSION['email'];
						?>
						
						<input type='hidden' name = 'email' value = '<?php echo $email ?>'>
						<div class="form-group" >
							<label for="genderInput">Gender:</label>
							<select class="form-control" name="gender">
								<option value="" selected>Please Select</option>
		  						<option value="male">Male</option>
		 						<option value="female">Female</option>
							</select>
						
						</div>
					
					
						<div class="form-group" data-validate = "City is required">
							<label for="cityInput">Where you live:</label>
							<select class ="form-control" name="city">
								<option value="" selected>Please Select</option>
	  							<option value="Melbourne">Melbourne</option>
	  							<option value="Sydney">Sydney</option>
								<option value="Perth">Perth</option>
	  							<option value="Brisbane">Brisbane</option>
	  							<option value="Adelaide">Adelaide</option>
	  							<option value="Hobart">Hobart</option>
	  							<option value="Canberra">Canberra</option>
								<option value="Darwin">Darwin</option>
							</select>
						
						</div>
					
						<div class="row">
							<div class="col-6">
							    <div class="form-group" data-validate = "Interest 1 is required">
							    	<label for="interest1Input">Interest 1:</label>
									<select class ="form-control" name="interest1">
										<option value="" selected>Please Select</option>
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
								</div>
							</div>
							<div class="col">
								<div class="form-group" data-validate = "Interest 2 is required">
									<label for="interest2Input">Interest 2:</label>
									<select class ="form-control" name="interest2">
										<option value="" selected>Please Select</option>
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
								</div>
							</div>
						</div>
		
						<div class="form-group" >
								<label for="educationInput">Education Level:</label>
							<input class="form-control" type="text" name="education" placeholder="Education (optional)">
						</div>
					
					
					
				        <div class="form-group" data-validate = "Occupation is required">
				        		<label for="occupationInput">Occupation:</label>		
							<select class ="form-control" name="occupation">
								<option value="" selected>Please Select</option>
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
						</div>
					
						<div class="form-group" data-validate = "General information is required">
								<label for="general_info">Give us a short description of yourself:</label>
							<textarea class="form-control" type="text" name="general_info" placeholder="Please introduce your self" rows=3></textarea>
						</div>
						
						<div class="">
						<input type="submit" name="reg_user" class="btn btn-primary"  value='Submit'></input>
						</div>
					</form>
				</div>
			</div>
		</div>
	
		<?
		/*
		    $db = mysqli_connect('localhost', 's3467941', '', 'cap');
		
		$email = mysqli_real_escape_string($db, $_SESSION['email']); 
		$gender = mysqli_real_escape_string($db, $_POST['genderInput']); 
		$city = mysqli_real_escape_string($db, $_POST['cityInput']); 
		$interest1 = mysqli_real_escape_string($db, $_POST['interest1Input']); 
		$interest2 = mysqli_real_escape_string($db, $_POST['interest2Input']); 
		$education = mysqli_real_escape_string($db, $_POST['educationInput']); 
		$occupation = mysqli_real_escape_string($db, $_POST['occupationInput']); 
		$general_info = mysqli_real_escape_string($db, $_POST['general_info']); 

			mysqli_query($db, "UPDATE users
			SET gender='". mysqli_escape_string($db, $gender) ."', 
			city='". mysqli_escape_string($db, $city) ."',
			interest1='". mysqli_escape_string($db, $interest1) ."', 
			interest2='". mysqli_escape_string($db, $interest2) ."',
			education='". mysqli_escape_string($db, $education) ."', 
			occupation='". mysqli_escape_string($db, $occupation) ."', 
			general_info='". mysqli_escape_string($db, $general_info) ."'
			WHERE email='". $email ."' ") 
			or die(mysqli_error($db));
			//);
		*/
			include_once('../footer.php');
	    ?>

