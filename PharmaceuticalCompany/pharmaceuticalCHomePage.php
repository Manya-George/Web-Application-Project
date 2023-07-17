<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<p style="text-align:right;"> <?php echo $_SESSION['companyName'];?></p> 
<h2 style="text-align:center;">Pharmaceutical Company </h2> 
    
    <a href="\DrugDispensingProject\PharmaceuticalCompany\addDrug.php">Add Drug</a><br>
    <a href="\DrugDispensingProject\PharmaceuticalCompany\addedDrugs.php">All Drugs</a><br>
    <a href="\DrugDispensingProject\logout.php">Logout</a>

</body>

</html>