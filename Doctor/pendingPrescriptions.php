<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pending Prescriptions</title>
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
                        <li><a href="doctorHomePage.php" >Home</a></li>
                        <li><a href="patients.php">Patients</a></li>
                        <li><a href="#" class=active>Awaiting Prescriptions</a></li>
                        <li><a href="administeredPrescriptions.php">Administered Prescriptions</a></li>
                        <li><a href="doctorEdit.php">Account</a></li>
                        <li><a href=""><img src="../css/avatar.jpg"></a>
                        <div class="submenu">
                    <ul>
                        <li><h1><?php echo $_SESSION['fullName'];?></h1></li>
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
            <th>Patient SSN</th>
            <th>Symptoms</th>
            <th>Action</th>
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
       
        echo "<tr>
        <td>".$row["prescriptionID"]."</td>
        <td>".$row["patientSSN"]."</td>
        <td>".$row["Symptoms"]."</td>
       
        
        
        <td>
            <a href='\DrugDispensingProject\Doctor\assignPrescription.php?prescribe=".$row['prescriptionID']."' class='btn'>Administer</a>
           
        </td>
        </tr>";
    }
    
}echo"</table>";



if(isset($_GET['edit'])){

    header("location:edit.php?edit=".$_GET["edit"]);
    
 } 
?>
    </table>
    
</body>
</html>
