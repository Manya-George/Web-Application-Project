<?php
require_once("../Common/connect.php");

if(isset($_POST['SignUp'])){
  $aID=$_POST['aID'];
  $aname=$_POST['aName'];
  $email=$_POST['email'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $cpassword=$_POST['confirmPassword'];

  if($password===$cpassword){ 

$sql = "insert into Admins (adminID,adminName,email,username,passwords)
Values ('$aID','$aname','$email','$username','$password')";

$rs=mysqli_query($conn,$sql);
if($rs){
    header("location:  adminLogin.php");
}
}else {
header ("location:  adminSignUp.php?error=Wrong password");
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
<h1>Admin SIGN UP</h1>

  <label for="adminID">Admin ID:</label><br>
  <input type="number" id="aID" name="aID" required ><br>

  <label for="aName">Admin Name:</label><br>
  <input type="text" id="aName" name="aName" required ><br>

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


