<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
        <title>Patient Table</title>

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
                        <li><a href="#" class=active>Patients</a></li>
                        <li><a href="doctors.php">Doctors</a></li>
                        <li><a href="pharmacists.php">Pharmacists</a></li>
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
            <th>SSN</th>
            <th>Full Name</th>
            <th>Date of Birth</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Address</th>
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

 $sql="Select * from patients ";
 $result=$conn->query($sql);    
        

    
$number_of_result = mysqli_num_rows($result);  


$number_of_page = ceil ($number_of_result / $results_per_page);  

if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}  

$page_first_result = ($page-1) * $results_per_page;  

$query = "select * from patients LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($conn, $query); 
    

 if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $from = new DateTime($row["dateofBirth"]);
        $to   = new DateTime('today');

        echo "<tr>
        <td>".$row["SSN"]."</td>
        <td>".$row["fullName"]."</td>
        <td>".$row["dateofBirth"]."</td>
        <td>".$from->diff($to)->y."</td>
        <td>".$row["gender"]."</td>
        <td>".$row["addresses"]."</td>
        <td>".$row["phoneNumber"]."</td>
        <td>
            <a href='\DrugDispensingProject\Admin/editPatient.php?edit=".$row['SSN']."' class='btn'>Edit</a>
            <a href='\DrugDispensingProject\Admin/test.php?delete=".$row['SSN']."' class='btn'>Delete</a>
        </td>
        </tr>";
    }
    for($page = 1; $page<= $number_of_page; $page++) {  
        echo '<a href = "test.php?page=' . $page . '">' . $page . ' </a>';  
    }  
}echo"</table>";
//Delete start
if(isset($_GET['delete'])){
   $id=$_GET["delete"];
   $qry="Delete from patients where SSN ='$id'";
   mysqli_query($conn, $qry); 
   header("Location:test.php");
} 
//Delete stop

//Edit start
if(isset($_GET['edit'])){

    header("location:edit.php?edit=".$_GET["edit"]);
    /*$id=$_GET["edit"];
    $qry1="Select * from patient where SSN ='$id'";

    $result1=$conn->query($qry1);  
    $row1=$result1->fetch_assoc();
    echo $row1['firstName'];*/
 } 
?>
    </table>
    
</body>
</html>
