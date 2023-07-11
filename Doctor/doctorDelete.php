<?php

require_once("../Common/connect.php");

if(isset($_POST['Delete'])){
    $ssn=$_POST['SSN'];
    $fName=$_POST['fname'];
    $lName=$_POST['lname'];

    $sql="delete from doctor where SSN = '$ssn'";

    $rs=mysqli_query($conn,$sql);
    
    if($rs){
        header("Location: \DrugDispensingProject\users.php?Message=Deleted successfully");

    }

}


?>

<!DOCTYPE html>
<html>
    <body> 
        <h2>Delete Record</h2>
        <form method="POST" action="">
            <label for="SSN">Doctor SSN:</label><br>
            <input type="number" id="SSN" name="SSN" minlength="9" maxlength="9"><br>
            <label for="fname">Doctor First Name:</label><br>
            <input type="text" id="fname" name="fname"><br>
            <label for="lname">Doctor Last Name:</label><br>
            <input type="text" id="lname" name="lname"><br>
            <input type="submit" id="Delete" name="Delete"><br>
        </form>
    </body>
</html>