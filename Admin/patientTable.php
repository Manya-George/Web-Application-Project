
<!DOCTYPE html>
<html>
    <head>
        <title>Patient Table</title>
        <style>
  table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>
    <table>
        <thead>
        <tr>
            <th>SSN</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Age</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Actions</th>
        </tr>
</thead>
<tbody>
    <tr>
</tr>

<?php
 require_once("connect.php"); 

  
$results_per_page = 10;  

 $sql="Select * from patient ";
 $result=$conn->query($sql);    
        

    
$number_of_result = mysqli_num_rows($result);  


$number_of_page = ceil ($number_of_result / $results_per_page);  

if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}  

$page_first_result = ($page-1) * $results_per_page;  

$query = "select * from patient LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($conn, $query); 

 if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        echo "<tr>
        <td>".$row["SSN"]."</td>
        <td>".$row["firstName"]."</td>
        <td>".$row["lastName"]."</td>
        <td>".$row["age"]."</td>
        <td>".$row["addresses"]."</td>
        <td>".$row["phoneNumber"]."</td>
        <td>
            <a href='\DrugDispensingProject\Admin\patientTable.php?edit=".$row['SSN']."' class='btn'>Edit</a>
            <a href='\DrugDispensingProject\Admin\patientTable.php?delete=".$row['SSN']."' class='btn'>Delete</a>
        </td>
        </tr>";
    }
    for($page = 1; $page<= $number_of_page; $page++) {  
        echo '<a href = "Patienttable.php?page=' . $page . '">' . $page . ' </a>';  
    }  
}echo"</table>";
//Delete start
if(isset($_GET['delete'])){
   $id=$_GET["delete"];
   $qry="Delete from patient where SSN ='$id'";
   mysqli_query($conn, $qry); 
   header("Location:patientTable.php");
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
