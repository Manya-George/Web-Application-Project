
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
            <th>Patient SSN</th>
            <th>Symptoms</th>
        </tr>
</thead>
<tbody>
    <tr>
</tr>

<?php
 require_once("../Common/connect.php"); 

  
$results_per_page = 10;  

 $sql="Select * from Prescriptions where drug is null ";
 $result=$conn->query($sql);    
        

    
$number_of_result = mysqli_num_rows($result);  


$number_of_page = ceil ($number_of_result / $results_per_page);  

if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}  

$page_first_result = ($page-1) * $results_per_page;  

$query = "select * from prescriptions where drug is null LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($conn, $query); 
    

 if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        /*$from = new DateTime($row["dateofBirth"]);
        $to   = new DateTime('today');
        <td>".$from->diff($to)->y."</td>*/

        echo "<tr>
        <td>".$row["prescriptionID"]."</td>
        <td>".$row["patientSSN"]."</td>
        <td>".$row["Symptoms"]."</td>
       
        
        
        <td>
            <a href='\DrugDispensingProject\Doctor\assignPrescription.php?prescribe=".$row['prescriptionID']."' class='btn'>Administer</a>
           
        </td>
        </tr>";
    }
    for($page = 1; $page<= $number_of_page; $page++) {  
        echo '<a href = "test.php?page=' . $page . '">' . $page . ' </a>';  
    }  
}echo"</table>";



if(isset($_GET['edit'])){

    header("location:edit.php?edit=".$_GET["edit"]);
    
 } 
?>
    </table>
    
</body>
</html>
