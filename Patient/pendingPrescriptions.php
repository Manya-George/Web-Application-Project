<?php
session_Start();
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
        <title>Prescriptions</title>
    
</head>
<body>
<div class="container">
<section>
            <div class="container">
                <nav>
                    <div class="logo">
                        <img src="..\css\logo.jpg">
                    </div>
                    <ul>
                        <li><a href="patientHomePage.php" >Home</a></li>
                        <li><a href="symptoms.php">Symptoms</a></li>
                        <li><a href="#" class=active>Pending</a></li>
                        <li><a href="dispensedDrugs.php">Dispensed Drugs</a></li>
                        <li><a href="edit.php">Account</a></li>
                        <li><a href=""><img src="../css/avatar.jpg"></a>
                        <div class="submenu">
                    <ul>
                        <li><h1><?php echo $_SESSION['username'];?></h1></li>
                        <li><a href="delete.php">Disable Account</a></li>
                    <li><a href="../Common/landingPage.php">Logout</a></li>
                    </ul>
</div>
                    </li>
                    </ul>
                </nav>
            </div>
        </section>
            
    <table class="t">
        
        <thead>
        <tr>
            <th>Prescription ID</th>
            <th>Symptoms</th>
        </tr>
</thead>
<tbody>
    <tr>
</tr>

<?php

 require_once("../Common/connect.php"); 

$SSN=$_SESSION['SSN'];
$results_per_page = 10; 


 $sql="Select * from Prescriptions where patientSSN='$SSN' and Approved='NO'" ;
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
        <td>".$row["prescriptionID"]."</td>
        <td>".$row["Symptoms"]."</td>
        </tr>";
    }
    //for($page = 1; $page<= $number_of_page; $page++) {  
      //  echo '<a href = "test.php?page=' . $page . '">' . $page . ' </a>';  
   // } 
}echo"</table>";

?>
    </table>
    </div>
</body>
</html>