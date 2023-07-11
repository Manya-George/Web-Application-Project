<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
        <section>
            <div class="container">
                <nav>
                    <div class="logo">
                        <img src="..\css\logo.jpg">
                    </div>
                    <ul>
                        <li><a href="#" class=active>Home</a></li>
                        <li><a href="symptoms.php">Symptoms</a></li>
                        <li><a href="prescribedDrugs.php">Prescribed Drugs</a></li>
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
    </body>
</html>
