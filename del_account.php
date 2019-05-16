<?php include('server/server.php') ?>

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
        
        <!--Connecting to server.php -->
        <div class="col-md-7 col-lg-7 pass-change-div hidden">
            
            <form method="post" action="del_account.php">
            <h1>Delete your account</h1>
            <?php 
                session_start();
            
                
                echo "Email Address is ".$_SESSION['email'];
                $email = $_SESSION['email'];
                //echo $_SESSION['result'];
                
                /*
                $testquery = "SELECT gender FROM preference WHERE email = '$email'";
                $result = mysqli_query($db, $testquery);
                $row = mysqli_fetch_assoc($result);
                echo "</br>".$row['gender'];
                $preference_gender_check = "SELECT gender FROM preference WHERE email = '$email'";
                $gender = mysqli_query($db, $preference_gender_check);
                */
                
            ?>
            <br/>
            <input type="password" name="password">
            <button type="submit" name="user_account_delete">Delete</button>
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
