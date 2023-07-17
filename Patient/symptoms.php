<?php
session_start();
require_once("../Common/connect.php");
if(isset($_POST['submit']))
{
  $symptoms=$_POST['symptoms'];
  $ID=$_SESSION['SSN'];
  
  //$name=$_SESSION['firstName'].' '.$_SESSION['lastName'];
 
  $sql="Insert into Prescriptions (patientSSN,Symptoms,Approved)
        Values ('$ID','$symptoms','NO')";
    $rs=mysqli_query($conn,$sql);
  
}
  ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
    <body>
    <div class="container">
                <nav>
                    <div class="logo">
                        <img src="..\css\logo.jpg">
                    </div>
                    <ul>
                        <li><a href="patientHomePage.php">Home</a></li>
                        <li><a href="#" class=active>Symptoms</a></li>
                        <li><a href="pendingPrescriptions.php">Pending</a></li>
                        <li><a href="dispensedDrugs.php">Dispensed Drugs</a></li>
                        <li><a href="edit.php">Account</a></li>
                        <li><a href=""><img src="../css/avatar.jpg"></a>
                        <div class="submenu">
                    <ul>
                        <li><h1><?php echo $_SESSION['username'];?></h1></li>
                        <li><a href="delete.php">Disable Account</a></li>
                    <li><a href="../Common/landingPage.php">Logout</a></li>
                    </ul>
</div>
                    </li>
                    </ul>
                </nav>
            </div>
            <div class="s">
        <form method="POST" >
<h1>Describe your Illness</h1>
            <label for="symptoms">Symptoms:</label><br>
            <textarea id="symptoms" name="symptoms" rows="30" cols="15" required></textarea><br>
          
            <input type="submit" name="submit" id="submit" value="submit">
          
          </form>
</div>
    </body>
</html>