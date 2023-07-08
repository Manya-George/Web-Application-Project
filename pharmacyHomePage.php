<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="homepageStyleSheet.css"></head>
<body>
<p class="navbar"><?php echo $_SESSION['orgName'];?></p> 
<h2>PHARMACY HOME PAGE </h2> 
    
<button onclick = "window.location.href='logout.php'">Logout</button>

</body>

</html>