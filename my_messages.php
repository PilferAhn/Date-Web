<?php 
include("config/database.php");
include('server/server.php') ;
session_start();

$email = $_SESSION['email'];

$query = "SELECT r.content, r.reported_user, u.username, u.num_of_report
from report r join users u
on u.email = r.reported_user
where r.reported_user in
(SELECT u.email
FROM users u
WHERE u.num_of_report >= 1); ";

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
    
<?php 
$query = "select email, username, profile_image from users where email in
        (SELECT user2 FROM matching WHERE user1 =  '$email');";

$results = mysqli_query($db, $query);
$num_of_result = mysqli_num_rows($results);                           
       echo" <div class='col-md-7 col-lg-7 pass-change-div hidden'>";
           echo" <br>";
              echo  "<div class='item active'>";
                
                    if($num_of_result == 0)
                    {
                         
                        echo '<script language="javascript">';
                        echo 'alert("Currently You don not have matching people")';
                        echo '</script>';
                        
                        echo '<a href = "recommendition.2.php" >HIT here to find the person you want!</a>';
                        
                    }
                    else
                    {
                        while($row = mysqli_fetch_assoc($results))
                        {
                        

                            $partner_email = $row['email'];
                            $partner_username = $row['username'];
                            $profile_image = $row['profile_image'];
                                   
                            echo "<div class='row'>";
                            echo" <div class='col-lg-5 col-md-5'>";
                                
                                echo '<img src="assets/img/'.$profile_image.'" style="width:260px;height:191px">';
                                echo"<P>";
                                echo "<br>";
                                
                                echo "<form method='post' action='send_messages.php'>";
    
                                    echo "</div>";
                                    
                                    echo "<div class='col-lg-7 col-md-7'>";
            
                                        echo "<table class='table table-striped'>";
                                        echo "<input type = 'hidden' name = 'partner_email' value = '$partner_email'></input>";
                                        echo "<input type = 'hidden' name = 'partner_username' value = '$partner_username'></input>";
                                        
                                            echo "<tr>";
                                                echo  "<td>Name</td>";
                                                echo "<td> $partner_username </td>";
                                                
                                                
                                            echo "</tr>";
                                       
                                            
                                            echo"<tr>
                                                    <td><input value = 'Message' class='btn btn-success' type = 'submit'></input></td>
                                                    <td><button class='btn btn-info' name = 'btn_report'>Report</button></td>
                                                </tr>
                                            
                                                <tr>
                                                    <td><button class='btn btn-success' name = 'btn_view_info' id='addClass'>View Profile</button></td>
                                                    <td><button class='btn btn-warning' name = 'btn_disconnect' id='addClass'>Disconnect</button></td>
                                                </tr>";
                
                                        echo "</table>"; 
                                    echo "</div>";
                                echo "</form>";
                        echo "</div>";
                        }                        
                    }
                ?>
                  
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
