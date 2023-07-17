<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
        <title>Patients </title>

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
                        <li><a href="#" class=active>Patients</a></li>
                        <li><a href="pendingPrescriptions.php">Awaiting Prescriptions</a></li>
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
<div class="search">
    <form action="" method="GET">
        <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>" placeholder="search">
        <button type="submit">Search</button>
    </form>
</div>
    <table class="t">
        <thead>
        <tr>
            <th>SSN</th>
            <th>FullName</th>
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
    

if(isset($_GET['search']))
{
    $filter=$_GET['search'];
    $qry="Select * from patients where CONCAT(fullName,SSN) LIKE '%$filter%'";
    $query_run=mysqli_query($conn,$qry);

 if($query_run->num_rows>0){
    while($row=$query_run->fetch_assoc()){
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
            <a href='prescribe.php?prescribe=".$row['SSN']."' class='btn'>Prescribe</a>
      
        </td>
        </tr>";
    }

}
else{
    ?>
    <tr>
        <td colspan="8">No Record Found!</td>
</tr>
    <?php
}
echo"</table>";

}
/*if(isset($_GET['search']))
{
    $filter=$_GET['search'];
    $qry="Select * from patients where CONCAT(fullName,SSN) LIKE '%$filter%'";
    $query_run=mysqli_query($conn,$qry);

    if(mysqli_num_rows($query_run)>0){
        while($row=$query_run->fetch_assoc()){
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
                <a href='prescribe.php?prescribe=".$row['SSN']."' class='btn'>Prescribe</a>
          
            </td>
            </tr>";
        }*/
?>
    </table>
    
</body>
</html>
