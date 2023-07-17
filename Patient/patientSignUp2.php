<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" type="text/css" href="..\css\style.css">
  </head>
<body>
<div class="p2">

<form method="POST" action="">
<h1>Patient Sign Up</h1>
  <label for="email">E-mail:</label><br>
  <input type="text" id="email" name="email" required><br>

  <label for="username">Username:</label><br>
  <input type="text" id="uname" name="username" required><br>

  <label for="password">Password:</label><br>
  <input type="password" id="pword" name="password" required><br>

  <label for="confirmpassword">Confirm Password:</label><br>
  <input type="password" id="cpword" name="confirmPassword" required><br>

  <input type="submit" name="submit" id="submit" value="Sign Up">
  
  <a href="patientSignUp1.php">Previous</a>
</form>
</div>
</body>

</html>

<?php
session_start();
require_once("../Common/connect.php");

if(isset($_POST['submit']))
{
  $email=$_POST['email'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $cpassword=$_POST['confirmPassword'];
  
if(isset($_SESSION['info']))
{
    extract($_SESSION['info']);
    
    if($password===$cpassword){ 

    $sql = "Insert into patients (SSN,fullName,dateofBirth,Gender,addresses,phoneNumber,email,username,passwords)
    Values ('$SSN','$fname','$dob','$gender','$Address','$pNo','$email','$username','$password')";

$rs=mysqli_query($conn,$sql);
if($rs){
    session_destroy();
        header("location: patientLogin.php");
}
}else {
    header ("location: patientSignUp2.php?error=Wrong password");
    exit();
}
}
}
?>



