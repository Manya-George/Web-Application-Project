<?php
session_start();
require_once("../Common/connect.php");

    $ssn=$_SESSION["SSN"];
    $qry1="Select * from doctor where SSN ='$ssn'";
    $result1=$conn->query($qry1);  
    $row1=$result1->fetch_assoc();
    
    
    $fname=$row1['firstName'];
    $lname=$row1['lastName'];
    $pno=$row1['phoneNumber'];
    $spc=$row1['speciality'];
    $fdate=$row1['firstDateAsDoctor'];
    $email=$row1['eMail'];
    $uname=$row1['username'];
    $pword=$row1['passwords'];
   
    

if(isset($_POST['Update'])){
    
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $pno=$_POST['pNo'];
    $addresses=$_POST['address'];
    $pword=$_POST['pword'];
    $email=$_POST['email'];
    $uname=$_POST['uname'];

    $sql="Update doctor Set firstName='$fname', lastName='$lname', phoneNumber='$pno',dateofBirth='$dob',addresses='$addresses',gender='$gender',username='$uname',passwords='$pword',eMail='$email' Where SSN='$ssn'";
    $rs=mysqli_query($conn,$sql);

if($rs){
        
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
                        <li><a href="patientHomePage.php">Home</a></li>
                        <li><a href="symptoms.php">Symptoms</a></li>
                        <li><a href="prescribedDrugs.php">Prescribed Drugs</a></li>
                        <li><a href="#" class="active">Account</a></li>
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
        <h1>Patient Information</h1>

        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname" value=<?php echo $fname; ?>><br>

        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname" value=<?php echo $lname; ?>><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value=<?php echo $email; ?>><br>

        <label for="uname">Username:</label><br>
        <input type="text" id="uname" name="uname" value=<?php echo $uname; ?>><br>

        <label for="password">Password:</label><br>
        <input type="password" id="pword" name="pword" value=<?php echo $pword; ?>><br>

        <label for="pNo">Phone Number:</label><br>
        <input type="number" id="pNo" name="pNo" minlength="10" maxlength="10" value=<?php echo $pno; ?>><br>
        
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" value=<?php echo $addresses; ?>><br>

        <input type="submit" id="Update"  name="Update">
        </form>
    </body>
</html>
    
        