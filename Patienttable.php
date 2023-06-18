<!DOCTYPE html>
<html>
    <head>
        <title>Patient Table</title>
</head>
<body>
    <table>
        <tr>
            <th>SSN</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Age</th>
            <th>Address</th>
            <th>Phone Number</th>
        </tr>
<?php
 require_once("connect.php"); 
 $sql="Select * from patient ";
 $result=$conn->query($sql);    
        
 if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        echo "<tr><td>".$row["SSN"]."</td><td>".$row["firstName"]."</td><td>".$row["lastName"]."</td><td>".$row["age"]."</td><td>".$row["addresses"]."</td><td>".$row["phoneNumber"]."</td></tr>";
    }
}echo"</table>";
 
 
?>
    </table>
</body>