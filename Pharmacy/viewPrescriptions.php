<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Prescriptions</title>
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
                        <li><a href="drugs.php">Drugs</a></li>
                        <li><a href="addDrug.php">Add Drug</a></li>
                        <li><a href="#" class=active>Prescriptions</a></li>
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
            <th>Dispensed</th>
            <th>Action</th>
        </tr>
</thead>
<tbody>
    <tr>
</tr>

<?php
 require_once("../Common/connect.php"); 

$results_per_page = 10;  

 $sql="select * from prescriptions where drug is not null and Approved='YES' ";
 $result=$conn->query($sql);    
        

    
$number_of_result = mysqli_num_rows($result);  


$number_of_page = ceil ($number_of_result / $results_per_page);  

if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}  

$page_first_result = ($page-1) * $results_per_page;  

$query = "select * from prescriptions where drug is not null and Approved='YES' LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($conn, $query); 
    

 if($result->num_rows>0){
    while($row=$result->fetch_assoc()){

        echo "<tr>
        <td>".$row["prescriptionID"]."</td>
        <td>".$row["patientSSN"]."</td>
        <td>".$row["Symptoms"]."</td>
        <td>".$row["Drug"]."</td>
        <td>".$row["Dosage"]."</td>
        <td>".$row["datePrescribed"]."</td>
        <td>".$row["doctorSSN"]."</td>
        <td>".$row["Dispensed"]."</td>
        
        
        <td>
        <a href='\DrugDispensingProject\Pharmacy/dispense.php?dispense=".$row['prescriptionID']."' class='btn'>Dispense</a>           
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
