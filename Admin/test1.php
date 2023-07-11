<?php

require_once("connect.php");

    $ssn=$_GET["edit"];
    $qry1="Select * from patients where SSN ='$ssn'";
    $result1=$conn->query($qry1);  
    $row1=$result1->fetch_assoc();
    
    
    $fname=$row1['firstName'];
    $lname=$row1['lastName'];
    $pno=$row1['phoneNumber'];
    $dob=$row1['dateofBirth'];
    $gender=$row1['gender'];
    $addresses=$row1['addresses'];
    

if(isset($_POST['Update'])){
    
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $pno=$_POST['pNo'];
    $addresses=$_POST['address'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];

    $sql="Update patients Set firstName='$fname', lastName='$lname', phoneNumber='$pno',dateofBirth='$dob',addresses='$addresses',gender='$gender' Where SSN='$ssn'";
    $rs=mysqli_query($conn,$sql);

if($rs){
    Header ("Location: test.php");
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

        <label for="dateofBirth">Date of Birth:</label><br>
        <input type="date" id="dob" name="dob" value=<?php echo $dob; ?>><br>

        <label for="Gender">Gender:</label><br>
        <select id="Gender" name="gender">
            <option value=<?php echo $gender; ?>></option>
            <option value ="Male">Male</option>
            <option value ="Female">Female</option>
        </select><br>
        

        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" value=<?php echo $addresses; ?>><br>

        <input type="submit" id="Update"  name="Update">
        </form>
    </body>
</html>
    
        