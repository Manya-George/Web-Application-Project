<?php

require_once("connect.php");

    $ssn=$_GET["edit"];
    $qry1="Select * from patient where SSN ='$ssn'";
    $result1=$conn->query($qry1);  
    $row1=$result1->fetch_assoc();
    
    
    $fname=$row1['firstName'];
    $lname=$row1['lastName'];
    $pno=$row1['phoneNumber'];
    $age=$row1['age'];

if(isset($_POST['Update'])){
    
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $pno=$_POST['pNo'];
    $age=$_POST['age'];


    $sql="Update patient Set firstName='$fname', lastName='$lname', phoneNumber='$pno', age='$age' Where SSN='$ssn'";
$rs=mysqli_query($conn,$sql);

if($rs){
    Header ("Location: Patienttable.php");
        echo"Patient Records Updated Successfully";
}

}



?>

<!DOCTYPE html>
<html>
    <body>
        <h2>Patient Information Update</h2>
        <form method="post">
            
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname" value=<?php echo $fname; ?>><br>

        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname" value=<?php echo $lname; ?>><br>

        <label for="pNo">Phone Number:</label><br>
        <input type="number" id="pNo" name="pNo" minlength="10" maxlength="10" value=<?php echo $pno; ?>><br>

        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age" value=<?php echo $age; ?>><br>

        <input type="submit" id="Update"  name="Update">
        </form>
    </body>
</html>
    
        