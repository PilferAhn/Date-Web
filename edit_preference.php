<?php include('server/server.php') ?>
<?php

  if(!isset($_SESSION))
  {
    session_start();
  }
 ?>
<?php

    $email = $_SESSION['email'];
    $query = "SELECT age_min, age_max, gender, city, education, occupation, interest1, interest2
                FROM preference where email = '$email'";
    
    $results = mysqli_query($db, $query);
    $array = mysqli_fetch_assoc($results);
    
    $age_min = $array['age_min'];
    $age_max = $array['age_max'];
    $gender = $array['gender'];
    $interest1 = $array['interest1'];
    $interest2 = $array['interest2'];
    $city = $array['city'];
    $education = $array['education'];
    $occupation = $array['occupation'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>D8Finder</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:regular,700,600&amp;latin" type="text/css"/>
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
    
    <!-- Using Header for effect workPlease refer header / navigation.php-->
    <!-- Calling navigation here -->
    <?php require ('header/navigation.php'); ?>
    
        <div class="col-md-7 col-lg-7 pass-change-div hidden">
            <h1>Edit your preference</h1>
            <br>
            
            <form method="POST" action = "edit_preference.php">
                <?php echo "Hi ".$_SESSION["email"]; ?>
                <div class="form-group" data-validate = "Minimum age is required">
                    <label for="min_age">Minimum Age</label>
                    <select id="age_min" name="age_min">
                        <?php
                          for ($i=18; $i<=100; $i++)
                            {
                        ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                        <?php
                            }
                        ?>
                    </select>
                <!--<input type='hidden' id="age_min" name = "age_min" value = '<?//php echo $i; ?>'>-->
                <label for="max_age">Max Age</label>
                <select id="age_max" name="age_max">
                        <?php
                          for ($i=18; $i<=100; $i++)
                            {
                        ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                        <?php
                            }
                        ?>
                    </select>
                <!--<input type="text" id="age_max" name = "age_max" value = '<?//php echo $age_max;?>'>-->
                </div>
                
            
	            <div class="form-group">
	                <label for="gender">Show me</label>
                    <select class="form-control" name="pre_gender">
			  	        <option><?php echo $gender ?></option>
			  	        <option value="male">Male</option>
			 		    <option value="female">Female</option>
	 			   </select>
			    </div>
                
			    <div>
			        <label for="location">Location</label>
  				    <select class="form-control" name="pre_city">
  				            <option><?php echo $city ?></option>
    	    	    	    <option value="Melbourne">Melbourne</option>
      	 		    	    <option value="Sydney">Sydney</option>
      	 		            <option value="Perth">Perth</option>
      	  		            <option value="Brisbane">Brisbane</option>
      	  		            <option value="Brisbane">Adelaide</option>
  			        </select> 
			    </div>
                <p></p>
                
                <!--  First Interest  -->
				<label>Please choose your first interest:</label>
			    <div class="wrap-input100 validate-input m-b-16" data-validate = "Interest 1 is required">
					<select class="form-control" name="interest1">
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
						
				<label>Please choose your second interest:</label>
			    <div class="wrap-input100 validate-input m-b-16" data-validate = "Interest 2 is required">
					
    				<select class="form-control" name="interest2">
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
            
                
                
			        	    <div>
			        <label for="occupation">Occupation</label>
  				    <select class="form-control" name="pre_occupation">
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
			    </div>
			    <p></p>
			      <div class="form-group">
                    <label for="occupation">Education(optional) </label>
                    <input type="text" class="form-control" name="pre_education" placeholder="Education" value = '<?php echo $education?>' >
                </div>
                <p></p>
                <button class="btn btn-success" type="submit" name = "user_preference" >Submit</button>
            </form>
        <?php 
        
        /*
        echo "<br/>".$_SESSION["age_min"];
        echo "<br/>".$_SESSION["age_max"];
        echo "<br/>".$_SESSION["gender"];
        echo "<br/>".$_SESSION["city"];
        echo "<br/>".$_SESSION["habit"];
        echo "<br/>".$_SESSION["education"];
        echo "<br/>".$_SESSION["occupation"];
        */
        ?>
        </div>
    </div>
</div>


<!-- Essentials -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!--<script src="assets/plugins/owl-carousel/owl.carousel.js"></script>-->
<!--<script src="assets/plugins/counter/jquery.countTo.js"></script>-->
<script type="text/javascript">


    $(document).ready(function () {
        $('.hidden').fadeIn('slow').removeClass('hidden')

    });
</script>




</body>
    <?php
        include_once('footer.php');
    ?>
</html> 
