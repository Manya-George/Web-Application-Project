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
  <head>
  <link rel="stylesheet" type="text/css" href="..\css\style.css">
  </head>
<body>
<div class="p1">
<form method="POST" action="">
<h1>Doctor Sign Up</h1>
  <label for="SSN">Social Security Number:</label><br>
  <input type="number" id="SSN" name="SSN" required ><br>

  <label for="firstname">First name:</label><br>
  <input type="text" id="fname" name="firstname" required ><br>

  <label for="lastname">Last name:</label><br>
  <input type="text" id="lname" name="lastname" required ><br>

  <label for="Speciality">Speciality:</label><br>
  <input type="text" id="Speciality" name="speciality" required ><br>

  <label for="yearsOfExperience">First Date as Doctor:</label><br>
  <input type="date" id="YOE" name="dateDoctor" required ><br>

  <label for="phoneNumber">Phone Number:</label><br>
  <input type="text" id="pNo" name="phoneNumber" required  ><br><br>



  <input type="submit" name="next" id="next" value="Next">

</form>
</div>

</body>

</html>

