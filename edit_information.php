<?php include('server/server.php');
        $pageTitle='D8 Findr | Sign Up';
        function customHeader(){ ?>
<?php }
include_once('header.php');
include('server/api.php');

if(!isset($_SESSION))
{
    session_start();
}


    



?>

<?php

    $email = $_SESSION['email'];
    $query = "SELECT city, interest1, interest2, occupation, general_info FROM users where email = '$email'";
    
    $results = mysqli_query($db, $query);
    $array = mysqli_fetch_assoc($results);
    
    $city = $array['city'];
    $interest1 = $array['interest1'];
    $interest2 = $array['interest2'];
    $occupation = $array['occupation'];
    $info = $array['general_info'];

    
    $getInfo = getUserInfo($email)

    

?>



﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <title>D8Finder</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:regular,700,600&amp;latin"
          type="text/css"/>
    <!-- Essential styles -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css" type="text/css">

    <link id="theme_style" type="text/css" href="assets/css/style1.css" rel="stylesheet" media="screen">


    <!-- JS Library -->
    <script src="assets/js/jquery.js"></script>

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12"></div>
        <img id="logo" src="assets/img/logo.png">
        <hr>
    </div>
    
        <!-- 
    Using Header for effect work
    Please refer header / navigation.php
    -->
    <?php require ('header/navigation.php'); ?>
    
        <div class="col-md-7 col-lg-7 pass-change-div hidden">
            <h1>Change your information: </h1>
            <br>
            <form method = "post" action = "edit_information.php">
                
                <!--  City selection  -->
                <p>Please choose the city you live in:</p>
                <div class="wrap-input100 validate-input m-b-16">
				<select class ="input100" name="city">
				    <option><?php echo $city ?></option>
  					<option value="Melbourne">Melbourne</option>
 					<option value="Sydney">Sydney</option>
 					<option value="Perth">Perth</option>
  					<option value="Brisbane">Brisbane</option>
  					<option value="Brisbane">Adelaide</option>
				</select>
				<span class="focus-input100"></span>
				</div>
					
				<!--  First Interest  -->
				<p>Please choose your first interest:</p>
			    <div class="wrap-input100 validate-input m-b-16" data-validate = "Interest 1 is required">
					<select class ="input100" name="interest1" >
					    <option><?php echo $interest1 ?></option>
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
    				      <option><?php echo $interest2 ?></option>
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
				
				<p>Please select your occupation:</p>
		        <div class="wrap-input100 validate-input m-b-16" data-validate = "Occupation is required">
					
					<select class ="input100" name="occupation">
					    <option><?php echo $occupation?></option>
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
				
				<p>Please introduce your self</p>
				<div class="wrap-input100 validate-input m-b-16" data-validate = "General information is required">
						<input class="input100" type="text" name="general_info" value = "<?php echo $info ?>">
						<span class="focus-input100"></span>
				</div>

                <button type="submit" name = "edit_information" class="btn btn-success">Change</button>
            </form>
        </div>
    </div>
</div>

</div>

</div>
<div class="footer">
    <div class="container">
        <ul class="pull-left footer-menu">
            <li>
                <a href="#"> Home </a>
                <a href="#"> About us </a>
                <a href="#"> Contact us </a>
            </li>
        </ul>
        <ul class="pull-right footer-menu">
            <li>Copyright &copy; 2018.D8Finder All rights reserved.</li>
        </ul>
    </div>
</div>

<!-- Essentials -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!--<script src="assets/plugins/owl-carousel/owl.carousel.js"></script>-->
<script src="assets/plugins/counter/jquery.countTo.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.hidden').fadeIn('slow').removeClass('hidden')
        $('.item-count').countTo({
            formatter: function (value, options) {
                return value.toFixed(options.decimals);
            },
            onUpdate: function (value) {

            },
            onComplete: function (value) {

            }
        });
    });
</script>
</body>
</html> 
