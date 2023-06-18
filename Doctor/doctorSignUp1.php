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

header("location: doctorSignUp2.php");
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Doctor Sign Up</h2>

<form method="POST" action="">

  <label for="SSN">Social Security Number:</label><br>
  <input type="number" id="SSN" name="SSN" required ><br>

  <label for="firstname">First name:</label><br>
  <input type="text" id="fname" name="firstname" required ><br>

  <label for="lastname">Last name:</label><br>
  <input type="text" id="lname" name="lastname" required ><br>

  <label for="Speciality">Speciality:</label><br>
  <input type="text" id="Speciality" name="speciality" required ><br>

  <label for="yearsOfExperience">yearsOfExperience:</label><br>
  <input type="number" id="YOE" name="yearsOfExperience" required ><br>

  <label for="phoneNumber">Phone Number:</label><br>
  <input type="text" id="pNo" name="phoneNumber" required  ><br><br>



  <input type="submit" name="next" id="next" value="next">

</form>


</body>

</html>

