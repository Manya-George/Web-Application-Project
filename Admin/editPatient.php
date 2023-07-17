<?php
session_start();
require_once("../Common/connect.php");

    $ssn=$_SESSION["SSN"];
    $qry1="Select * from patients where SSN ='$ssn'";
    $result1=$conn->query($qry1);  
    $row1=$result1->fetch_assoc();
    
    
    $fname=$row1['fullName'];
    $pno=$row1['phoneNumber'];
    $dob=$row1['dateofBirth'];
    $gender=$row1['gender'];
    $addresses=$row1['addresses'];
    $email=$row1['eMail'];
    $uname=$row1['username'];
    $pword=$row1['passwords'];
   
    

if(isset($_POST['Update'])){
    
    $fname=$_POST['fname'];
    $pno=$_POST['pNo'];
    $addresses=$_POST['address'];
    $pword=$_POST['pword'];
    $email=$_POST['email'];
    $uname=$_POST['uname'];

    $sql="Update patients Set fullName='$fname', phoneNumber='$pno',dateofBirth='$dob',addresses='$addresses',username='$uname',passwords='$pword',eMail='$email' Where SSN='$ssn'";
    $rs=mysqli_query($conn,$sql);




if($rs){
    Header ("Location: patients.php");
        echo"Patient Records Updated Successfully";
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
                        <li><a href="adminHomePage.php" >Home</a></li>
                        <li><a href="#" class=active>Patients</a></li>
                        <li><a href="doctors.php">Doctors</a></li>
                        <li><a href="pharmacists.php">Pharmacists</a></li>
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
        </section>
        
        <form method="post" class="p5">
        <h2>Patient Information Update</h2>
        <label for="fname">Full name:</label><br>
        <input type="text" id="fname" name="fname" value=<?php echo $fname; ?>><br>

        <label for="pNo">Phone Number:</label><br>
        <input type="number" id="pNo" name="pNo" minlength="10" maxlength="10" value=<?php echo $pno; ?>><br>

        <label for="dateofBirth">Date of Birth:</label><br>
        <input type="date" id="dob" name="dob" value=<?php echo $dob; ?>><br>     

        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" value=<?php echo $addresses; ?>><br>

        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value=<?php echo $email; ?>><br>

        <label for="uname">Username:</label><br>
        <input type="text" id="uname" name="uname" value=<?php echo $uname; ?>><br>

        <label for="password">Password:</label><br>
        <input type="password" id="pword" name="pword" value=<?php echo $pword; ?>><br>

        <input type="submit" id="Update"  name="Update">
        </form>
    </body>
</html>
    
        