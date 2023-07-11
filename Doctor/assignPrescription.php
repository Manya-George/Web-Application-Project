<?php
session_start();
require_once("../Common/connect.php");
$date=date("Y-m-d");
$pid=$_GET['prescribe'];
$sql="Select * from Prescriptions where prescriptionID= $pid";
$rs=mysqli_query($conn,$sql);
$row1=$rs->fetch_assoc();
$pSSN=$row1["patientSSN"];
$sym=$row1["Symptoms"];

$sql1="Select firstName, lastName from patients where SSN=$pSSN ";
$result=$conn->query($sql1); 
$row=$result->fetch_assoc();

$pName=$row["firstName"]." ".$row["lastName"];

if(isset($_POST["submit"])){
 
  $drug=$_POST['drug'];
  $dosage=$_POST['dosage'];
  $ID=$_SESSION['SSN'];
 
  $sql="Update Prescriptions
        Set Drug = '$drug', Dosage = '$dosage', dateAdministered = '$date', doctorSSN = '$ID'
        where prescriptionID=$pid";
  $rs=mysqli_query($conn,$sql);
}

?>

<!DOCTYPE html>
<html>
<body>

<h2>Prescription for <?php echo $pName?> </h2>

<form method="POST" action="">

  <label for="Symptoms">Symptoms:</label><br>
  <textarea id="symptoms" name="symptoms" rows="4" cols="15"><?php echo $sym?></textarea><br>

  <label for="Drug">Drug:</label><br>
  <input type="text" id="drug" name="drug" required><br>

  <label for="dosage">Dosage:</label><br>
  <input type="text" id="dosage" name="dosage" required><br>

  <label for="dateAdministered">Date Administered:</label><br>
  <input type="date" id="date" name="date" value=<?php echo $date?> required><br>

  <input type="submit" name="submit" id="submit" value="Submit">
  
</form>

</body>

</html>