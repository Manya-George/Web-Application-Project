<?php
session_start();
require_once("connect.php");

if(isset($_SESSION['info']))
{
    extract($_SESSION['info']);
    
    if($password===$confirmPassword){ 
        echo($password);
        echo($confirmPassword);
    $sql = "INSERT INTO PharmaceuticalCompany (companyName,phoneNumber,email,username,passwords)
    Values ('$companyName','$phoneNumber','$email','$username','$password')";

$_SESSION['username']=$username;
$_SESSION['password']=$password;
$_SESSION['companyName']=$companyName;

$rs=mysqli_query($conn,$sql);
if($rs){
    
        header("location:  pharmaceuticalCHomePage.php");
}
}else {
    header ("location:  pharmaceuticalCSignUp2.php?error=Wrong password");
    exit();
}
}

?>