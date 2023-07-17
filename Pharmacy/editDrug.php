<?php
session_start();
require_once("../Common/connect.php"); 

    $id=$_GET["edit"];
    $qry1="Select * from drugs where drugID ='$id'";
    $result1=$conn->query($qry1);  
    $row1=$result1->fetch_assoc();
    
    
    $tname=$row1['tradeName'];
    $weight=$row1['weight'];
    $price=$row1['price'];
    $stock=$row1['stock'];
    
if(isset($_POST['Update'])){
    
    $tname=$_POST['tname'];
    $weight=$_POST['weight'];
    $price=$_POST['price'];
    $stock=$_POST['stock'];
    
    $sql="Update drugs Set tradeName='$tname', weight='$weight', price='$price',stock='$stock' Where drugID='$id'";
    $rs=mysqli_query($conn,$sql);

if($rs){
    Header ("Location: pharmacyHomePage.php");
        echo"Drug Record Updated Successfully";
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
                        <li><a href="pharmacyHomePage.php" >Home</a></li>
                        <li><a href="#" class=active>Drugs</a></li>
                        <li><a href="addDrug.php">Add Drug</a></li>
                        <li><a href="viewPrescriptions.php">Prescriptions</a></li>
                        <li><a href="dispensedDrugs.php">Dispensed Drugs</a></li>
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
        <h2>Drug Update</h2>
        <div class=p5>
        <form method="post" >
            
        <label for="tname">Trade name:</label><br>
        <input type="text" id="tname" name="tname" value=<?php echo $tname; ?>><br>

        <label for="weight">Weight:</label><br>
        <input type="text" id="weight" name="weight" value=<?php echo $weight; ?>><br>

        <label for="stock">Stock:</label><br>
        <input type="number" id="stock" name="stock"  value=<?php echo $stock; ?>><br>

        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price" value=<?php echo $price; ?>><br>

        
        <input type="submit" id="Update"  name="Update">
        </form>
    </body>
</html>
    
        