<?php
session_start();

if(isset($_POST['submit'])){

  foreach($_POST as $key => $value)
  {
    $_SESSION['info'][$key]=$value;
  }

$keys=array_keys($_SESSION['info']);

if(in_array('submit', $keys))
{
  unset($_SESSION['info']['submit']);
}

header("location: adminRegister.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Sign Up</title>
    <link rel="stylesheet" href="signUp.css">
</head>
<body>
<section>
<div class="container">
                <div class="navbar">
                    <nav>
                        <div class="navbar-left">
                            <a href="userRegistration.html" class="bck">&#8592;Back</a>
                        </div>
                        <div class="navbar-right">
                            <a href="adminLogin.php" class="lgn">Login</a>
                        </div>
                    </nav>
                </div>
            </div>
<div>
<h2>Create Your Account</h2>
</div>

<div class="row">
<form method="POST" action="">

  <label for="ssn">SSN:</label><br>
  <input type="number" id="ssn" name="ssn" required><br>

  <label for="username">Username:</label><br>
  <input type="text" id="uname" name="username" required><br>

  <label for="password">Password:</label><br>
  <input type="password" id="pword" name="password" required><br>

  <label for="confirmpassword">Confirm Password:</label><br>
  <input type="password" id="cpword" name="confirmPassword" required><br>

  <input type="submit" name="submit" id="submit" value="Submit">
  
</form>
</div>
</section>
</body>

</html>