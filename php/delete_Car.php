<?php
// Ensure the request method is POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid request. Only POST requests are allowed.");
}

// Check if car_id is set
if (!isset($_POST["car_id"])) {
    die("Car ID is required.");
}

// Get Car ID
$car_id = intval($_POST["car_id"]); // Convert to integer to avoid SQL injection

// Database connection
include 'db_connect.php';  // Ensure db_connect.php exists

// Delete query
$query = "DELETE FROM cars WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $car_id);

if ($stmt->execute()) {
    echo "Car with ID $car_id deleted successfully.";
} else {
    echo "Error deleting car: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
