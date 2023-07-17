<?php
session_start();
require_once("../Common/connect.php");

    $ssn=$_SESSION["SSN"];
    $qry1="Select * from doctor where SSN ='$ssn'";
    $result1=$conn->query($qry1);  
    $row1=$result1->fetch_assoc();
    
    
    $fname=$row1['fullName'];
    $pno=$row1['phoneNumber'];
    $spc=$row1['speciality'];
    $fdate=$row1['firstDateAsDoctor'];
    $email=$row1['eMail'];
    $uname=$row1['username'];
    $pword=$row1['passwords'];
   
    

if(isset($_POST['Update'])){
    
    $fname=$_POST['fname'];
    $pno=$_POST['pNo'];
    $pword=$_POST['pword'];
    $email=$_POST['email'];
    $uname=$_POST['uname'];

    $sql="Update doctor Set fullName='$fname', phoneNumber='$pno',username='$uname',passwords='$pword',eMail='$email' Where SSN='$ssn'";
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
                        <li><a href="patients.php">Patients</a></li>
                        <li><a href="pendingPrescriptions.php">Awaiting Prescriptions</a></li>
                        <li><a href="administeredPrescriptions.php">Administered Prescriptions</a></li>
                        <li><a href="#" class=active>Account</a></li>
                        <li><a href="" ><img src="../css/avatar.jpg"></a>
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

        
        <form method="post" class="p5">
        <h1>Doctor Information</h1>

        <label for="fname">Full name:</label><br>
        <input type="text" id="fname" name="fname" value=<?php echo $fname; ?>><br>

        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value=<?php echo $email; ?>><br>

        <label for="uname">Username:</label><br>
        <input type="text" id="uname" name="uname" value=<?php echo $uname; ?>><br>

        <label for="password">Password:</label><br>
        <input type="password" id="pword" name="pword" value=<?php echo $pword; ?>><br>

        <label for="pNo">Phone Number:</label><br>
        <input type="number" id="pNo" name="pNo" minlength="10" maxlength="10" value=<?php echo $pno; ?>><br>

        <input type="submit" id="Update"  name="Update">
        </form>
    </body>
</html>
    
        