<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<p style="text-align:right;"> <?php echo $_SESSION['orgName'];?></p> 
<h2 style="text-align:center;">Pharmacy </h2> 
    

    <a href="\DrugDispensingProject\logout.php">Logout</a>

</body>

</html>