<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
        <title>Drugs Table</title>
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
                        <li><a href="#" class=active>Drugs</a></li>
                        <li><a href="addDrug.php">Add Drug</a></li>
                        <li><a href="viewPrescriptions.php">Prescriptions</a></li>
                        <li><a href="dispensedDrugs.php">Dispensed Drugs</a></li>
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
    <table class="t">
        <thead>
        <tr>
            <th>Drug ID</th>
            <th>Trade Name</th>
            <th>Weight</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
</thead>
<tbody>
    <tr>
</tr>

<?php
 require_once("../Common/connect.php"); 

  
$results_per_page = 10;  

 $sql="Select * from drugs ";
 $result=$conn->query($sql);    
        

    
$number_of_result = mysqli_num_rows($result);  


$number_of_page = ceil ($number_of_result / $results_per_page);  

if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}  

$page_first_result = ($page-1) * $results_per_page;  

$query = "select * from drugs LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($conn, $query); 
    

 if($result->num_rows>0){
    while($row=$result->fetch_assoc()){


        echo "<tr>
        <td>".$row["drugID"]."</td>
        <td>".$row["tradeName"]."</td>
        <td>".$row["weight"]."</td>
        <td>".$row["price"]."</td>
        <td>".$row["stock"]."</td>
        <td>
            <a href='editDrug.php?edit=".$row['drugID']."' class='btn'>Edit</a>
        </td>
        </tr>";
    }
    for($page = 1; $page<= $number_of_page; $page++) {  
        echo '<a href = "drugs.php?page=' . $page . '">' . $page . ' </a>';  
    }  
}echo"</table>";

//Edit start

?>
    </table>
    
</body>
</html>
