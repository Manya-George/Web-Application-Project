<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="..\css\style.css">
  </head>
<body>
<div class="p2">
<form method="POST" action="">
<h1>Doctor Sign Up</h1>
  <label for="email">E-mail:</label><br>
  <input type="text" id="email" name="email" required><br>

  <label for="username">Username:</label><br>
  <input type="text" id="uname" name="username" required><br>

  <label for="password">Password:</label><br>
  <input type="password" id="pword" name="password" required><br>

  <label for="confirmpassword">Confirm Password:</label><br>
  <input type="password" id="cpword" name="confirmPassword" required><br>

  <input type="submit" name="submit" id="submit" value="Submit">
  <a href="doctorSignUp1.php">Previous</a>
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
      $from = new DateTime($dateDoctor);
      $to   = new DateTime('today');
      $experience=$from->diff($to)->y;
      
if($experience>=7){$rank="Senior";}
else{$rank="Junior";}
      $sql = "INSERT INTO Doctor (SSN,fullName,speciality,firstDateAsDoctor,ranks,phoneNumber,email,username,passwords)
      Values ('$SSN','$fname','$speciality','$dateDoctor','$rank','$phoneNumber','$email','$username','$password')";

$rs=mysqli_query($conn,$sql);
if($rs){
    session_destroy();
        header("location: doctorLogin.php");
}
}else {
    header ("location: doctorSignUp2.php?error=Wrong password");
    exit();
}
}
}
?>






