
<!DOCTYPE html>
<html>
    <head>
        <title>Drugs</title>
        <style>
  table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
<a href='\DrugDispensingProject\PharmaceuticalCompany\pharmaceuticalCHomePage.php' class='btn'>Homepage</a>
</head>
<body>
    <table>
        <thead>
        <tr>
            <th>Drug ID</th>
            <th>Trade ID</th>
            <th>Price</th>
            <th>Stock</th>
        </tr>
</thead>
<tbody>
    <tr>
</tr>

<?php
session_start();
 require_once("connect.php"); 

$ID=$_SESSION['businessID'];
$results_per_page = 10; 


 $sql="Select * from Drugs where companyID='$ID'" ;
 $result=$conn->query($sql);    
        
$number_of_result = mysqli_num_rows($result);  


$number_of_page = ceil ($number_of_result / $results_per_page);  

if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}  

$page_first_result = ($page-1) * $results_per_page;  

//$query = "select * from prescriptions where patientSSN='$SSN' " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($conn, $sql); 
    

 if($result->num_rows>0){
    while($row=$result->fetch_assoc()){

        echo "<tr>
        <td>".$row["drugID"]."</td>
        <td>".$row["tradeName"]."</td>
        <td>".$row["price"]."</td>
        <td>".$row["stock"]."</td>
        <td>
            <a href='\DrugDispensingProject\PharmaceuticalCompany/viewDrug.php?view=".$row['drugID']."' class='btn'>view</a>
           
        </td>
        </tr>";
    }
    //for($page = 1; $page<= $number_of_page; $page++) {  
      //  echo '<a href = "test.php?page=' . $page . '">' . $page . ' </a>';  
   // } 
}echo"</table>";



if(isset($_GET['view'])){

    header("location:viewDrug.php?edit=".$_GET["view"]);
    
 } 
?>
    </table>
    
</body>
</html>
