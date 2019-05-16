<?php 
include("config/database.php");
include('server/server.php') ;
session_start();

$email = $_SESSION['email'];

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

        <!-- Using Header for effect work Please refer header / navigation.php-->
        <?php require ('header/navigation.php'); ?>
        
        <div class="col-md-7 col-lg-7 pass-change-div hidden">
            <h1>Report User </h1>
            <br>
            
            <p>Report <?php echo $_SESSION['partner_name']; ?></p>
            <p>Please write down the reason for reporting </p>
            <form method="POST" action = 'my_messages.php'>
            
            
                
                <textarea rows="10" cols="75" name = 'contents_report'></textarea>
                </br></br>
                <p> <?php echo $partner_email ; ?></p>
                <input type = 'hidden' name = 'email' value = '<?php echo $email;?>'/>
                <input type = 'hidden' name = 'partner_email' value = '<?php echo $_SESSION['partner_email'];?>'/>
                <button class="btn btn-success" name = 'btn_report_user' align="right" >Report User</button>
                
            
            </form>
            
            
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
<script type="text/javascript">


    $(document).ready(function () {
        $('.hidden').fadeIn('slow').removeClass('hidden')

    });
</script>


</body>
</html> 