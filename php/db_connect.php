<?php
$host = "localhost";
$user = "root";  // Default XAMPP MySQL user
$pass = "";      // Default XAMPP MySQL password is empty
$dbname = "car_leasing_db"; // Your database name

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
