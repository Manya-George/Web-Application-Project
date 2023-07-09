<?php

require_once("DBConnectionCode.php");

$sql = "SELECT * FROM pharmaceuticalcompany";
$results = $conn->query($sql);
//print_r($row);

?>

<!DOCTYPE html>
<html>
    <head><title>Pharmaceutical Companies</title>
        <style>
            table,th,td{
                border: 1px solid black;
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>
        <h2> REGISTERED PHARMACEUTICAL COMPANIES </h2>
        <table>
            <tr>
                <th>Company ID</th>
                <th>Company Name</th>
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
                <td><?php echo $row['companyID'];?></td>
                <td><?php echo $row['companyName'];?></td>
                <td><?php echo $row['phoneNumber'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['username'];?></td>
                <td><?php echo $row['passwords'];?></td>
                <td><button onclick = "window.location.href='updatePharmCompany.html'">Update</button></td>
                <td><button onclick = "window.location.href='deletePharmCompany.php'">Delete</button></td>               
            </tr>
            <?php
                }
            ?>
        </table>
    </body>
</html>