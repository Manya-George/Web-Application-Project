<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body class=patient>
        <section>
            <div class="container">
                <nav>
                    <div class="logo">
                        <img src="..\css\logo.jpg">
                    </div>
                    <ul>
                        <li><a href="#" class=active>Home</a></li>
                        <li><a href="symptoms.php">Symptoms</a></li>
                        <li><a href="pendingPrescriptions.php">Pending</a></li>
                        <li><a href="dispensedDrugs.php">Dispensed Drugs</a></li>
                        <li><a href="edit.php">Account</a></li>
                        <li><a href=""><img src="../css/avatar.jpg"></a>
                        <div class="submenu">
                    <ul>
                        <li><h1><?php echo $_SESSION['username'];?></h1></li>
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
<h1>Delivering Cutting Edge Medical Care to You </h1>
<a href="symptoms.php">Symptoms</a>
<a href="prescribedDrugs.php">Prescriptions</a>
</div>
    </body>
</html>
