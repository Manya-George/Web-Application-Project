<?php
session_start();
require_once("../Common/connect.php");
$date=date("Y-m-d");
$pid=$_GET['prescribe'];
$sql="Select * from patients where SSN= $pid";
$rs=mysqli_query($conn,$sql);
$row1=$rs->fetch_assoc();
$pname=$row1["fullName"];



if(isset($_POST["submit"])){
 $days=$_POST['days'];
  $drug=$_POST['drug'];
  $dosage=$_POST['dosage'];
  $symptoms=$_POST['symptoms'];
  $ID=$_SESSION['SSN'];
 
  $sql="Insert into Prescriptions (patientSSN,Symptoms,Drug,Dosage,duration,datePrescribed,doctorSSN,Approved)
  Values ('$pid','$symptoms','$drug','$dosage','$days','$date','$ID','NO')";
  $rs=mysqli_query($conn,$sql);
  if($rs){
    header("location:  doctorHomePage.php");
}
}

?>

<!DOCTYPE html>
<html>
  <head>
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
                        <li><a href="#" class=active>Patients</a></li>
                        <li><a href="pendingPrescriptions.php">Awaiting Prescriptions</a></li>
                        <li><a href="administeredPrescriptions.php">Administered Prescriptions</a></li>
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
<form method="POST" action="">

<label for="Patient"><?php echo $pname?>:</label><br>
  <input type="text" id="Patient" name="Patient" value="<?php echo $pid?>" required><br>

  <label for="Symptoms">Symptoms:</label><br>
  <textarea id="symptoms" name="symptoms" rows="4" cols="15" required></textarea><br>

  <label for="Drug">Drug:</label><br>
  <select name="drug" required>
    <?php
    $drugs=mysqli_query($conn,"Select * from drugs");
    while($d=mysqli_fetch_array($drugs)){
    ?> 
    <option value ="" disable selected hidden>Choose drug</option>
    <option value="<?php echo$d['drugID']?>"><?php echo$d['tradeName']?></option>
    <?php } ?>
    </select><br><br>

  <label for="dosage">Dosage:</label><br>
  <input type="text" id="dosage" name="dosage" required><br>

  <label for="days">Days:</label><br>
  <input type="text" id="days" name="days" required><br>

  <label for="datePrescribed">Date Prescribed:</label><br>
  <input type="date" id="date" name="date" value=<?php echo $date?> required><br>

  <input type="submit" name="submit" id="submit" value="Submit">
  
</form>
</div>
</body>

</html>