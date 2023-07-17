<?php
session_start();
require_once("../Common/connect.php");

    $ssn=$_GET["edit"];
    $qry1="Select * from pharmacy where pharmacistID ='$ssn'";
    $result1=$conn->query($qry1);  
    $row1=$result1->fetch_assoc();
    
    $pname=$row1['pharmacistName'];
    $org=$row1['orgName'];
    $pno=$row1['phoneNumber'];
    $addresses=$row1['addresses'];
    $email=$row1['email'];
    $uname=$row1['username'];
    $pword=$row1['passwords'];
   
    

if(isset($_POST['Update'])){
    
    $pname=$_POST['pname'];
    $org=$_POST['oname'];
    $pno=$_POST['pNo'];
    $addresses=$_POST['address'];
    $pword=$_POST['pword'];
    $email=$_POST['email'];
    $uname=$_POST['uname'];

    $sql="Update pharmacy Set pharmacistName='$pname', orgName='$org',phoneNumber='$pno',addresses='$addresses',username='$uname',passwords='$pword',email='$email' Where pharmacistID='$ssn'";
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
                        <li><a href="adminHomePage.php" >Home</a></li>
                        <li><a href="patients.php" >Patients</a></li>
                        <li><a href="doctors.php" >Doctors</a></li>
                        <li><a href="#" class=active>Pharmacists</a></li>
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
     

        <label for="pname">Pharmacist name:</label><br>
        <input type="text" id="pname" name="pname" value=<?php echo $pname; ?>><br>

        <label for="oname">Pharmacy name:</label><br>
        <input type="text" id="oname" name="oname" value=<?php echo $org; ?>><br>


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
    
        