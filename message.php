<?php
    include("config/database.php");
    include('server/server.php');
    
    //this if statement prevent most sql statements
    if ((strpos($_POST["message"], "=")) || (strpos($_POST["message"], "*"))) {
        
        ?>
        <a>Message can not be send due to said it containing = and * characters</a>
        <br>
        <a>click </a>
        <a href="my_messages.php";>here</a>
        <a> to go to your Matches</a>
        <?php
        
    }else{
    //sql to insert new message into the message database
    $sql = sprintf("INSERT INTO `cap`.`Messages` (`From_email`, `To_email`, `message`) VALUES ('%s', '%s', '%s');" ,mysqli_real_escape_string($connection, $_POST["email"]),mysqli_real_escape_string($connection, $_POST["partner_email"]),mysqli_real_escape_string($connection, $_POST["message"]));
    mysqli_query($connection, $sql);
    }

    header("Location: my_messages.php");
?>