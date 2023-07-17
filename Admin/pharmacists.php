<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
        <title>Doctor Table</title>

</head>
<body>
<section>
            <div class="container">
                <nav>
                    <div class="logo">
                        <img src="..\css\logo.jpg">
                    </div>
                    <ul>
                        <li><a href="adminHomePage.php" >Home</a></li>
                        <li><a href="patients.php" >Patients</a></li>
                        <li><a href="doctors.php" >Doctors</a></li>
                        <li><a href="#" class=active>Pharmacists</a></li>
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
            <th>Pharmacist ID</th>
            <th>Pharmacist Name</th>
            <th>Pharmacy</th>
            <th>Address</th>
            <th>E mail</th>
            <th>Phone Number</th>
            <th>Actions</th>
        </tr>
</thead>
<tbody>
    <tr>
</tr>

<?php
 require_once("../Common/connect.php"); 

  
$results_per_page = 10;  

 $sql="Select * from pharmacy ";
 $result=$conn->query($sql);    
        

    
$number_of_result = mysqli_num_rows($result);  


$number_of_page = ceil ($number_of_result / $results_per_page);  

if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}  

$page_first_result = ($page-1) * $results_per_page;  

$query = "select * from pharmacy LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($conn, $query); 
    

 if($result->num_rows>0){
    while($row=$result->fetch_assoc()){

        echo "<tr>
        <td>".$row["pharmacistID"]."</td>
        <td>".$row["pharmacistName"]."</td>
        <td>".$row["orgName"]."</td>
        <td>".$row["addresses"]."</td>
        <td>".$row["email"]."</td>
        <td>".$row["phoneNumber"]."</td>
        <td>
            <a href='\DrugDispensingProject\Admin/editPharmacy.php?edit=".$row['pharmacistID']."' class='btn'>Edit</a>
            <a href='\DrugDispensingProject\Admin/test.php?delete=".$row['pharmacistID']."' class='btn'>Delete</a>
        </td>
        </tr>";
    }
    for($page = 1; $page<= $number_of_page; $page++) {  
        echo '<a href = "test.php?page=' . $page . '">' . $page . ' </a>';  
    }  
}echo"</table>";

?>
    </table>
    
</body>
</html>
