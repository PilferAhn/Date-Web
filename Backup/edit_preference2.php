<?php include('server/server.php') ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>

<div data-role="page">
  <div data-role="header">
    <h1>Range Slider</h1>
  </div>

  <div data-role="main" class="ui-content">
      
    <form method="post" action="edit_preference2.php">
    	<?php include('registration/errors.php'); ?>
      <?php echo $_SESSION['email']; ?>
				      <div data-role="rangeslider">
				        <label for="price-min">Show Me</label>
				        <input type="range"  id="age_min" name = "age_min" value="0" min="18" max="100">
				        <label for="price-max">Show Me</label>
				        <input type="range"  id="age_max" name = "age_max"value="30" min="0" max="100">
			        </div>
			       
			        <div>
			          <select name="pre_gender">
			  			  <option value="male">Male</option>
			 			    <option value="female">Female</option>
			 			    </select>
			        </div>
			        
					    <div>
  	    				<select name="pre_city">
  			  			<option value="Melbourne">Melbourne</option>
  			 			  <option value="Sydney">Sydney</option>
  			 		    <option value="Perth">Perth</option>
  			  		  <option value="Brisbane">Brisbane</option>
  			  		  <option value="Brisbane">Adelaide</option>
  					    </select> 
					    </div>
					    
					    <div>
					      <input type="text" name="pre_habit" placeholder="Habit">  
					    </div>
					    
					    <div>
					      <input type="text" name="pre_education" placeholder="Education">  
					    </div>
					    
					    <div>
					      <input type="text" name="pre_occupation" placeholder="Occupation">  
					    </div>
					    
					    
					    

				
        <!--<input type="submit" data-inline="true" value="Submit" name = "btn_preference">-->
        <button type="submit" name = "btn_preference" >Submit</button>
        <p>The range slider can be useful for allowing users to select a specific price range when browsing products.</p>
        <?php 
        session_start();
        echo "Min value is ".$_SESSION["age_min"];
        echo "<br/>Max value is ".$_SESSION["age_max"];
        echo "<br/>".$_SESSION["gender"];
        echo "<br/>".$_SESSION["city"];
        echo "<br/>".$_SESSION["habit"];
        echo "<br/>".$_SESSION["education"];
        echo "<br/>".$_SESSION["occupation"];
        ?>
        
      </form>
  </div>
</div> 

</body>
</html>

