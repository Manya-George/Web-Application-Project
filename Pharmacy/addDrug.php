<?php
session_start();
?>
<!doctype html>
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
                        <li><a href="pharmacyHomePage.php" >Home</a></li>
                        <li><a href="drugs.php">Drugs</a></li>
                        <li><a href="#" class=active>Add Drug</a></li>
                        <li><a href="viewPrescriptions.php">Prescriptions</a></li>
                        <li><a href="dispensedDrugs.php" >Dispensed Drugs</a></li>
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
        
        <form method="POST" action="">

<div class="p5">
<h1>Add Drug</h1>
<label for="dname">Drug Name:</label><br>
  <input type="text" id="dname" name="dname" required ><br>

  <label for="weight">Weight:</label><br>
  <input type="text" id="weight" name="weight" required  ><br><br>

  <label for="price">Price per unit:</label><br>
  <input type="number" id="price" name="price" required ><br>

  <label for="stock">Stock:</label><br>
  <input type="text" id="stock" name="stock" required><br>

  <input type="submit" name="submit" id="Add" value="Add">
        </form>
</div>
    </body>
</html>
<?php
require_once("../Common/connect.php");

if(isset($_POST['submit'])){
  $dname=$_POST['dname'];
  $weight=$_POST['weight'];
  $price=$_POST['price'];
  $stock=$_POST['stock'];
 

$sql = "insert into drugs (tradeName,weight,price,stock)
Values ('$dname','$weight','$price','$stock')";

$rs=mysqli_query($conn,$sql);
if($rs){
    header("location:  pharmacyHomePage.php");
}
}

?>