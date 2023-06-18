<?php
session_start();
require_once("connect.php");
?>

<!DOCTYPE html>
<html>
<body>

<h2>Patient Sign Up</h2>

<form method="POST" action="patientSignUp.php">

  <label for="SSN">Social Security Number:</label><br>
  <input type="number" id="SSN" name="SSN" ><br>

  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" ><br>

  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" ><br>

  <label for="Age">Age:</label><br>
  <input type="number" id="age" name="age" ><br>

  <label for="Address">Address:</label><br>
  <input type="text" id="Address" name="Address" ><br>

  <label for="pNo">Phone Number:</label><br>
  <input type="text" id="pNo" name="pNo" ><br>



  <input type="submit" name="submit" id="submit" value="Submit">

</form>

<?php

require_once("connect.php");

if(isset($_POST['submit']))
{
  $ssn=$_POST['SSN'];
  $fName=$_POST['fname'];
  $lName=$_POST['lname'];
  $age=$_POST['age'];
  $phoneNo=$_POST['pNo'];
  $address=$_POST['Address'];
  
}

$sql = "INSERT INTO patient (SSN,firstName,lastName,age,addresses,phoneNumber)
        Values ($ssn,'$fName','$lName','$age','$address','$phoneNo')";

$rs=mysqli_query($conn,$sql);
if($rs){
        echo"Success";
}

?>



</body>

</html>

