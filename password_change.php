<?php 
include('server/server.php') ;
session_start();

?>
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
            <h1>Edit account password: </h1>
            <br>
            
            <!-- form controller -->
            <form method="post" action="password_change.php">
                <?php include('registration/errors.php'); ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Current password</label>
                    <input type="password" class="form-control" name="current_password" placeholder="Current Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">New Password (at least 6 characters long):</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Confirm New Password</label>
                    <input type="password" class="form-control" name="password_check" placeholder="Password">
                </div>
                <button type="submit" name ='btn_password_change' class="btn btn-default">Change</button>
            </form>
            
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
        $('.hidden').slideDown('slow').removeClass('hidden')
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
