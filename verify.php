<?php include('server/server.php');
    $pageTitle='D8 Findr | Login';
    function customHeader(){
        ?>
        <?php 
    }
    include_once('header.php');

   
 ?>
    
<div class="limiter">
    <div class="row">
        <div class="col-lg-12 col-md-12"></div>
        <img id="logo" src="assets/img/logo.png">
        <hr>
</div>
<div class="container-login100">
    <div class="col-3 align-self-center " syle="bg-colour:white">
        
      <?php $db = mysqli_connect('localhost', 'root', '', 'cap') or die(mysqli_error($db));
        //  mysql_select_db("verifybase") or die(mysql_error()); // Select registration database.
         session_start();
         $_SESSION["email"] = $_GET['email'];
        if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['activationHash']) && !empty($_GET['activationHash'])){
            // Verify data
            $email = mysqli_escape_string($db, $_GET['email']); // Set email variable
            $activationHash = mysqli_escape_string($db, $_GET['activationHash']); // Set activationHash variable
            
            $search = mysqli_query($db, "SELECT email, activationHash, activated FROM users WHERE email='".$email."' AND activationHash='".$activationHash."' AND activated='0'") or die(mysqli_error($db));
            $match  = mysqli_num_rows($search);
            
            if($match > 0){
                // We have a match, activate the account
               
                mysqli_query($db, "UPDATE users SET activated='1' WHERE email='".$email."' AND activationHash='".$activationHash."' AND activated='0'") or die(mysqli_error($db));
                echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
                echo ' 	<div class="col align-self-center">
	    	<a href="registration/registerNew.php" class="btn btn-primary"  >Continue Registration</a>
	</div>';
            }else{
                // No match -> invalid url or account has already been activated.
                echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
                }
        }else{
            // Invalid approach
            echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
        }
        ?>
       
	</div>

	
</div>			
    <?php
    
 include('footer.php');
?>




