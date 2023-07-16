<?php

require_once("DBConnectionCode.php");

$sql = "SELECT * FROM deliverydriver";
$results = $conn->query($sql);
//print_r($row);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registered Delivery Drivers</title>
        <link rel="stylesheet" href="views.css">
    </head>
    <body>
        <h2> REGISTERED DELIVERY DRIVERS </h2>
        <table class="content-table">
            <thead>
            <tr>
                <th>SSN</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Phone Number</th>
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
                <td><?php echo $row['SSN'];?></td>
                <td><?php echo $row['firstName'];?></td>
                <td><?php echo $row['lastName'];?></td>
                <td><?php echo $row['phoneNumber'];?></td>
                <td><?php echo $row['eMail'];?></td>
                <td><?php echo $row['username'];?></td>
                <td><?php echo $row['passwords'];?></td>
                <td><button onclick = "window.location.href='updateDriver.html'">Update</button></td>
                <td><button onclick = "window.location.href='deleteDriver.php'">Delete</button></td>               
            </tr>
            </tbody>
            <?php
                }
            ?>
        </table>
    </body>
</html>