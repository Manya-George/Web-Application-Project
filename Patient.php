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
        Values ('$ssn','$fName','$lName','$age','$address','$phoneNo')";

$rs=mysqli_query($conn,$sql);
if($rs){
        echo"Success";
}
//print_r($_POST)
?>

