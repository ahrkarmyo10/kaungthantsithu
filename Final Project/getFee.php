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
$result = mysqli_query($con, "SELECT cost FROM service WHERE id = $serviceId");
$row = mysqli_fetch_assoc($result);
$fee = $row["cost"];

// Return the fee as the AJAX response
echo $fee;

// Close the database connection
mysqli_close($con);
?>