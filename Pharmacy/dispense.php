<?php
session_start();
require_once("../Common/connect.php");
   
    $date=date("Y-m-d");
    $pid=$_GET["dispense"];
    $qry1="Select * from prescriptions where prescriptionID ='$pid'";
    $result1=$conn->query($qry1);  
    $row1=$result1->fetch_assoc();
    
    $pSSN=$row1['patientSSN'];
    $drug=$row1['Drug'];
    $dose=$row1['Dosage'];
    $pID=$_SESSION['pharmacistID'];
    
    $qry2="Select * from drugs where drugID ='$drug'";
    $result2=$conn->query($qry2);  
    $row2=$result2->fetch_assoc();
    $price=$row2['price'];
    $dname=$row2['tradeName'];

if(isset($_POST['Dispense'])){
   
    $units=$_POST['units'];
    $fprice=$units*$price;

    $sql="Insert into dispenseddrugs (patientSSN,DrugID,PharmacistID,dateDispensed,price,units)
    values('$pSSN','$drug','$pID','$date','$fprice','$units')";
    $sql1="Update prescriptions set Dispensed='YES' where prescriptionID=$pid";
    $rs=mysqli_query($conn,$sql);
    $rs1=mysqli_query($conn,$sql1);

if($rs){
    if($rs1){
    Header ("Location: pharmacyHomePage.php");
        echo"Prescription Record Updated Successfully";
}
}

}



?>

<!DOCTYPE html>
<html>
    <head>   
         <link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>
    <body>
    <section>
            <div class="container">
                <nav>
                    <div class="logo">
                        <img src="..\css\logo.jpg">
                    </div>
                    <ul>
                        <li><a href="#" class=active>Home</a></li>
                        <li><a href="drugs.php">Drugs</a></li>
                        <li><a href="addDrug.php">Add Drug</a></li>
                        <li><a href="viewPrescriptions.php">Prescriptions</a></li>
                        <li><a href="edit.php">Account</a></li>
                        <li><a href=""><img src="../css/avatar.jpg"></a>
                        <div class="submenu">
                    <ul>
                        <li><h1><?php echo $_SESSION['pharmacistName'];?></h1></li>
                        <li><a href="delete.php">Disable Account</a></li>
                    <li><a href="../Common/landingPage.php">Logout</a></li>
                    </ul>
</div>
                    </li>
                    </ul>
                </nav>
            </div>
        </section>
        <form method="post" class="p5">
        <h1>Dispense</h1>
  <label for="pSSN">Patient:</label><br>
  <input type="number" id="pSSN" name="pSSN" value=<?php echo $pSSN?> disabled><br>      

  <label for="Drug">Drug:</label><br>
  <input type="text" id="drug" name="drug" value=<?php echo $dname?> disabled><br>

  <label for="dosage">Dosage:</label><br>
  <input type="text" id="dosage" name="dosage" value=<?php echo $dose?> disabled><br>

  <label for="units">Units:</label><br>
  <input type="number" id="units" name="units" required ><br>

  <label for="price">Price per unit:</label><br>
  <input type="number" id="price" name="price" value=<?php echo $price?> disabled><br>

  <input type="submit" id="Dispense"  name="Dispense" value="Dispense">
  
        </form>
    </body>
</html>
    
        