<?php

require_once("DBConnectionCode.php");

if(isset($_POST['Delete'])){
    $ssn=$_POST['SSN'];
    $fName=$_POST['fname'];
    $lName=$_POST['lname'];
}
$sql="DELETE FROM patients WHERE SSN = $ssn";

$rs=mysqli_query($conn,$sql);

if($rs){
        echo"Patient Records Deleted Successfully";
}

?>
