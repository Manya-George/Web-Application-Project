<?php

require_once("DBConnectionCode.php");

$sql = "SELECT * FROM patients";
$results = $conn->query($sql);
//print_r($row);

?>

<!DOCTYPE html>
<html>
    <head><title>Patients</title>
        <style>
            table,th,td{
                border: 1px solid black;
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>
        <h2> REGISTERED PATIENTS </h2>
        <table>
            <tr>
                <th>SSN</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php
                while($row = $results->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $row['SSN'];?></td>
                <td><?php echo $row['firstName'];?></td>
                <td><?php echo $row['lastName'];?></td>
                <td><?php echo $row['dateofBirth'];?></td>
                <td><?php echo $row['gender'];?></td>
                <td><?php echo $row['addresses'];?></td>
                <td><?php echo $row['phoneNumber'];?></td>
                <td><?php echo $row['eMail'];?></td>
                <td><?php echo $row['username'];?></td>
                <td><?php echo $row['passwords'];?></td>
                <td><button onclick = "window.location.href='updatepatientform.html'">Update</button></td>
                <td><button onclick = "window.location.href='deletepatient.php'">Delete</button></td>               
            </tr>
            <?php
                }
            ?>
        </table>
    </body>
</html>