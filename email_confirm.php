	<?php 
//	include('server/server.php');
	session_start();
	
	require_once "vendor/autoload.php";
	require_once "vendor/phpmailer/phpmailer/src/PHPMailer.php";
	use  PHPMailer\PHPMailer\PHPMailer ;
	
	 $pageTitle='D8 Findr | Sign Up';
        function customHeader(){ ?>
				
        <?php }
        include_once('header.php');
        
	$db = mysqli_connect('localhost', 'root', '', 'cap');
	
	function sendMail($email, $activationHash){
		//The email sending bit
			$to      = $email;  //Set recipient address
			$subject = 'D8 Finder Sign Up - Please Activate Your Account';
			$message = '
			<p>
			Thanks for signing up to (Dating App Name)!<br>
			Your account has been created with the following username: '.$username.' <br>
			Once you have activated your account by clicking the link below you will be able to login with this email address.<br>
			<br>
			<br>
			<br>
			Please click this link to activate your account:<br>
			<a href="http://cap-s3467941.c9users.io/verify.php?email='.$email.'&activationHash='.$activationHash.'"> Click Here </a><br>
			<br>
			<br>
			If you did not create an account with us please disregard this email.<br>
			<br>
			Thanks,<br>
			(Dating App Name) Team<br>
			</p>'; //change link
			
			$mailer = new PHPMailer;
			$mailer->isSMTP();
			$mailer->Host = 'smtp.gmail.com';
			$mailer->Port = 587;
			$mailer->SMTPSecure = 'tls';
			$mailer->SMTPAuth = true;
			$mailer->From = "cap1d8finder@gmail.com";
			$mailer->Username = "cap1d8finder@gmail.com";
			$mailer->Password = "cap12018";
			$mailer->addAddress($to);
			$mailer->Subject = $subject;
			$mailer->msgHTML($message);
			if (!$mailer->send()) {
			  $error = "Mailer Error: " . $mailer->ErrorInfo;
			  echo '<p id="para">'.$error.'</p>';
			}
			else {
			  echo '<div class="statmesg">'.$msg.'</div>';
			}
	}
	
      ?>

    <!-- Essential styles -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css" type="text/css">
    <link id="theme_style" type="text/css" href="assets/css/style1.css" rel="stylesheet" media="screen">


     
     
 </head>

	<div class="limiter">
		<div class="row">
            <div class="col-lg-12 col-md-12"></div>
            <img id="logo" src="assets/img/logo.png">
            <hr>
        </div>
		<div class="container">
			<div class="col-md-4 col-lg-6 col-lg-offset-3 col-md-offset-4 menu-div">
				
				<?php
        			if(isset($mesg)){ // Check if $msg is not empty
        			echo '<div class="statusmsg">'.$mesg.'</div>'; // Display our message and add a div around it with the class statusmsg
          		
          		 } ?>
				   <form id='signupForm' action="" method="post" >
				   		<span class="login100-form-title p-b-51">
						Email Verification
						</span>
	              		
					   	<div class="form-group">
					   		<label for="nameInput">Name</label>
	               			<input class="form-control" name="nameInput" type="text" id="nameInput" placeholder="Enter name" value="" required>
	               		
	               		</div>
	               		<div class="form-group">
					   		<label for="emailInput">Email</label>
	               			<input class="form-control" name="emailInput"  type="text" id="emailInput" placeholder="Enter email" value="" required>
	               		</div>
	               		<div class="form-group">
					   		<label for="pwordInput">Password</label>
	               			<input class="form-control" name="pwordInput"  type="password" id="pwordInput" placeholder="Enter password" value="" required>
	               		
	               		</div>
	               		<div class="form-group">
					   		<label for="pwordConfirm">Confirm Password</label>
	               			<input class="form-control" name="pwordConfirm"  type="password" id="pwordConfirm" placeholder="Confirm password" value="" required>
	               		
	               		</div>
	               		<div class="form-group">
					   		<label for="ageInput">Date Of Birth</label>
	               			<input class="form-control" name="ageInput"  type="date" id="ageInput" placeholder="" value="" required>
	               		</div>
	              	
						<input type="submit" class="btn btn-primary"  onclick = 'myFunction()' value='Submit'></input>
						
           			</form>
			</div>
		</div>
	</div>

 <?php
 
 	// Form Submited
		$username = mysqli_real_escape_string($db, $_POST['nameInput']); //Make variable from name and email
		$email = mysqli_real_escape_string($db, $_POST['emailInput']); // While also escaping any special characters in the text
		$age = mysqli_real_escape_string($db, $_POST['ageInput']);
		//$password = password_hash(mysqli_real_escape_string($db, $_POST['pwordInput']), PASSWORD_DEFAULT);
		 $password = mysqli_real_escape_string($db, $_POST['pwordInput']);
		 $password = md5($password);

			$msg = 'Your account has been created, <br /> please click the activation link in your inbox to complete the registration process.';
			$activationHash = md5( rand(0,1000) ); //Generates a random md5 hash to be used for activation
			//$password = rand(1000,5000); //Generates a random password for the user
			mysqli_query($db, "INSERT INTO users (username, password, age, email, activationHash) VALUES(
			  '". mysqli_escape_string($db, $username) ."',
			  '". mysqli_escape_string($db, $password) ."',
			  '". mysqli_escape_string($db, $age) ."',
			  '". mysqli_escape_string($db, $email) ."',
			  '". mysqli_escape_string($db, $activationHash) ."') ");// or die(mysqli_error($db));
			//);
			sendMail($email, $activationHash);
        include_once('footer.php');
    ?>
    
<script>
function myFunction() {
    alert("Email being sent to your entered Email. Please check your email");
}
</script>
<script>
$().ready(function() {
	$.validator.addMethod("minimumAge", function(value, element, min) {
    var today = new Date();
    var dob = new Date(value);
    var currentAge = today.getFullYear() - dob.getFullYear();
 
    if (currentAge > min+1) {
        return true;
    }
 
    var m = today.getMonth() - dob.getMonth();
 
    if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
        currentAge--;
    }
 
    return currentAge >= min;
}, "You are not old enough!");
	
    $("#signupForm").validate({
         rules: {
    	  	nameInput: "required",
    	  	emailInput: {required: true,
    	  	email: true},
    	    pwordInput: "required",
    	    pwordConfirm: {
    	      equalTo: "#pwordInput"
    	    },
    	    ageInput: { 
    	    	required: true,
    	    	minimumAge: 18
	        }
        }
    
    });
});
</script>