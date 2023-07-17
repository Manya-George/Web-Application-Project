<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Prescriptions</title>

</head>

<body>
    <div class="container">
        <nav>
            <div class="logo">
                <img src="..\css\logo.jpg">
            </div>
            <ul>
                <li><a href="patientHomePage.php">Home</a></li>
                <li><a href="symptoms.php">Symptoms</a></li>
                <li><a href="pendingPrescriptions.php">Pending</a></li>
                <li><a href="#" class="active">Dispensed Drugs</a></li>
                <li><a href="edit.php">Account</a></li>
                <li><a href=""><img src="../css/avatar.jpg"></a>
                    <div class="submenu">
                        <ul>
                            <li>
                                <h1>
                                    <?php 
                                    echo $_SESSION['username']; ?>
                                </h1>
                            </li>
                            <li><a href="delete.php">Disable Account</a></li>
                            <li><a href="../Common/landingPage.php">Logout</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <table class="t">

            <thead>
                <tr>
                    <th>Prescription ID</th>
                    <th>Symptoms</th>
                    <th>Drug</th>
                    <th>Dosage</th>
                    <th>Duration(days)</th>
                    <th>units</th>
                    <th>Weight(@unit)</th>
                    <th>Date Dispensed</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                </tr>

                <?php

                require_once("../Common/connect.php");

                $SSN = $_SESSION['SSN'];
                $results_per_page = 10;

               $sql= "Select dd.*,d.*,p.* from dispensedDrugs dd,Prescriptions p,drugs d where d.drugID=p.Drug and p.drug is not null and dd.patientSSN=p.patientSSN and d.drugID=dd.DrugID;";
                $result = $conn->query($sql);

                $number_of_result = mysqli_num_rows($result);


                $number_of_page = ceil($number_of_result / $results_per_page);

                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }

                $page_first_result = ($page - 1) * $results_per_page;


                $result = mysqli_query($conn, $sql);


                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        echo "<tr>
        <td>" . $row["prescriptionID"] . "</td>
        <td>" . $row["Symptoms"] . "</td>
        <td>" . $row["tradeName"] . "</td>
        <td>" . $row["Dosage"] . "</td>
        <td>" . $row["duration"] . "</td>
        <td>" . $row["units"] . "</td>
        <td>" . $row["weight"] . "</td>
        <td>" . $row["dateDispensed"] . "</td>
        <td>" . $row["Price"] . "</td>
   
        </tr>";
                    }
                }
                echo "</table>";



                if (isset($_GET['view'])) {

                    header("location:viewPrescription.php?edit=" . $_GET["view"]);

                }
                ?>
        </table>
    </div>
</body>

</html>