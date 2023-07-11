<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="DrugDispensingDatabase";

// Create connection
$conn = new mysqli($servername,$username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

/*if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);*/

?>