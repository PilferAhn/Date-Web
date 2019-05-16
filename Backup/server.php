<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 's3467941', '', 'cap');




// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
     $username = mysqli_real_escape_string($db, $_POST['username']);
   $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
   $age = mysqli_real_escape_string($db, $_POST['age']);
   $city = mysqli_real_escape_string($db, $_POST['city']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $habit = mysqli_real_escape_string($db, $_POST['habit']);
    $education = mysqli_real_escape_string($db, $_POST['education']);
    $occupation = mysqli_real_escape_string($db, $_POST['occupation']);
   $general_info = mysqli_real_escape_string($db, $_POST['general_info']);
  
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstname)) { array_push($errors, "Username is required"); }
    if (empty($lastname)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  
  if ($age != NULL)
  {
    echo date(Y);
    if (date(Y) - $age  <= 18)
    {
      array_push($errors, "Under 18 can not register");
    }
  }
  else
  {
    array_push($errors, "Age is required");
  }
  
  
  
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, firstname, lastname, email, age, city, gender, habit, education, occupation, general_info,password) 
  	VALUES('$username','$firstname','$lastname', '$email', '$age', '$city', '$gender','$habit','$education','$occupation', '$general_info', '$password')";
  	mysqli_query($db, $query);
  //	$_SESSION['username'] = $username;
//$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

//user preferences
if (isset($_POST['user_preference'])) {
  $pre_age = mysqli_real_escape_string($db, $_POST['pre_age']);
   $pre_gender = mysqli_real_escape_string($db, $_POST['pre_gender']);
   $pre_city = mysqli_real_escape_string($db, $_POST['pre_city']);
    $pre_habit = mysqli_real_escape_string($db, $_POST['pre_habit']);
     $pre_education = mysqli_real_escape_string($db, $_POST['pre_education']);
      $pre_occupation = mysqli_real_escape_string($db, $_POST['pre_occupation']);
 
  if (empty($pre_age)) {
  	array_push($errors, "Age is required");
  }
  
   if (empty($pre_gender)) {
  	array_push($errors, "Gender is required");
  }
  
  if (empty($pre_city)) {
  	array_push($errors, "City is required");
  }
  if (empty($pre_habit)) {
  	array_push($errors, "habit is required");
  }
 
  
   if (empty($pre_education)) {
      	array_push($errors, "education is required");
   }
  
   if (empty($pre_occupation)) {
  	array_push($errors, "occupation is required");
  }
  
  if (count($errors) == 0) {
	

	$query = "INSERT INTO  preference (pre_age, pre_gender, pre_city, pre_habit, pre_education, pre_occupation) 
			  VALUES('$pre_age', '$pre_gender',  '$pre_city', '$pre_habit', '$pre_education','$pre_occupation')";
mysqli_query($db, $query);
    
     

  	header('location: index.php');
  
  
  }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email) & empty($password)) {
  	array_push($errors, "All Entity is required");
  }

  # if false
  if (count($errors) == 0) 
  {
    
    # make the password to hash here
  	$password = md5($password);
  	
  	$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	
  	if (mysqli_num_rows($results) == 1) 
  	{
  	  #$_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: /workspace/registration/index.php ');
  	}
  	else 
  	{
  		array_push($errors, "Wrong email/password combination");
  	}
  }
}

// validation email
if (isset($_POST['vali_email']))
{
  $email = mysqli_real_escape_string($db, $_POST['email']);
  
  if(empty($email))
  {
    array_push($errors, "Please Enter E-mail address");
    echo count($errors);
  }
  
  //if error is not occur
  if (count($errors) == 0)
  {
    $query = "SELECT * FROM users WHERE email ='$email'";
    echo $query;
    $results = mysqli_query($db, $query);
    
  	if (mysqli_num_rows($results) == 1) 
  	{
  	  $_SESSION['success'] = "Entered Email is exist";
  	  header('location: https://cap-s3467941.c9users.io/workspace/index.php');
  	}
  	else 
  	{
  	  $_SESSION['email'] = $email;
  		header('location: registration/register.php');
  	}
  }
}


if (isset($_POST['admin_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email) & empty($password)) {
  	array_push($errors, "All Entity is required");
  }

  # if false
  if (count($errors) == 0) 
  {
    

  	
  	$query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	
  	if (mysqli_num_rows($results) == 1) 
  	{
  	  #$_SESSION['username'] = $username;
  	  //$_SESSION['success'] = "You are now logged in";
  	  header('location: admin_dashboard.php ');
  	}
  	else 
  	{
  		array_push($errors, "Wrong email/password combination");
  	}
  }
}

?>


