<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body class="pharmacy">
<section>
            <div class="container">
                <nav>
                    <div class="logo">
                        <img src="..\css\logo.jpg">
                    </div>
                    <ul>
                        <li><a href="#" class=active>Home</a></li>
                        <li><a href="drugs.php">Drugs</a></li>
                        <li><a href="addDrug.php">Add Drug</a></li>
                        <li><a href="viewPrescriptions.php">Prescriptions</a></li>
                        <li><a href="dispensedDrugs.php">Dispensed Drugs</a></li>
                        <li><a href="edit.php">Account</a></li>
                        <li><a href=""><img src="../css/avatar.jpg"></a>
                        <div class="submenu">
                    <ul>
                        <li><h1><?php echo $_SESSION['pharmacistName'];?></h1></li>
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
<h1>Delivering Medicine to Customers</h1>
<a href="addDrug.php">Add drug</a>
<a href="viewPrescriptions.php">Dispense</a>
</div>
</body>

</html>