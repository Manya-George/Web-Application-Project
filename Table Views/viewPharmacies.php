<?php

require_once("DBConnectionCode.php");

$sql = "SELECT * FROM pharmacy";
$results = $conn->query($sql);
//print_r($row);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registered Pharmacies</title>
        <link rel="stylesheet" href="views.css">
    </head>
    <body>
        <h2> REGISTERED PHARMACIES </h2>
        <table class="content-table">
            <thead>
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
            </thead>
            <?php
                while($row = $results->fetch_assoc()){
            ?>
            <tbody>
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
            </tbody>
            <?php
                }
            ?>
        </table>
    </body>
</html>