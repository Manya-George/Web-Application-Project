<?php
session_start();
require_once("connect.php");

if(isset($_SESSION['info']))
{
    extract($_SESSION['info']);
    
    if($password===$confirmPassword){ 
        echo($password);
        echo($confirmPassword);
    $sql = "INSERT INTO Pharmacy (orgName,phoneNumber,addresses,email,username,passwords)
    Values ('$orgName','$phoneNumber','$address','$email','$username','$password')";

$_SESSION['username']=$username;
$_SESSION['password']=$password;
$_SESSION['orgName']=$orgName;

$rs=mysqli_query($conn,$sql);
if($rs){
    
        header("location: pharmacyHomePage.php");
}
}else {
    header ("location: pharmacySignUp2.php?error=Wrong password");
    exit();
}
}

?>