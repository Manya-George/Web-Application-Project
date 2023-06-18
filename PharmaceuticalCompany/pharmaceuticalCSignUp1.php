<?php
session_start();

if(isset($_POST['next'])){

  foreach($_POST as $key => $value)
  {
    $_SESSION['info'][$key]=$value;
  }

$keys=array_keys($_SESSION['info']);

if(in_array('next', $keys))
{
  unset($_SESSION['info']['next']);
}

header("location:  pharmaceuticalCSignUp2.php");
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Pharmaceutical Company Sign Up</h2>

<form method="POST" action="">

  <label for="companyName">Company Name:</label><br>
  <input type="text" id="companyName" name="companyName" required ><br>

  <label for="phoneNumber">Phone Number:</label><br>
  <input type="text" id="pNo" name="phoneNumber" required  ><br><br>

  <input type="submit" name="next" id="next" value="next">

</form>


</body>

</html>

