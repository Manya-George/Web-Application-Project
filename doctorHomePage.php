<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="homepageStyleSheet.css"></head>
<body>

<p class="navbar"><?php echo $_SESSION['username'];?></p> 
<h2>DOCTOR'S HOME PAGE</h2> 

<button onclick = "window.location.href='logout.php'">Logout</button>

</body>

</html>

