<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<p style="text-align:right;"> <?php echo $_SESSION['username'];?></p> 
<h2 style="text-align:center;">Doctor </h2> 
    

    <a href="\DrugDispensingProject\logout.php">Logout</a>

</body>

</html>