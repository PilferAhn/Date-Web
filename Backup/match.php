<?php 
include('server/server.php');
include("config/database.php");
session_start();


/* 
$query = "select username, age, gender, city, occupation
            from users
            where email in
            (select email
                from user_likes
                where liked_email = '$email');";
*/


#나를 좋아하는 사람은? email
#내가 좋아요를 누른 사람이 liked_user


session_start();
// initializing variables
$username = "";
$user_id = $_SESSION['user_id'];
$email    = $_SESSION['email'];

$errors = array(); 
// connect to the database
$mysqli = NEW MySQLi('localhost', 's3467941', '', 'cap');

$rpp = 1;
//pagination 
isset($_GET['page']) ? $page = $_GET['page'] : $page = 0;


$page = '';
if(isset($_GET["page"]))
{
 $page = $_GET["page"];
}
else
{
 $page = 1;
}

 
if($page > 1)
{
    $start = ($page * $rpp) - $rpp;
}
else
{
  $start = 0;  
}



$resultSet = $mysqli->query("select username, age, gender, city, occupation, profile_image
            from users
            where email in
            (select email
                from user_likes
                where liked_email = '$email')");
            
$numRows = $resultSet->num_rows;

$totalPages = $numRows / $rpp;

$resultSet = $mysqli->query("select email, username, age, gender, city, occupation, profile_image
            from users
            where email in
            (select email
                from user_likes
                where liked_email = '$email')LIMIT $start, $rpp");
            
    
            
while($rows = $resultSet->fetch_assoc())
{
       
        $person_who_like_me = $rows['email'];
        $username = $rows['username'];
        $city = $rows['city'];
        $gender = $rows['gender'];
        $age = $rows['age'];
        $profile_image = $rows['profile_image'];
        $occupation = $rows['occupation'];
       // $user_interest1 = $rows['interest1'];
    //    $user_interest2 = $rows['interest2'];
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
    <!-- 
    Using Header for effect work
    Please refer header / navigation.php
    -->
    <?php require ('header/navigation.php'); ?>
    <?php 
    
    echo 'wtwewt'.$page;
    if($totalPages == 0)
    {
        require('non_matching.php');
    }
    else
    {
        require('matching.php');
    }
    
    ?>


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
