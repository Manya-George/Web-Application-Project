<?php

require_once("DBConnectionCode.php");

if(isset($_POST['Update'])){
    $ssn=$_POST['SSN'];
    $add=$_POST['address'];
    $email=$_POST['email'];
    $pno=$_POST['pNo'];
    $passw=$_POST['pword'];
}

$sql="UPDATE patients SET address='$add', email='$email', phone_number='$pno', password='$passw' WHERE SSN='$ssn'";
$rs=mysqli_query($conn,$sql);

if($rs){
        echo"Patient Records Updated Successfully";
}

?>