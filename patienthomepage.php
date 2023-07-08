<?php
session_start();
require_once("DBConnectionCode.php");

if(isset($_POST['logout'])) {
    session_start();
    if(session_destroy()){

        header("Location: loginpage.php");
        exit();

    }
}

$sql = "SELECT * FROM patients";
$results = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="homepageStyleSheet.css"></head>
<body>
    <p class="navbar"><?php echo $_SESSION['username'];?></p> 
    <h2>PATIENTS HOME PAGE</h2>
    <p>Welcome to the patients home page</p><br>
    <p>What services may we offer you today</p><br>
    <ul>
        <li><a href='symptomdescription.php'>Describe your symptoms</li>
        <li><a href='viewprescriptions.php'>View pending descriptions</li>
        <li><a href='ordermeds.php'>Order presribed medication</li>
        <li><a href='contactprimaryphysician.php'>Contact primary physician</li>
    </ul>

    <form method="POST">
        <button type = "submit" id = "logout" name = "logout">Logout</button>
    </form>
    
</body>
</html>