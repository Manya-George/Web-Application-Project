<?php
session_start();
require_once("../Common/connect.php");

    $ssn=$_SESSION["id"];
    $qry1="Select * from admins where adminID ='$ssn'";
    $result1=$conn->query($qry1);  
    $row1=$result1->fetch_assoc();
    
    $aname=$row1['adminName'];
    $email=$row1['email'];
    $uname=$row1['username'];
    $pword=$row1['passwords'];
   
    

if(isset($_POST['Update'])){
    
    $aname=$_POST['aname'];
    $pword=$_POST['pword'];
    $email=$_POST['email'];
    $uname=$_POST['uname'];

    $sql="Update admins Set adminName='$aname',username='$uname',passwords='$pword',email='$email' Where adminID='$ssn'";
    $rs=mysqli_query($conn,$sql);

if($rs){
    header("Location: adminHomePage.php");
    exit();
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
                        <li><a href="pharmacists.php" >Pharmacists</a></li>
                        <li><a href="#" class=active>Account</a></li>
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
     

        <label for="aname">Admin name:</label><br>
        <input type="text" id="aname" name="aname" value=<?php echo $aname; ?>><br>

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
    
        