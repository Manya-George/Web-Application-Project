<?php
require_once("connect.php");

if(isset($_POST['SignUp'])){
  $bID=$_POST['bID'];
  $orgName=$_POST['orgName'];
  $phoneNumber=$_POST['phoneNumber'];
  $add=$_POST['address'];
  $email=$_POST['email'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $cpassword=$_POST['confirmPassword'];

  if($password===$cpassword){ 

$sql = "insert into pharmacy (businessID,orgName,phoneNumber,addresses,email,username,passwords)
Values ('$bID','$orgName','$phoneNumber','$add','$email','$username','$password')";

$rs=mysqli_query($conn,$sql);
if($rs){
    header("location:  pharmacyLogin.php");
}
}else {
header ("location:  pharmaceuticalCSignUp.php?error=Wrong password");
exit();
}

}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>
<body>

<div class="p4">
<form method="POST" action="">
<h1>PHARMACY SIGN UP</h1>
<label for="businessID">Business ID:</label><br>
  <input type="number" id="bID" name="bID" required ><br>

<label for="orgName">Organization Name:</label><br>
  <input type="text" id="orgName" name="orgName" required ><br>

  <label for="phoneNumber">Phone Number:</label><br>
  <input type="text" id="pNo" name="phoneNumber" required  ><br><br>

  <label for="address">Address:</label><br>
  <input type="text" id="address" name="address" required ><br>

  <label for="email">E-mail:</label><br>
  <input type="text" id="email" name="email" required><br>

  <label for="username">Username:</label><br>
  <input type="text" id="uname" name="username" required><br>

  <label for="password">Password:</label><br>
  <input type="password" id="pword" name="password" required><br>

  <label for="confirmpassword">Confirm Password:</label><br>
  <input type="password" id="cpword" name="confirmPassword" required><br>

  <input type="submit" name="SignUp" id="SignUp" value="SignUp">

</form>
</div>

</body>

</html>


