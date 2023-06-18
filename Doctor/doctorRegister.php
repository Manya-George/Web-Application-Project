<?php
session_start();
require_once("connect.php");

if(isset($_SESSION['info']))
{
    extract($_SESSION['info']);
    
    if($password===$confirmPassword){ 
        echo("$password");
        echo($confirmPassword);
    $sql = "INSERT INTO Doctor (SSN,firstName,lastName,speciality,yearsOfExperience,phoneNumber,email,username,passwords)
    Values ('$SSN','$firstname','$lastname','$speciality','$yearsOfExperience','$phoneNumber','$email','$username','$password')";

$_SESSION['username']=$username;
$_SESSION['password']=$password;

$rs=mysqli_query($conn,$sql);
if($rs){
    
        header("location: doctorHomePage.php");
}
}else {
    header ("location: doctorSignUp2.php?error=Wrong password");
    exit();
}
}

?>