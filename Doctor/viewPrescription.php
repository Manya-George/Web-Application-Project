<?php
session_start();
require_once("../Common/connect.php");

    $pid=$_GET["view"];
    $qry1="Select * from prescriptions where prescriptionID ='$pid'";
    $result1=$conn->query($qry1);  
    $row1=$result1->fetch_assoc();
    
    
    $pSSN=$row1['patientSSN'];
    $sym=$row1['Symptoms'];
    $drug=$row1['Drug'];
    $dose=$row1['Dosage'];
    $date=$row1['dateAdministered'];
    $dSSN=$row1['doctorSSN'];
    
if(isset($_POST['Approve'])){
    if($_SESSION['ranks']=='Senior'&&$dSSN!==$_SESSION['SSN']){
        $sql1="Update prescriptions Set Approved='YES' Where prescriptionID='$pid'";
        $r=mysqli_query($conn,$sql1);
        if($r){
            Header ("Location: doctorHomePage.php");
                echo"Prescription Approved";
            }
    }else header("Location:viewPrescription.php?view=$pid?error=You are unable to approve this prescription");
}
if(isset($_POST['Update'])){
    
    
    $drug=$_POST['drug'];
    $dose=$_POST['dosage'];
    $date=$_POST['date'];
    

    $sql="Update prescriptions Set Drug='$drug', Dosage='$dose' Where prescriptionID='$pid'";
    $rs=mysqli_query($conn,$sql);

if($rs){
    Header ("Location: doctorHomePage.php");
        echo"Prescription Record Updated Successfully";
}

}



?>

<!DOCTYPE html>
<html>
    <body>
        <h2>Prescription Information</h2>
        <form method="post">
         
  <label for="pSSN">Patient:</label><br>
  <input type="int" id="pSSN" name="pSSN" value=<?php echo $pSSN?> required><br>      

  <label for="Symptoms">Symptoms:</label><br>
  <textarea id="symptoms" name="symptoms" rows="4" cols="15"><?php echo $sym?></textarea><br>

  <label for="Drug">Drug:</label><br>
  <input type="text" id="drug" name="drug" value=<?php echo $drug?> required><br>

  <label for="dosage">Dosage:</label><br>
  <input type="text" id="dosage" name="dosage" value=<?php echo $dose?> required><br>

  <label for="dateAdministered">Date Administered:</label><br>
  <input type="date" id="date" name="date" value=<?php echo $date?> required><br>

  <label for="dSSN">Doctor:</label><br>
  <input type="int" id="dSSN" name="dSSN" value=<?php echo $dSSN?> required><br>


  <input type="submit" id="Update"  name="Update" value="Update">
  <input type="submit" id="Approve"  name="Approve" value="Approve">
        </form>
    </body>
</html>
    
        