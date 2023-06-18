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

header("location: pharmacySignUp2.php");
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Pharmacy Sign Up</h2>

<form method="POST" action="">

  <label for="orgName">Organization Name:</label><br>
  <input type="text" id="orgName" name="orgName" required ><br>

  <label for="phoneNumber">Phone Number:</label><br>
  <input type="text" id="pNo" name="phoneNumber" required  ><br><br>

  <label for="address">Address:</label><br>
  <input type="text" id="address" name="address" required ><br>

  <input type="submit" name="next" id="next" value="next">

</form>


</body>

</html>

