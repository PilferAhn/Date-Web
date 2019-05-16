<?php 
include("config/database.php");
include('server/server.php') ;
session_start();

$email = $_SESSION['email'];
$partner_email = $_POST["partner_email"];
$partner_username=$_POST["partner_username"];
    //sql statement that retrieves the messages from the user to the partner
    $sql1 = sprintf("SELECT `message` FROM `Messages` WHERE To_email='%s' AND From_email='%s'" ,mysqli_real_escape_string($connection, $partner_email), mysqli_real_escape_string($connection, $email));
    $result1 = mysqli_query($connection, $sql1);
    //sql statement that retrieves the message to the user from the partner
    $sql2 = sprintf("SELECT `message` FROM `Messages` WHERE To_email='%s' AND From_email='%s'" ,mysqli_real_escape_string($connection, $email), mysqli_real_escape_string($connection, $partner_email));
    $result2 = mysqli_query($connection, $sql2);
    
?>
<!DOCTYPE html>
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

        .popup-box {
            background-color: #ffffff;
            border: 1px solid #b0b0b0;
            bottom: 0;
            display: none;
            height: 415px;
            position: fixed;
            right: 70px;
            width: 300px;
            font-family: 'Open Sans', sans-serif;
        }

        .round.hollow {
            margin: 40px 0 0;
        }

        .round.hollow a {
            border: 2px solid #ff6701;
            border-radius: 35px;
            color: red;
            color: #ff6701;
            font-size: 23px;
            padding: 10px 21px;
            text-decoration: none;
            font-family: 'Open Sans', sans-serif;
        }

        .round.hollow a:hover {
            border: 2px solid #000;
            border-radius: 35px;
            color: red;
            color: #000;
            font-size: 23px;
            padding: 10px 21px;
            text-decoration: none;
        }

        .popup-box-on {
            display: block !important;
        }

        .popup-box .popup-head {
            background-color: #fff;
            clear: both;
            color: #7b7b7b;
            display: inline-table;
            font-size: 21px;
            padding: 7px 10px;
            width: 100%;
            font-family: Oswald;
        }

        .bg_none i {
            border: 1px solid #ff6701;
            border-radius: 25px;
            color: #ff6701;
            font-size: 17px;
            height: 33px;
            line-height: 30px;
            width: 33px;
        }

        .bg_none:hover i {
            border: 1px solid #000;
            border-radius: 25px;
            color: #000;
            font-size: 17px;
            height: 33px;
            line-height: 30px;
            width: 33px;
        }

        .bg_none {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
        }

        .popup-box .popup-head .popup-head-right {
            margin: 11px 7px 0;
        }

        .popup-box .popup-messages {
        }

        .popup-head-left img {
            border: 1px solid #7b7b7b;
            border-radius: 50%;
            width: 44px;
        }

        .popup-messages-footer > textarea {
            border-bottom: 1px solid #b2b2b2 !important;
            height: 34px !important;
            margin: 7px;
            padding: 5px !important;
            border: medium none;
            width: 95% !important;
        }

        .popup-messages-footer {
            background: #fff none repeat scroll 0 0;
            bottom: 0;
            position: absolute;
            width: 100%;
        }

        .popup-messages-footer .btn-footer {
            overflow: hidden;
            padding: 2px 5px 10px 6px;
            width: 100%;
        }

        .simple_round {
            background: #d1d1d1 none repeat scroll 0 0;
            border-radius: 50%;
            color: #4b4b4b !important;
            height: 21px;
            padding: 0 0 0 1px;
            width: 21px;
        }

        .popup-box .popup-messages {
            background: #3f9684 none repeat scroll 0 0;
            height: 275px;
            overflow: auto;
        }

        .direct-chat-messages {
            overflow: auto;
            padding: 10px;
            transform: translate(0px, 0px);

        }

        .popup-messages .chat-box-single-line {
            border-bottom: 1px solid #a4c6b5;
            height: 12px;
            margin: 7px 0 20px;
            position: relative;
            text-align: center;
        }

        .popup-messages abbr.timestamp {
            background: #3f9684 none repeat scroll 0 0;
            color: #fff;
            padding: 0 11px;
        }

        .popup-head-right .btn-group {
            display: inline-flex;
            margin: 0 8px 0 0;
            vertical-align: top !important;
        }

        .chat-header-button {
            background: transparent none repeat scroll 0 0;
            border: 1px solid #636364;
            border-radius: 50%;
            font-size: 14px;
            height: 30px;
            width: 30px;
        }

        .popup-head-right .btn-group .dropdown-menu {
            border: medium none;
            min-width: 122px;
            padding: 0;
        }

        .popup-head-right .btn-group .dropdown-menu li a {
            font-size: 12px;
            padding: 3px 10px;
            color: #303030;
        }

        .popup-messages abbr.timestamp {
            background: #3f9684 none repeat scroll 0 0;
            color: #fff;
            padding: 0 11px;
        }

        .popup-messages .chat-box-single-line {
            border-bottom: 1px solid #a4c6b5;
            height: 12px;
            margin: 7px 0 20px;
            position: relative;
            text-align: center;
        }

        .popup-messages .direct-chat-messages {
            height: auto;
        }

        .popup-messages .direct-chat-text {
            background: #dfece7 none repeat scroll 0 0;
            border: 1px solid #dfece7;
            border-radius: 2px;
            color: #1f2121;
        }

        .popup-messages .direct-chat-timestamp {
            color: #fff;
            opacity: 0.6;
        }

        .popup-messages .direct-chat-name {
            font-size: 15px;
            font-weight: 600;
            margin: 0 0 0 49px !important;
            color: #fff;
            opacity: 0.9;
        }

        .popup-messages .direct-chat-info {
            display: block;
            font-size: 12px;
            margin-bottom: 0;
        }

        .popup-messages .big-round {
            margin: -9px 0 0 !important;
        }

        .popup-messages .direct-chat-img {
            border: 1px solid #fff;
            background: #3f9684 none repeat scroll 0 0;
            border-radius: 50%;
            float: left;
            height: 40px;
            margin: -21px 0 0;
            width: 40px;
        }

        .direct-chat-reply-name {
            color: #fff;
            font-size: 15px;
            margin: 0 0 0 10px;
            opacity: 0.9;
        }

        .direct-chat-img-reply-small {
            border: 1px solid #fff;
            border-radius: 50%;
            float: left;
            height: 20px;
            margin: 0 8px;
            width: 20px;
            background: #3f9684;
        }

        .popup-messages .direct-chat-msg {
            margin-bottom: 10px;
            position: relative;
        }

        .popup-messages .doted-border::after {
            background: transparent none repeat scroll 0 0 !important;
            border-right: 2px dotted #fff !important;
            bottom: 0;
            content: "";
            left: 17px;
            margin: 0;
            position: absolute;
            top: 0;
            width: 2px;
            display: inline;
            z-index: -2;
        }

        .popup-messages .direct-chat-msg::after {
            background: #fff none repeat scroll 0 0;
            border-right: medium none;
            bottom: 0;
            content: "";
            left: 17px;
            margin: 0;
            position: absolute;
            top: 0;
            width: 2px;
            display: inline;
            z-index: -2;
        }

        .direct-chat-text::after, .direct-chat-text::before {

            border-color: transparent #dfece7 transparent transparent;

        }

        .direct-chat-text::after, .direct-chat-text::before {
            -moz-border-bottom-colors: none;
            -moz-border-left-colors: none;
            -moz-border-right-colors: none;
            -moz-border-top-colors: none;
            border-color: transparent #d2d6de transparent transparent;
            border-image: none;
            border-style: solid;
            border-width: medium;
            content: " ";
            height: 0;
            pointer-events: none;
            position: absolute;
            right: 100%;
            top: 15px;
            width: 0;
        }

        .direct-chat-text::after {
            border-width: 5px;
            margin-top: -5px;
        }

        .popup-messages .direct-chat-text {
            background: #dfece7 none repeat scroll 0 0;
            border: 1px solid #dfece7;
            border-radius: 2px;
            color: #1f2121;
        }

        .direct-chat-text {
            background: #d2d6de none repeat scroll 0 0;
            border: 1px solid #d2d6de;
            border-radius: 5px;
            color: #444;
            margin: 5px 0 0 50px;
            padding: 5px 10px;
            position: relative;
        }
        
        .receive_message{
            position: absolute;
            top: 8px;
            margin-bottom: 150px;
            margin-right: 340px;
            
        }
        .previous_message {
            position: absolute;
            top: 8px;
            margin-bottom: 150px;
            margin-left:330px;
            
        }
        .send_message{
            position: absolute;
            top: 50%;
            left: 16px;
            
        }
        .message_headers{
            color:black;
        }
        .message{
            color:grey;
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
    <div class="row">
        <div class="col-md-4 col-lg-4 menu-div">
            <h1><i class="fa fa-user"></i> My Area</h1>
            <ul class="menu-ul">
                <li><a href="my_messages.php"><i class="fa fa-sign-out"></i>&nbsp;Back to My Match</a></li>
            </ul>
        </div>
        <div class="col-md-7 col-lg-7 pass-change-div hidden">
            <div class="receive_message">
            <h3 class="message_headers">Received Message</h3>
                        <?php
                        //displays the last three messages to the user from the select partner
                        if (mysqli_num_rows ($result2) > 0) {
                            while($row = mysqli_fetch_assoc($result2)) {
                                    $from_message3 =$from_message2;
                                    $from_message2 =$from_message1;
                                    $from_message1 =$row["message"];
                            }
                            if(!is_null($from_message1)){
                                echo "<p class='message'> Message: </a>".$from_message1."<br>";
                            }
                            if(!is_null($from_message2)){
                                echo "Message: ".$from_message2."<br>";
                            }
                            if(!is_null($from_message3)){
                                echo "Message: ".$from_message3."<br>";
                            }
                        }
                        ?>
            </div>
            <br>
            <div class="previous_message">
            <h3 class="message_headers">Previous Message</h3>
                        <?php 
                        //displays the last three messages from the user to selected partner
                        if (mysqli_num_rows ($result1) > 0) {
                            while($row = mysqli_fetch_assoc($result1)) {
                                    $to_message3 =$to_message2;
                                    $to_message2 =$to_message1;
                                    $to_message1 =$row["message"];
                            }
                            if(!is_null($to_message1)){
                                echo "Message: ".$to_message1."<br>";
                            }
                            if(!is_null($to_message2)){
                                echo "Message: ".$to_message2."<br>";
                            }
                            if(!is_null($to_message3)){
                                echo "Message: ".$to_message3."<br>";
                            }
                        }
                        ?>
            </div>
            <br>
            <div class="send_message">
            <?php echo "<h3 class='message_headers'> Send Message to ".$partner_username."<h3>" ?>
            <!-- from that records the user input and posts it to message.php to be written into the database -->
            <form method='post' action="/message.php">
              <input type = 'hidden' name = 'partner_email' value = <?php echo $partner_email ?> ></input>
              <input type = 'hidden' name = 'email' value = <?php echo $email ?> ></input>
              <textarea name='message' style="width:265px; height:150px;" maxlength="55"></textarea>
              <font size="2" >*message limit of 55 characters</font>
              <br>
              <input value='Send Message' class="btn btn-success" type='submit'></input>
              <button class='btn btn-info' name = 'btn_report'>Report</button>
            </form>
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
<div class="popup-box chat-popup" id="qnimate">
    <div class="popup-head">
        <div class="popup-head-left pull-left"><img
                src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg"
                alt="iamgurdeeposahan"> xxxxxx
        </div>
        <div class="popup-head-right pull-right">
            <div class="btn-group">
                <button class="chat-header-button" data-toggle="dropdown" type="button" aria-expanded="false">
                    <i class="glyphicon glyphicon-cog"></i></button>
                <ul role="menu" class="dropdown-menu pull-right">
                    <li><a href="#">Media</a></li>
                    <li><a href="#">Block</a></li>
                    <li><a href="#">Clear Chat</a></li>
                    <li><a href="#">Email Chat</a></li>
                </ul>
            </div>

            <button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button"><i
                    class="glyphicon glyphicon-off"></i></button>
        </div>
    </div>
    <div class="popup-messages">


        <div class="direct-chat-messages">


            <div class="chat-box-single-line">
                <abbr class="timestamp">October 8th, 2015</abbr>
            </div>


            <!-- Message. Default to the left -->
            <div class="direct-chat-msg doted-border">
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">xxxxxx</span>
                </div>
                <!-- /.direct-chat-info -->
                <img alt="message user image"
                     src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg"
                     class="direct-chat-img"><!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                    Hey bro, how’s everything going ?
                </div>
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-timestamp pull-right">3.36 PM</span>
                </div>

                <!-- /.direct-chat-text -->
            </div>
            <!-- /.direct-chat-msg -->


 
        </div>
    </div>
    <div class="popup-messages-footer">
        <textarea id="status_message" placeholder="Type a message..." rows="10" cols="40" name="message"></textarea>
        <div class="btn-footer">
            <button class="bg_none"><i class="glyphicon glyphicon-film"></i></button>
            <button class="bg_none"><i class="glyphicon glyphicon-camera"></i></button>
            <button class="bg_none"><i class="glyphicon glyphicon-paperclip"></i></button>
            <button class="bg_none pull-right"><i class="glyphicon glyphicon-thumbs-up"></i></button>
        </div>
    </div>
</div>
<!-- Essentials -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!--<script src="assets/plugins/owl-carousel/owl.carousel.js"></script>-->
<!--<script src="assets/plugins/counter/jquery.countTo.js"></script>-->
<script type="text/javascript">
    $(document).ready(function () {
        $('.hidden').fadeIn('slow').removeClass('hidden')
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
