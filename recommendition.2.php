    
<!-- !!!!!!!!!!!!!!!!!!  DO NOT DELETE THIS PAGE!!!!!!!!!!!!!!!!!  -->

<?php include('server/server.php');?>

<?php


if(!isset($_SESSION))
{
    session_start();
}

// initializing variables
$username = "";

$email    = $_SESSION['email'];

$errors = array(); 
// connect to the database
$mysqli = NEW MySQLi('localhost', 'root', '', 'cap');

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



//This is the filter for matching users. Filter 1 = city, gender, age 100% match, Filter2 = user matched if one of fields  (interest 1, interes2, occupation) is matched.
$resultSet = $mysqli->query("SELECT DISTINCT u.email, u.username, u.city, u.gender, u.age, u.profile_image, u.interest1, u.interest2, u.occupation
FROM users u
JOIN preference p ON u.gender = p.gender
AND u.city = p.city
AND u.age
BETWEEN p.age_min
AND p.age_max
AND u.interest1 = p.interest1
OR u.interest1 = p.interest2
OR u.interest2 = p.interest1
OR u.interest2 = p.interest2
OR u.occupation = p.occupation
WHERE u.email
IN (

SELECT u.email
FROM users u
INNER JOIN preference p ON u.gender = p.gender
AND u.city = p.city
AND u.age
BETWEEN p.age_min
AND p.age_max
WHERE p.email =  '$email'
)
ORDER BY RAND( ) 
LIMIT 0 , 30
         ");
            
$numRows = $resultSet->num_rows;

$totalPages = $numRows / $rpp;

$resultSet = $mysqli->query("SELECT DISTINCT u.email, u.username, u.city, u.gender, u.age, u.profile_image, u.interest1, u.interest2, u.occupation
FROM users u
JOIN preference p ON u.gender = p.gender
AND u.city = p.city
AND u.age
BETWEEN p.age_min
AND p.age_max
AND u.interest1 = p.interest1
OR u.interest1 = p.interest2
OR u.interest2 = p.interest1
OR u.interest2 = p.interest2
OR u.occupation = p.occupation
WHERE u.email
IN (

SELECT u.email
FROM users u
INNER JOIN preference p ON u.gender = p.gender
AND u.city = p.city
AND u.age
BETWEEN p.age_min
AND p.age_max
WHERE p.email =  '$email'
)
ORDER BY RAND( ) 
LIMIT 0 , 30");
            
    
            
while($rows = $resultSet->fetch_assoc())
{
        $user_id = $rows['id'];
        $liked_email = $rows['email'];
        $user_username = $rows['username'];
        $user_city = $rows['city'];
        $user_gender = $rows['gender'];
        $user_age = $rows['age'];
        $profile_image = $rows['profile_image'];
        $user_interest1 = $rows['interest1'];
        $user_interest2 = $rows['interest2'];
        $user_occupation = $rows['occupation'];
}





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
    <style>

        @import url(https://fonts.googleapis.com/css?family=Oswald:400,300);
        @import url(https://fonts.googleapis.com/css?family=Open+Sans);

        body {
            font-family: 'Open Sans', sans-serif;
        }


    </style>
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
            <h1>Recommend users</h1>
               
            <br>
            
               <?php echo '<img src="assets/img/'.$profile_image.'" style="width:260px;height:191px">'; ?>
               <p>
                   <div class="row">
                <div class="col-lg-12 col-md-12">
                    <br>
                    <br>
                    <table class="table table-striped">
                        
                        <tr>
                            <td>Username</td>
                           <td><?php echo $user_username; ?></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td><?php echo $user_gender; ?></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td><?php echo $user_city; ?></td>
                        </tr>
                        <tr>
                            <td>age</td>
                            <td><?php echo $user_age; ?></td>
                        </tr>
                        <tr>
                            <td>First Interest</td>
                            <td><?php echo $user_interest1; ?></td>
                        </tr>
                         <tr>
                            <td>Second Interest</td>
                            <td><?php echo $user_interest2; ?></td>
                        </tr>
                         <tr>
                            <td>Occupation</td>
                            <td><?php echo $user_occupation; ?></td>
                        </tr>
                        
                    </table>
                </div>
        
            </div>
               </p>
                
                    
                    <p>
                    <form method = 'post' action = 'recommendition.2.php'>
                        <input type='hidden' name = 'liked_email' value = '<?php echo $liked_email ?>'></input>
                        
                        
                        <?php 
                            
                            if ($page >= $totalPages)
                            {
                                
                                echo '<button class="btn btn-success" name="user_like" href="#carousel-example-generic" role="button"
                                data-slide="prev">Like
                                </button><br>';
                                echo 'There are no match person anymore.';    
                                echo 'If you want to see more, please change your setting.';    
                            }
                            else
                            {
                                echo '<button class="btn btn-success" name="user_like" href="#carousel-example-generic" role="button"
                                data-slide="prev">Like
                                </button>&nbsp';
                                
                                echo '<button class="btn btn-info" href="#carousel-example-generic" role="button"
                                data-slide="prev">';
                                
                                echo "<a href='?page=".($page + 1)."'<button class='pass' name = 'btn_next' role='button'
                                data-slide='prev'>PASS
                                </button>"; 
                            }
                            ?>
                            </button>
                        
                    </form>
                    </p>
          </div>
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
        $('.pass-change-div').fadeIn('slow').removeClass('hidden')
        $('.item-count').countTo({
            formatter: function (value, options) {
                return value.toFixed(options.decimals);
            },
            onUpdate: function (value) {

            },
            onComplete: function (value) {

            }
        });

        $(function () {
            $("#addClass").click(function () {
                $('#qnimate').addClass('popup-box-on');
            });

            $("#removeClass").click(function () {
                $('#qnimate').removeClass('popup-box-on');
            });
        })
    });
</script>
</body>




</html> 
 