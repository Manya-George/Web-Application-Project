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
/*print_r($_SESSION);
$ssn=$_SESSION['info']['SSN'];
echo $ssn;*/
header("location: patientSignUp2.php");
}
?>

<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>
<body>

<div class="p1">
<form method="POST" >
<h1>Patient Sign Up</h1>
  <label for="SSN">Social Security Number:</label><br>
  <input type="number" id="SSN" name="SSN" required><br>

  <label for="fname">Full name:</label><br>
  <input type="text" id="fname" name="fname" required><br>

  <label for="dob">Date of Birth:</label><br>
  <input type="date" id="dob" name="dob" required><br>

  <label for="Gender">Gender:</label><br>
  <select id="Gender" name="gender" required>
    <option value ="" disable selected hidden>Select Gender</option>
    <option value ="Male">Male</option>
    <option value ="Female">Female</option>
  </select><br><br>
  
  <label for="Address">Address:</label><br>
  <input type="text" id="Address" name="Address" required><br>

  <label for="pNo">Phone Number:</label><br>
  <input type="text" id="pNo" name="pNo" required><br>

  <input type="submit" name="next" id="next" value="Next">

</form>
</div>
</body>

</html>

