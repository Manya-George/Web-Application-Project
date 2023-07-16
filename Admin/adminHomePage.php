<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Home Page</title>
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
<section>
    <div class="navbar">
        <div class="logo">
            <img src="webpageLogo.jpg" onclick="window.location.href='sitelandingPage.html'" height="80px" width="80px">
        </div>
        <nav>
            <ul>
                <li><a href="sitelandingPage.html">Home</a></li>
                <li><a href="viewpatients.php">Patients</a></li>
                <li><a href="viewDoctors.php">Doctors</a></li>
                <li><a href="viewDrivers.php">Delivery Drivers</a></li>
                <li><a href="viewPharmacies.php">Pharmacies</a></li>
                <li><a href="viewPharmCompanies.php">Pharm Companies</a></li>
                <li><a href="">Contact Us</a></li>
            </nav>                             
            </ul>
            <?php echo $_SESSION['username'];?>
            <button onclick = "window.location.href='logout.php'" class="btn">Logout</button>
    </div>
    <div class="row">
            <h1>WELCOME TO AFYA NJEMA'S<br>ADMIN HOME PAGE</h1> 
    </div>

</section>
</body>

</html>
