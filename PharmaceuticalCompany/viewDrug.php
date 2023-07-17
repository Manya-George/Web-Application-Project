<?php
session_start();
require_once("connect.php");

    $pid=$_GET["view"];
    $qry1="Select * from drugs where drugID ='$pid'";
    $result1=$conn->query($qry1);  
    $row1=$result1->fetch_assoc();
    
    
    $tname=$row1['tradeName'];
    $price=$row1['price'];
    $stock=$row1['stock'];


if(isset($_POST['Update'])){

    $price=$_POST['price'];
    $stock=$_POST['stock'];
    

    $sql="Update drugs Set price='$price', stock='$stock' Where drugID='$pid'";
    $rs=mysqli_query($conn,$sql);

if($rs){
    Header ("Location: pharmaceuticalCHomePage.php");
        echo"Prescription Record Updated Successfully";
}

}



?>

<!DOCTYPE html>
<html>
    <body>
        <h2>Drug Information</h2>
        <form method="post">
         
  <label for="tname">Name:</label><br>
  <input type="text" id="tname" name="tname" value=<?php echo $tname?> disabled><br>      

  <label for="price">Price:</label><br>
  <input type="int" id="price" name="price" value=<?php echo $price?> ><br>

  <label for="stock">Stock:</label><br>
  <input type="int" id="stock" name="stock" value=<?php echo $stock?> ><br>


  <input type="submit" id="Update"  name="Update" value="Update">
  
        </form>
    </body>
</html>
    
        