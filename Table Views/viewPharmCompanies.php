<?php

require_once("DBConnectionCode.php");

$sql = "SELECT * FROM pharmaceuticalcompany";
$results = $conn->query($sql);
//print_r($row);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registered Pharmaceutical Companies</title>
        <link rel="stylesheet" href="views.css">
    </head>
    <body>
        <h2> REGISTERED PHARMACEUTICAL COMPANIES </h2>
        <table class="content-table">
            <thead>
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
            </thead>
            <?php
                while($row = $results->fetch_assoc()){
            ?>
            <tbody>
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
            </tbody>
            <?php
                }
            ?>
        </table>
    </body>
</html>