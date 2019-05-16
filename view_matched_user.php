<?php 
include('server/server.php');
include("config/database.php");
session_start();



// initializing variables

$db = NEW MySQLi('localhost', 'root', '', 'cap');
$partner_email = $_SESSION['partner_email'];
            
$query = "SELECT email, username, city, gender, age, profile_image, occupation, interest1, interest2, general_info
FROM users
WHERE email = '$partner_email'";

$resultSet = mysqli_query($db, $query);

            
while($rows = $resultSet->fetch_assoc())
{
       
        $person_who_like_me = $rows['email'];
        $username = $rows['username'];
        $city = $rows['city'];
        $gender = $rows['gender'];
        $age = $rows['age'];
        $profile_image = $rows['profile_image'];
        $occupation = $rows['occupation'];
        $user_interest1 = $rows['interest1'];
        $user_interest2 = $rows['interest2'];
        $general_info = $rows['general_info'];
}

?>
﻿<!DOCTYPE html
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <title>D8Finder</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:regular,700,600&amp;latin"
          type="text/css"/>
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
    <?php require ('header/navigation.php'); ?>
    
    
    
<div class="col-md-7 col-lg-7 pass-change-div hidden">
            
            <br>

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                
                
                
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="row">
                            <div class="col-lg-5 col-md-5">

                                <?php echo '<img src="assets/img/'.$profile_image.'" style="width:260px;height:191px">'; ?>
                                <table class="table table-striped">
                                    <tr>
                                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp&nbsp
                                        <?php echo $username; ?></td>
                                        
                                    </tr>
                                </table>
                                <br>

                            </div>
                            
                            <div class="col-lg-7 col-md-7">

                                <table class="table table-striped">
                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $gender; ?></td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                      <td><?php echo $city; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Age</td>
                                      <td><?php echo $age; ?></td>
                                    </tr>
                                     <tr>
                                        <td>Occupation</td>
                                        <td><?php echo $occupation; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Interest</td>
                                        <td><?php echo $user_interest1; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Interest</td>
                                        <td><?php echo $user_interest2; ?></td>
                                    </tr>
                                    
                                </table>
                            </div>
                            
                        </div>
                        <p style = "word-wrap: break-word;" ><?php echo $general_info; ?></p>
                    </div>
                    
                   <div>

                </div>
            <hr>
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
