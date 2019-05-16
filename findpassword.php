<?php
include("../workspace/config/database.php");

require_once "../workspace/vendor/autoload.php";
require_once "../workspace/vendor/phpmailer/phpmailer/src/PHPMailer.php";
	use  PHPMailer\PHPMailer\PHPMailer ;

if (!(strpos($_POST["enail"], "=")) || (strpos($_POST["email"], "*"))) {

$email = $_POST['email'];

//sql statement to find username
$sql = sprintf("SELECT username FROM users WHERE email =  '%s'" ,mysqli_real_escape_string($connection, $email));
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows ($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $username =$row["username"];
}
//generates password
$password = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(16/strlen($x)) )),1,16);
//hashes password
$hash_password = md5($password);
//sql statement to change password
$sql2 = sprintf("UPDATE  `users` SET  password =  '%s' WHERE email =  '%s'",mysqli_real_escape_string($connection, $hash_password),mysqli_real_escape_string($connection, $email));
mysqli_query($connection, $sql2);
			
			
			//The email sending bit
		
			$to      = $email;  //Set recipient address
		
			$subject = 'Forgot Username or Password'; // Give the email a subject
	
			$message = '
			<p>
			Hello
			<br>
			Your account Username: '.$username.' <br>
			Your account Password: '.$password.'<br>
			Have a nice day.<br>
			</p>'; 
			
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
			  header("Location: index.php");
			}
}
else{
	echo "Sorry we cannot find your Email address in the database";
	echo "<br>";
	echo 'To Make an Account Click <a href="email_confirm.php">here</a>';
	echo "<br>";
	echo 'To try again Click <a href="forgotpassword.php">here</a>';
}
}
?>
