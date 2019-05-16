<?php 

include('server/server.php') ;
session_start();

$db = mysqli_connect('localhost', 's3467941', '', 'cap');

$email = $_SESSION['email'];


$query = "SELECT r.reported_id, r.content, r.reported_user, u.username, u.num_of_report, u.profile_image
from report r join users u
on u.email = r.reported_user
where r.reported_user in
(SELECT u.email
FROM users u
WHERE u.num_of_report >= 1); ";

$results = mysqli_query($db, $query);

$reported_number = mysqli_num_rows($results);    



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <title>D8Finder</title>
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
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:regular,700,600&amp;latin"
          type="text/css"/>
    <!-- Essential styles -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css" type="text/css">

    <link id="theme_style" type="text/css" href="assets/css/style2.css" rel="stylesheet" media="screen">


    <!-- JS Library -->
    <script src="assets/js/jquery.js"></script>

</head>
<body>
	<div class="container">
    <div class="row">
    	<h1></h1>
        <div class="col-lg-12 col-md-12"></div>
        <img id="logo" src="assets/img/logo.png">
        <hr>
    </div>
    
    <div class="row">
        <div class="col-md-4 col-lg-4 menu-div">
            <h1><i class="fa fa-user"></i> Admin Dashboard</h1>
            <hr>
            <ul class="menu-ul">
                <li><a href="view_history.php"><i class="fa fa-search-plus"></i>&nbsp;View History</a></li>
                <li><a href="delete.php"><i class="fa fa-check-circle"></i>&nbsp;Change password</a></li>
                 <li ><a href="logout.php"><i class="fa fa-sign-out"></i>&nbsp;Logout</a></li>

            </ul>
        </div>
        <div class="col-md-7 col-lg-7 pass-change-div hidden">
            
			
				  	<?php include('registration/errors.php'); ?>
					<span class="login100-form-title p-b-51">
						Reported History 
					</span>
					
					<?php 
					
					
                    while($array = mysqli_fetch_assoc($results))
                    {
                        $profile_image = $array['profile_image'];
                        $reported_id = $array['reported_id'];
                        $reported_email = $array['reported_user'];
                        $reported_user = $array['username'];
                        $content = $array['content'];
                        $num_of_report = $array['num_of_report'];
                        
                        // in Sub folder
                        include('../sub/view_history.php');
                        
                        echo '<br>';
                    }
					
					?>
					
					
					
					

                    
					

			
				
        </div>
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
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>


<!-- Essentials -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!--<script src="assets/plugins/owl-carousel/owl.carousel.js"></script>-->
<script src="assets/plugins/counter/jquery.countTo.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.hidden').fadeIn('slow').removeClass('hidden')
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
</script>
</body>
</html> 
