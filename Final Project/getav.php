<?php
// Database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "Final Project"; // Change to your database name

$con = mysqli_connect($host, $username, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the service ID from the AJAX request
$serviceId = $_GET["serviceId"];

// Fetch the fee from the database based on the service ID
$result = mysqli_query($con, "SELECT available_date FROM doctor WHERE id = $serviceId");
$row = mysqli_fetch_assoc($result);
$avd = $row["available_date"];

// Return the fee as the AJAX response
echo $avd;

// Close the database connection
mysqli_close($con);
?>