<!DOCTYPE>
<HTML>

<div id="mySidenav" class="sidenav">
  <a href="registration/preference.php">Preference</a>
  <a href="#">Recommendation</a>
  <a href="#">My Matches</a>
  <a href="#">Personal Information</a>
  <a href="#">Change Password</a>
  <a href="#">My Messages</a>
  <a href="#">Manage Images</a>
  <a href="#">Delete Account</a>
  <a href="#">Logout</a>
  
</div>



<br><br>
<div name="recommendation">
<?php
include("config/database.php");

session_start();

$_SESSION["username"] = "test";


$sql = sprintf("SELECT username, email FROM users WHERE username = '%s'" , mysqli_real_escape_string($connection, $_SESSION["username"]));

$result = mysqli_query($connection, $sql);


if (mysqli_num_rows ($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       // $s = '/assets/uploads/member/'.$row["profile_photo"];
       // echo '<img src="'.$s.'" alt="HTML5 Icon" style="width:128px;height:128px"><br>';
        echo  "Username: " . $row["username"]. "<br>";
        
        echo  "Email: " . $row["email"]. "<br>";
        
    }
} else {
    echo "0 results";
}

//$connection->close();
?>
</div>
</HTML>