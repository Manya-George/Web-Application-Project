<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
    Welcome <?php echo $_SESSION['username'];?>
    <a href="logout.php">Logout</a>
</body>

</html>