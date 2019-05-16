<?php include('server.php') ?>
<!DOCTYPE html>
<html>
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
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				
				<!--Form start-->
				<form class="login100-form validate-form flex-sb flex-w" method="post" action="/workspace/registration/login.php">
				  	<?php include('errors.php'); ?>
					<span class="login100-form-title p-b-51">
						Sign In
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
						<button type="submit" name="login_user" class="login100-form-btn">
						     Submit
						</button>
					</div>
  	<p>
  		Not yet a member? <a href="/workspace/registration/register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>






<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 's3467941', '', 'cap');

// REGISTER USER
if (isset($_POST['login_user'])) 
{
  
  // receive all input values from the form
  
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  
}

// first check the database to make sure 
// a user does not already exist with the same username and/or email
$user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) // if user exists
{ 
  if ($user['email'] === $email) 
  {
    array_push($errors, "Username already exists");
  }

  if ($user['password'] === $email) 
  {
    array_push($errors, "email already exists");
  }
}

 

  


?>


