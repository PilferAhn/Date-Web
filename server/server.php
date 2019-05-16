<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'cap');




// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
     
  $email = mysqli_real_escape_string($db, $_POST['email']);
  //$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  //$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  //$username = mysqli_real_escape_string($db, $_POST['username']);
  
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $interest1 = mysqli_real_escape_string($db, $_POST['interest1']);
  $interest2 = mysqli_real_escape_string($db, $_POST['interest2']);
  $education = mysqli_real_escape_string($db, $_POST['education']);
  $occupation = mysqli_real_escape_string($db, $_POST['occupation']);
  $general_info = mysqli_real_escape_string($db, $_POST['general_info']);


  /* 
  $date = $_POST["date"];
  $month = $_POST["month"];
  $year = $_POST["year"];
  
  $birthday = mktime(0,0,0,$date,$month,$year);
  $different = time() - $birthday;
  $age = floor($different / 31556926);
  
  
  if (date(y) - $age  <= 18)
  {
      array_push($errors, "Under 18 can not register");
  }
  


  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  */

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  /*
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  */

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
  {
    
    //Temp turn off the function
    //encrypt the password before saving in the database
  	//$password = md5($password_1);
    
    
    $user_table_query = "UPDATE users 
    SET gender = '$gender', city = '$city', interest1 = '$interest1', interest2 = '$interest2', education = '$education', occupation = '$occupation', general_info = '$general_info'
    WHERE email = '$email';";
    
    $preference_table_query = "INSERT INTO preference (email) VALUES ('$email')";
    

    
  	$user_table = mysqli_query($db, $user_table_query);
  	$preferance_table = mysqli_query($db, $preference_table_query);
  	
    
  	header('location: ../index.php');
  }
}

//user preferences
if (isset($_POST['user_preference'])) 
{
  
  
  $email = $_SESSION['email'];
  $age_min = mysqli_real_escape_string($db, $_POST["age_min"]);
  $age_max = mysqli_real_escape_string($db, $_POST["age_max"]);
  $pre_gender = mysqli_real_escape_string($db, $_POST['pre_gender']);
  $pre_city = mysqli_real_escape_string($db, $_POST['pre_city']);
  $interest1 = mysqli_real_escape_string($db, $_POST['interest1']);
  $interest2 = mysqli_real_escape_string($db, $_POST['interest2']);
  $pre_education = mysqli_real_escape_string($db, $_POST['pre_education']);
  $pre_occupation = mysqli_real_escape_string($db, $_POST['pre_occupation']);
 
  
  if (empty($pre_city)) {
  	array_push($errors, "City is required");
  }
  
  
  if (empty($pre_occupation)) {
  	array_push($errors, "occupation is required");
  
  }
  
  if (count($errors) == 0) 
  {
	$query = "UPDATE preference
			  SET age_min = '$age_min', age_max='$age_max', gender = '$pre_gender', city = '$pre_city', education = '$pre_education', occupation = '$pre_occupation', interest1 = '$interest1', interest2 = '$interest2'
			  WHERE email = '$email'";
        mysqli_query($db, $query);
  }
  
    $_SESSION["age_min"] = $age_min;
    $_SESSION["age_max"] = $age_max;
    $_SESSION["gender"] = $pre_gender;
    $_SESSION["city"] = $pre_city;
    $_SESSION["education"] = $pre_education;
    $_SESSION["occupation"] = $pre_occupation; 

  
}

// change personal information
if (isset($_POST['edit_information']))
{
  
  $email = $_SESSION['email'];
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $interest1 = mysqli_real_escape_string($db, $_POST['interest1']);
  $interest2 = mysqli_real_escape_string($db, $_POST['interest2']);
	$occupation = mysqli_real_escape_string($db, $_POST['occupation']);
	$info = mysqli_real_escape_string($db, $_POST['general_info']);
	
	$query = "UPDATE users
	          SET city = '$city', interest1 = '$interest1', interest2 = '$interest2', 
	              occupation = '$occupation', general_info = '$info' 
	          WHERE email = '$email'";
	mysqli_query($db, $query);
	
	

}

//Login user
$db = mysqli_connect('localhost', 'root', '', 'cap');
$errors = array(); 


if (isset($_POST['login_user'])) 
{
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  
  
  if (empty($email)) 
  {
  	array_push($errors, "Email is required");
  }
  if (empty($password)) 
  {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) 
  {
    
    // email check 
    // Case for admin
    $password = md5($password);
    $query = "select email, password FROM admin";
    $result = mysqli_query($db, $query);
    $array = mysqli_fetch_assoc($result);
    
    
    
    if ($email == $array['email'] && $password == $array['password'])
    {
      $_SESSION['email'] = $email;
      header('location: delete.php');
    }
    else
    {
      $query = "SELECT email, password FROM users WHERE email = '$email' AND password = '$password'";    
      $results = mysqli_query($db, $query);
    
      // user login check here
      if (mysqli_num_rows($results) == 1)
      {
        $_SESSION['email'] = $email;
        
        // check user_preference is already entered or not
        $preference_check_query = "SELECT age_min, age_max, gender, city, occupation, interest1, interest2
        FROM preference 
        WHERE email = '$email'";
        $results = mysqli_query($db, $preference_check_query);
        $array = mysqli_fetch_assoc($results);
        
        if(empty($array['age_min']) or empty($array['age_max']))
        {
            header('location: edit_preference.php');
        }
        elseif(empty($array['gender']) or empty($array['city']) or empty($array['occupation']))
        {
            header('location: edit_preference.php'); 
        }
        elseif(empty($array['interest1']) or empty($array['interest2']))
        {
            header('location: edit_preference.php'); 
        }
        else
        {
            header('location: recommendition.2.php');
        }
      }
      else
      {
          array_push($errors, "Wrong username/password combination"); 
      }
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
    //$_SESSION['success'] = "Entered Email is exist";
 	  $_SESSION['email'] = $email;
  	  header('location: registration/register.php');
   	}
  	else 
  	{
 	  $_SESSION['email'] = $email;
 		header('location: registration/register.php');
 	}
 }
}


// delete account from admin option
if (isset($_POST['delete_user']))
{
  
  // get email from delete.php from addmin
  // $email = mysqli_real_escape_string($db, $_POST['email']);
  $reported_email = $_POST['reported_id'];
  
  //$query = "SELECT reported_user FROM users where reported_id = '$reported_id'";
  //$result = mysql_query($db, $query);
  //$array = mysqli_fetch_assoc($result);
  
  //$reported_email = $array['reported_user'];
  
  
  $matching = "delete FROM matching where user1 = '$reported_email' or user2 = '$reported_email'";
  mysqli_query($db, $matching);
  
  $message = "delete Messages where To_email = '$reported_email' or From_email = '$reported_email'";
  mysqli_query($db, $message);
  
  $preference = "delete from preference where email = '$reported_email'";
  mysqli_query($db, $preference);
  
  $users = "delete from users where email = '$reported_email'";
  mysqli_query($db, $users);
  
  $user_likes = "delete from user_likes where email = '$reported_email' or liked_email = '$reported_email'";
  mysqli_query($db, $user_likes);
  
  $report = "delete from report where report_user = '$reported_email' or reported_user = '$reported_email'";  
  mysqli_query($db, $report);
  
  
  
}

// Client Delete account
// button clicked 
if (isset($_POST['user_account_delete']))
{
	
	// receive client email by session
	$email = $_SESSION["email"];
	echo $email;
	// received password
	$password = $_POST["password"];
	echo $password;
	
	//password searching by email && push to SQL 
	$password_query = "SELECT password FROM users WHERE email = '$email'";		
	$results = mysqli_query($db, $password_query);

	
	if(mysqli_num_rows($results) == 1) 
	{
		$del_query = "DELETE FROM users WHERE email = '$email'";
		$delete_account_query = mysqli_query($db, $del_query);
		header("location: index.php");
	}
	else
	{
		array_push($errors, "Wrong password");
	}
	
}



// setting
// change user preference
if (isset($_POST['setting']))
{
	
	$age = mysqli_real_escape_string($db, $_POST['age']);
	$gender = mysqli_real_escape_string($db, $_POST['gender']);
	$habit = mysqli_real_escape_string($db, $_POST['habit']);
	$city = mysqli_real_escape_string($db, $_POST['city']);
	$education = mysqli_real_escape_string($db, $_POST['education']);
	$occupation = mysqli_real_escape_string($db, $_POST['occupation']);
	
	if (count($errors) == 0)
	{
	  //start from here  
	}
	// receive client data from edit_preference.php
	//password searching by email && push to SQL 
	$query = "SELECT password FROM users WHERE email = '$email'";		
	$results = mysqli_query($db, $query);

	
	if(mysqli_num_rows($results) == 1) 
	{
		$del_query = "DELETE FROM users WHERE email = '$email'";
		$delete_account_query = mysqli_query($db, $del_query);
		header("location: index.php");
	}
	else
	{
		array_push($errors, "Wrong password");
	}
	
}

// password change
if(isset($_POST['btn_password_change']))
{
  $email = $_SESSION['email'];
  
  $currentPassword = mysqli_real_escape_string($db, $_POST['current_password']);
  
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $password_check = mysqli_real_escape_string($db, $_POST['password_check']);
  
  
  
  // password length check
  if(strlen($password) <= 5 and strlen($password_check) <= 5)
  {
    array_push($errors, "Password need at least 6 characters");
  }
  elseif ($password == $password_check)
  {
    // password check
    $query = "SELECT password FROM users WHERE email = '$email'";
  	$results = mysqli_query($db, $query);
  	$exist_password = mysqli_fetch_assoc($results);
  	
  	// password hasing here
  	$currentPassword = md5($currentPassword);
  	
  	// return 1 if password matching with dabase
  	if(mysqli_num_rows($results) == 1) 
  	{
      	  if ($exist_password['password'] == $currentPassword)
      	  {
      	    
      	    $password = md5($password);
      	    $password_change_query = "UPDATE users SET password = '$password' WHERE email = '$email'";
      	    $results = mysqli_query($db, $password_change_query);
      	    
            echo '<script language="javascript">';
            echo 'alert("Your password is successfully changed")';
            echo '</script>';
                	    
      	  }
      	  else
      	  {
      	    array_push($errors, "Entered password is wrong");
      	  }
  	}
  }
  else
  {
     array_push($errors, "New passwords are not match");
  }
  
}

// password change
if(isset($_POST['admin_btn_password_change']))
{
  $email = $_SESSION['email'];
  
  $currentPassword = mysqli_real_escape_string($db, $_POST['current_password']);
  
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $password_check = mysqli_real_escape_string($db, $_POST['password_check']);
  
  
  
  // password length check
  if(strlen($password) <= 5 and strlen($password_check) <= 5)
  {
    array_push($errors, "Password need at least 6 characters");
  }
  elseif ($password == $password_check)
  {
    // password check
    $query = "SELECT password FROM admin WHERE email = '$email'";
  	$results = mysqli_query($db, $query);
  	$exist_password = mysqli_fetch_assoc($results);
  	
  	// password hasing here
  	$currentPassword = md5($currentPassword);
  	
  	// return 1 if password matching with dabase
  	if(mysqli_num_rows($results) == 1) 
  	{
      	  if ($exist_password['password'] == $currentPassword)
      	  {
      	    
      	    $password = md5($password);
      	    $password_change_query = "UPDATE admin SET password = '$password' WHERE email = '$email'";
      	    $results = mysqli_query($db, $password_change_query);
      	    
            echo '<script language="javascript">';
            echo 'alert("Your password is successfully changed")';
            echo '</script>';
                	    
      	  }
      	  else
      	  {
      	    array_push($errors, "Entered password is wrong");
      	  }
  	}
  }
  else
  {
     array_push($errors, "New passwords are not match");
  }
  
}

// match
if(isset($_POST['match_next']))
{
  $email = $_SESSION['email'];
  
  // at the moment city and gender only
  $query = "SELECT u.username, u.city, u.gender
            FROM users u join preference p
            ON u.city = p.city and u.gender = p.gender
            where p.email = '$email'";
            
  $results = mysqli_query($db, $query);
  $array = mysqli_fetch_assoc($results);
  
  for($i = 0; $i<count($array); $i++)
  {
    //$_SESSION['username'] 
    $user_username= $array['username'];
    //$_SESSION['city'] 
    $user_city= $array['city'];
    //$_SESSION['gender'] 
    $user_gender = $array['gender'];    
  }
  
}


//USER LIKE
if (isset($_POST['user_like'])){

$email = $_SESSION['email'];
$liked_email = $_POST['liked_email'];

  // user_like ->> table 
  // user_id 가 내 아이디
  // liked_user_id 내가 좋아하는 사람. 
	$query = "INSERT INTO user_likes (email, liked_email) VALUES ('$email', '$liked_email')";
  mysqli_query($db, $query);
  
}

if (isset($_POST['btn_refuse'])){
  
  #$query = "Delete from user_likes where email = '$email' and liked_email = $liked_email"
}


// Matched both user going into match table 
// able to start to talk
if(isset($_POST['btn_accept']) or isset($_POST['btn_refuse'])){
  
  
  //my email
  $email = $_SESSION['email'];
  
  //The person who likes me
  $person_who_like_me = $_POST['person_who_like_me'];
  
  if(isset($_POST['btn_accept']))
  {
    
    // insert to match table
    // user1 is my email
    // user2 is other side person email
    $query = "INSERT INTO matching (user1, user2) VALUES ('$email', '$person_who_like_me')";
    $results = mysqli_query($db, $query);
  
      
    //이메일이 날 좋아하는사람.
    $delete_query = "DELETE from user_likes where email = '$person_who_like_me' and liked_email = '$email'";
    mysqli_query($db, $delete_query);
    header("location: send_messages.php");
      
    
  }
  elseif(isset($_POST['btn_refuse']))
  {
    $delete_query = "DELETE from user_likes where email = '$person_who_like_me' and liked_email = '$email'";
    mysqli_query($db, $delete_query);
  }
  
}

if (isset($_POST['btn_report'])){
  
  $_SESSION['partner_email'] = $_POST['partner_email'];
  $partner_email = $_POST['partner_email'];
  
  $query = "select username from users where email = '$partner_email'; ";
  $results = mysqli_query($db, $query);
  
  $array = mysqli_fetch_assoc($results);
  
  
  $_SESSION['partner_name'] = $array['username'];
  
  header("location: report.php");
  
}

if (isset($_POST['btn_report_user'])){
  
  
  $email = $_POST['email'];
  $partner_email = $_POST['partner_email'];
  $report_content = $_POST['contents_report'];
  
  // increase the report number
  
  $query = "select num_of_report from users where email = '$partner_email'";
  
  $results = mysqli_query($db, $query);
  
  $array = mysqli_fetch_assoc($results);
  
  $num_of_report = $array['num_of_report'] + 1;

  $query = "UPDATE users SET num_of_report = '$num_of_report' where email = '$partner_email';";

  $results = mysqli_query($db, $query);
  
  // storing the report content to report table
  
  //$query = "INSERT INTO matching (user1, user2) VALUES ('$email', '$person_who_like_me')";
  
  $report_query = "INSERT INTO report (report_user, reported_user, content) VALUES ('$email', '$partner_email', '$report_content')";
  mysqli_query($db, $report_query);
  
  $delete_query = "DELETE FROM matching where user1 = '$email' and user2 = '$partner_email'";
  mysqli_query($db, $delete_query);
  
  echo '<script language="javascript">';
  echo 'alert("Your report has been received successfully. We apologize for any inconvenience.")';
  echo '</script>';
  
  
}


if (isset($_POST['btn_disconnect'])){
  
  
  $email = $_SESSION['email'];
  $partner_email = $_POST['partner_email'];
  
  
  $query = "DELETE from matching where user1 = '$email' and user2 = '$partner_email';";
  $results = mysqli_query($db, $query);
  header("location: my_messages.php");


}


if (isset($_POST['btn_view_info']))
{
  
  $partner_email = $_POST['partner_email'];
  $_SESSION['partner_email'] = $partner_email;
  
  header("location: view_matched_user.php");
}




?>