<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body class=doctor>
<section>
            <div class="container">
                <nav>
                    <div class="logo">
                        <img src="..\css\logo.jpg">
                    </div>
                    <ul>
                        <li><a href="#" class=active>Home</a></li>
                        <li><a href="patients.php">Patients</a></li>
                        <li><a href="pendingPrescriptions.php">Awaiting Prescriptions</a></li>
                        <li><a href="administeredPrescriptions.php">Administered Prescriptions</a></li>
                        <li><a href="doctorEdit.php">Account</a></li>
                        <li><a href=""><img src="../css/avatar.jpg"></a>
                        <div class="submenu">
                    <ul>
                        <li><h1><?php echo $_SESSION['fullName'];?></h1></li>
                        <li><a href="delete.php">Disable Account</a></li>
                    <li><a href="../Common/landingPage.php">Logout</a></li>
                    </ul>
</div>
                    </li>
                    </ul>
                </nav>
            </div>
        </section>
        
<div class="words">
<h1>Providing Exceptional Patient Experiences</h1>
<a href="patients.php">Patients</a>
<a href="pendingPrescriptions.php">Prescriptions</a>
</div>

</body>

</html>