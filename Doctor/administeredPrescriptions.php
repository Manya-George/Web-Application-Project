
<!DOCTYPE html>
<html>
    <head>
        <title>Pending Prescriptions</title>
        <style>
  table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
<a href='\DrugDispensingProject\Doctor\doctorHomePage.php' class='btn'>Homepage</a>
</head>
<body>
    <table>
        <thead>
        <tr>
            <th>Prescription ID</th>
            <th>Patient ID</th>
            <th>Symptoms</th>
            <th>Drug</th>
            <th>Dosage</th>
            <th>Date Administered</th>
            <th>Doctor SSN</th>
            <th>Approved</th>
            
        </tr>
</thead>
<tbody>
    <tr>
</tr>

<?php
 require_once("../Common/connect.php"); 

  
$results_per_page = 10;  

 $sql="Select * from Prescriptions where drug is not null ";
 $result=$conn->query($sql);    
        

    
$number_of_result = mysqli_num_rows($result);  


$number_of_page = ceil ($number_of_result / $results_per_page);  

if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}  

$page_first_result = ($page-1) * $results_per_page;  

$query = "select * from prescriptions where drug is not null LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($conn, $query); 
    

 if($result->num_rows>0){
    while($row=$result->fetch_assoc()){

        echo "<tr>
        <td>".$row["prescriptionID"]."</td>
        <td>".$row["patientSSN"]."</td>
        <td>".$row["Symptoms"]."</td>
        <td>".$row["Drug"]."</td>
        <td>".$row["Dosage"]."</td>
        <td>".$row["dateAdministered"]."</td>
        <td>".$row["doctorSSN"]."</td>
        <td>".$row["Approved"]."</td>
        
        
        <td>
            <a href='\DrugDispensingProject\Doctor/viewPrescription.php?view=".$row['prescriptionID']."' class='btn'>view</a>
           
        </td>
        </tr>";
    }
    for($page = 1; $page<= $number_of_page; $page++) {  
        echo '<a href = "test.php?page=' . $page . '">' . $page . ' </a>';  
    } 
}echo"</table>";



if(isset($_GET['view'])){

    header("location:viewPrescription.php?edit=".$_GET["view"]);
    
 } 
?>
    </table>
    
</body>
</html>
