<?php
session_start();
require_once("DBConnectionCode.php");

if(isset($_SESSION['info']))
{
    extract($_SESSION['info']);
    
    if($password===$confirmPassword){ 
      //  echo("$password");
      //  echo($confirmPassword);
    $sql = "INSERT INTO Admins (SSN,username,passwords)
    Values ('$ssn','$username','$password')";

$_SESSION['username']=$username;
$_SESSION['password']=$password;

$rs=mysqli_query($conn,$sql);
if($rs){
    
        header("location: adminHomePage.php");
}
}else {
    header ("location: adminSignUp.php?error=Wrong password");
    exit();
}
}

?>