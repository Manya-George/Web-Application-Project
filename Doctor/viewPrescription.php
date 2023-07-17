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
    $days=$row1['duration'];
    $date=$row1['datePrescribed'];
    $dSSN=$row1['doctorSSN'];

    $qry2="Select tradeName from drugs where drugID ='$drug'";
    $result2=$conn->query($qry2);  
    $row2=$result2->fetch_assoc();
    $tname=$row2['tradeName'];
    
    
if(isset($_POST['Approve'])){
    if($_SESSION['ranks']=='Senior'){
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
    $days=$_POST['duration'];
    $date=$_POST['date'];
    

    $sql="Update prescriptions Set duration='$days', Drug='$drug', Dosage='$dose' Where prescriptionID='$pid'";
    $rs=mysqli_query($conn,$sql);

if($rs){
    Header ("Location: doctorHomePage.php");
        echo"Prescription Record Updated Successfully";
}

}



?>

<!DOCTYPE html>
<html>
<head>

<title>Prescriptions</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">

</head>
    <body>
    <section>
            <div class="container">
                <nav>
                    <div class="logo">
                        <img src="..\css\logo.jpg">
                    </div>
                    <ul>
                        <li><a href="doctorHomePage.php" >Home</a></li>
                        <li><a href="pendingPrescriptions.php" >Awaiting Prescriptions</a></li>
                        <li><a href="#" class=active>Administered Prescriptions</a></li>
                        <li><a href="doctorEdit.php">Account</a></li>
                        <li><a href=""><img src="../css/avatar.jpg"></a>
                        <div class="submenu">
                    <ul>
                        <li><h1><?php echo $_SESSION['fullName'];?></h1></li>
                        <li><a href="delete.php">Disable Account</a></li>
                    <li><a href="../Common/landingPage.php">Logout</a></li>
                    </ul>
</div>
                    </li>
                    </ul>
                </nav>
            </div>
        </section>
        <div class="p5">
        <form method="post">
        <h1>Prescription Information</h1>    

  <label for="Symptoms">Symptoms:</label><br>
  <textarea id="symptoms" name="symptoms" rows="4" cols="15" disabled><?php echo $sym?></textarea><br>

  <label for="Drug">Drug:</label><br>
  <select name="drug" >
    <?php
    $drugs=mysqli_query($conn,"Select * from drugs");
    while($d=mysqli_fetch_array($drugs)){
    ?> 
    <option value ="<?php echo $drug?>" disable selected hidden><?php echo$tname?></option>
    <option value="<?php echo$d['drugID']?>"><?php echo$d['tradeName']?></option>
    <?php } ?>
    </select><br><br>

  <label for="dosage">Dosage:</label><br>
  <input type="text" id="dosage" name="dosage" value=<?php echo $dose?> required><br>

  <label for="Duration">Duration:</label><br>
  <input type="text" id="Duration" name="duration" value=<?php echo $days?> required><br>

  <label for="dateAdministered">Date Administered:</label><br>
  <input type="date" id="date" name="date" value=<?php echo $date?> required><br>

  <input type="submit" id="Update"  name="Update" value="Update">
  <input type="submit" id="Approve"  name="Approve" value="Approve">
        </form>
</div>
    </body>
</html>
    
        