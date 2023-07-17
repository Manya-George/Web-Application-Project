<?php
session_start();
require_once("../Common/connect.php");

$sql="Select * from Drugs" ;  
$result = mysqli_query($conn, $sql); 
$options="";
while($row=$result->fetch_assoc()){
    //$options=$options."<option>$row['tradeName']</option>";
echo $row['drugID']; 
echo $row["tradeName"];}
if(isset($_POST['submit']))
{
    $tname=$_POST['drug'];
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
        <h2>Contract</h2>
        <form method="POST" >

            <select name="drug">
                <?php while($row=mysqli_fetch_array($result)):;?>
                <option value="<? echo $row['drugID'];?>"><? $row['tradeName'];?></options>
                <?php endwhile;?>
            </select><br>

<select><?php echo $options?></select>

            <label for="drug">Drug:</label><br>
            <input type="text" id="price" name="price" required><br>
            
            <label for="stock">number of Units:</label><br>
            <input type="int" id="stock" name="stock" required><br>

            <label for="amount">Amount:</label><br>
            <input type="int" id="amount" name="amount" required disabled><br>

            <input type="submit" name="submit" id="submit" value="Add">
          
          </form>
    </body>
</html>