<?php
session_start();

if(isset($_POST['submit'])){

  foreach($_POST as $key => $value)
  {
    $_SESSION['info'][$key]=$value;
  }

$keys=array_keys($_SESSION['info']);

if(in_array('submit', $keys))
{
  unset($_SESSION['info']['submit']);
}

header("location:  pharmaceuticalCRegister.php");
}
?>

<!DOCTYPE html>
<html>
<body>

<h2> Pharmaceutical Company Sign Up</h2>

<form method="POST" action="">

  <label for="email">E-mail:</label><br>
  <input type="text" id="email" name="email" required><br>

  <label for="username">Username:</label><br>
  <input type="text" id="uname" name="username" required><br>

  <label for="password">Password:</label><br>
  <input type="text" id="pword" name="password" required><br>

  <label for="confirmpassword">Confirm Password:</label><br>
  <input type="text" id="cpword" name="confirmPassword" required><br>

  <input type="submit" name="submit" id="submit" value="Submit">
  <a href=" pharmaceuticalCSignUp1.php">Previous</a>
</form>

</body>

</html>





