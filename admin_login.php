
<!--Admin credentials -> email: admin@gmail.com / password: admin 
This can be changed via editing admin table in phpMyAdmin.
Only this credentials can login to admin dashboard, other users can't login to admin panel.
-->
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
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
	<link rel="stylesheet" type="text/css" href="/workspace/css/util.css">
	<link rel="stylesheet" type="text/css" href="/workspace/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				
				<!--Form start-->
				<form class="login100-form validate-form flex-sb flex-w" method="post" action="admin_login.php">
				  	<?php include('errors.php'); ?>
					<span class="login100-form-title p-b-51">
						Admin login
					</span>

 <div class="wrap-input100 validate-input m-b-16" data-validate = "Email is required">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>
			<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="password">
						<span class="focus-input100"></span>
					</div>
  
					<div class="container-login100-form-btn m-t-17">
						<button type="submit" name="admin_user" class="login100-form-btn">
						     LOGIN
						</button>
					</div>
  </form>
</body>
</html>







