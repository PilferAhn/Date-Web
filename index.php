    
    <?php
    
   include('server/server.php')
    ?>


<?php 
        $pageTitle='D8 Findr | Login';
       // function customHeader(){ ?>
        <?php 
        include_once('header.php');
        
    

      ?>
      

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
    <div class="row">
        <div class="col-md-4 col-lg-4 col-lg-offset-4 col-md-offset-4 menu-div">
            <h1 class="text-center">Welcome D8Finder</h1>
        
            <br>
            <?php include('registration/errors.php'); ?>
            <form role="form" method="post" action="index.php">
                <div class="form-group" data-validate = "Email is required">
                    <label for="Username">Email/Username: </label>
                    <input type="email" class="form-control" type="email" name="email" id="Username" placeholder="Email">
                </div>
                <div class="form-group" data-validate = "Password is required">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" id="Password" type="password" name="password" placeholder="password">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Remember Me
                    </label>
                </div>
                <p class="text-center">

                        <button type="submit" name="login_user" class="btn btn-primary btn-lg">Login</button>
                        
                    <br>
                    <a href="/forgotpassword.php">Forgot your password? </a>
                </p>

            </form>
            <p class="text-center">
                <span style="position: relative;
                                border-radius: 30px;
                                top: 33px;
                                background: #eee;">OR</span>
            <hr>
            </p>
            <p class="text-center">
                <a href="email_confirm.php" class="btn btn-primary btn-lg"></i>&nbsp; Sign Up</a>
            </p>
        </div>
    </div>
</div>

</div>

    <?php
        include_once('footer.php');
    ?>

    
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