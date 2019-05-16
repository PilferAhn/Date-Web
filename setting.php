<?php 
include("config/database.php");
include('server/server.php') ?>
<!DOCTYPE html>
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
    
    <!-- 
    Using Header for effect work
    Please refer header / navigation.php
    -->
    <?php require ('header/navigation.php'); ?>
    
        <div class="col-md-7 col-lg-7 pass-change-div hidden">
            
            <br>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <?php
                    $sql = sprintf("SELECT profile_image FROM users WHERE email =  '%s'" ,mysqli_real_escape_string($connection, $_SESSION['email']));

                    $result = mysqli_query($connection, $sql);


                    if (mysqli_num_rows ($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $profile_image = $row['profile_image'];
                            }
                    }
                    echo '<img src="assets/img/'.$profile_image.'" style="width:260px;height:191px">';
                    ?>
                    
                    <br>
                    <p>
                        <form method = 'post' action = 'edit_preference.php'>
                        <button class="btn btn-success"><i class="fa fa-edit"></i> Edit preference</button>
                        </form>
                        <br>
                        <form method = 'post' action = 'edit_information.php'>
                        <button class="btn btn-success"><i class="fa fa-shield"></i> Edit information</button>
                        </form>
                        <br>
                        <form method = 'post' action = 'profile_picture.php'>
                        <button class="btn btn-success"><i class="fa fa-shield"></i> Upload A Profile Image</button>
                        </form>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <br>
                    <br>
                    <!-- form controller -->

                </div>
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
