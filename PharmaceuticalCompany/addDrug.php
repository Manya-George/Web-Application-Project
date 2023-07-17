<?php
session_start();
require_once("connect.php");
if(isset($_POST['submit']))
{
    $tname=$_POST['tname'];
    $price=$_POST['price'];
    $stock=$_POST['stock'];
    $ID=$_SESSION['businessID'];
  
 
 
  $sql="Insert into drugs (tradeName,companyID,price,stock)
        Values ('$tname','$ID','$price',$stock)";
    $rs=mysqli_query($conn,$sql);

    if($rs){
        header("location: pharmaceuticalCHomePage.php");
    }
    else {
    header ("location:  pharmaceuticalCSignUp.php?error=Wrong data entered");
    exit();
    }
  
}
  ?>
<!DOCTYPE html>
<html>
    <body>
        <h2>Add Drug</h2>
        <form method="POST" >

            <label for="tname">Trade Name:</label><br>
            <input type="text" id="tname" name="tname" required><br>

            <label for="price">Price per unit:</label><br>
            <input type="text" id="price" name="price" required><br>
            
            <label for="stock">Stock:</label><br>
            <input type="int" id="stock" name="stock" required><br>

            <input type="submit" name="submit" id="submit" value="Add">
          
          </form>
    </body>
</html>