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
    

if(isset($_POST['Order'])){
    
    
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
    <head>   
         <link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>
    <body>
    <div class="container">
                <nav>
                    <div class="logo">
                        <img src="..\css\logo.jpg">
                    </div>
                    <ul>
                        <li><a href="patientHomePage.php">Home</a></li>
                        <li><a href="symptoms.php" >Symptoms</a></li>
                        <li><a href="prescribedDrugs.php">Prescribed Drugs</a></li>
                        <li><a href="edit.php">Account</a></li>
                        <li><a href=""><img src="../css/avatar.jpg"></a>
                        <div class="submenu">
                    <ul>
                        <li><h1><?php echo $_SESSION['username'];?></h1></li>
                        <li><a href="delete.php">Disable Account</a></li>
                    <li><a href="..\Common\landingPage.php">Logout</a></li>
                    </ul>
</div>
                    </li>
                    </ul>
                </nav>
            </div>
        
        <form method="post" class="p5">
        <h1>Prescription Information</h1>
  <label for="pSSN">Patient:</label><br>
  <input type="number" id="pSSN" name="pSSN" value=<?php echo $pSSN?> disabled><br>      

  <label for="Symptoms">Symptoms:</label><br>
  <textarea id="symptoms" name="symptoms" rows="4" cols="15" disabled><?php echo $sym?></textarea><br>

  <label for="Drug">Drug:</label><br>
  <input type="text" id="drug" name="drug" value=<?php echo $drug?> disabled><br>

  <label for="dosage">Dosage:</label><br>
  <input type="text" id="dosage" name="dosage" value=<?php echo $dose?> disabled><br>

  <label for="dateAdministered">Date Administered:</label><br>
  <input type="date" id="date" name="date" value=<?php echo $date?> disabled><br>

  <label for="dSSN">Doctor:</label><br>
  <input type="number" id="dSSN" name="dSSN" value=<?php echo $dSSN?> disabled><br>


  <input type="submit" id="Order"  name="Order" value="Order">
  
        </form>
    </body>
</html>
    
        