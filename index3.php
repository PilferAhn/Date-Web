<?php include('server/server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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

<meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:regular,700,600&amp;latin"
          type="text/css"/>
    
    <!-- Essential styles -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css" type="text/css">

    <link id="theme_style" type="text/css" href="assets/css/style1.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="assets/css/popupBoxes.css" type="text/css"

    <!-- JS Library -->
    <script src="assets/js/jquery.js"></script>
   
    <style>
    </style>
    
</head>
<body>
	
	<div class="limiter">
		<div class="row">
        <div class="col-lg-12 col-md-12"></div>
        <img id="logo" src="assets/img/logo.png">
        <hr>
    </div>
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				
				
				<!--Form start-->
				<form class="login100-form validate-form flex-sb flex-w" method="post" action="index.php">
				  	<?php include('registration/errors.php'); ?>
					<span class="login100-form-title p-b-51">
						Welcome
					</span>

					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Email is required">
						<label for="Username">Email/Username: </label>
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						 <label for="Password">Password</label>
						<input class="input100" type="password" name="password" placeholder="password">
						<span class="focus-input100"></span>
					</div>
					<div class="checkbox">
                    <label>
                        <input type="checkbox"> Remember Me
                    </label>
                </div>

					
					

					<div class="container-login100-form-btn m-t-17">
						
						<button type="submit" name="login_user" class="login100-form-btn">
						     Login
						</button>
					</div>
					<a href="#">Forgot your password? </a>

				</form>
				 <p class="text-center">
                <span style="position: relative;
                                padding: 5px;
                                border-radius: 30px;
                                top: 33px;
                                background: #eee;">OR</span>
            <hr>
            </p>
				<div class="container-login100-form-btn m-t-17">
						<a href='email_confirm.php' class="login100-form-btn">Sign up</a> 
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
<!-- Essentials -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!--<script src="assets/plugins/owl-carousel/owl.carousel.js"></script>-->
<script src="assets/plugins/counter/jquery.countTo.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).ready(function () {

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
    });
</script>
</body>
</html>




