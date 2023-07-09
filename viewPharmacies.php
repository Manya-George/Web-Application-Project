<?php

require_once("DBConnectionCode.php");

$sql = "SELECT * FROM pharmacy";
$results = $conn->query($sql);
//print_r($row);

?>

<!DOCTYPE html>
<html>
    <head><title>Pharmacies</title>
        <style>
            table,th,td{
                border: 1px solid black;
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>
        <h2> REGISTERED PHARMACIES </h2>
        <table>
            <tr>
                <th>Organisation Name</th>               
                <th>Phone Number</th>
                <th>Address</th>
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
                <td><?php echo $row['orgName'];?></td>             
                <td><?php echo $row['phoneNumber'];?></td>
                <td><?php echo $row['addresses'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['username'];?></td>
                <td><?php echo $row['passwords'];?></td>
                <td><button onclick = "window.location.href='updatePharmacy.html'">Update</button></td>
                <td><button onclick = "window.location.href='deletePharmacy.php'">Delete</button></td>               
            </tr>
            <?php
                }
            ?>
        </table>
    </body>
</html>