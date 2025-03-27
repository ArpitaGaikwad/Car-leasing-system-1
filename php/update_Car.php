<?php
include 'db_connect.php';

echo "<pre>";
print_r($_POST); // Debugging: Check what is received
echo "</pre>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST)) {
        if (isset($_POST['car_id'], $_POST['car_name'], $_POST['brand'], $_POST['model_year'], $_POST['price_per_day'], $_POST['availability'])) {
            $id = intval($_POST['car_id']); // Convert to integer
            $car_name = $_POST['car_name'];
            $brand = $_POST['brand'];
            $model_year = intval($_POST['model_year']);
            $price_per_day = floatval($_POST['price_per_day']);
            $availability = intval($_POST['availability']);

            // Check if Car ID exists before updating
            $checkQuery = "SELECT id FROM cars WHERE id = ?";
            $stmtCheck = $conn->prepare($checkQuery);
            $stmtCheck->bind_param("i", $id);
            $stmtCheck->execute();
            $resultCheck = $stmtCheck->get_result();

            if ($resultCheck->num_rows > 0) {
                $sql = "UPDATE cars SET car_name=?, brand=?, model_year=?, price_per_day=?, availability=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssiddi", $car_name, $brand, $model_year, $price_per_day, $availability, $id);

                if ($stmt->execute()) {
                    echo "Car ID: $id updated successfully.";
                } else {
                    echo "Error updating car: " . $stmt->error;
                }
            } else {
                echo "Error: Car ID $id does not exist.";
            }
        } else {
            echo "Invalid request: Some fields are missing!";
        }
    } else {
        echo "Invalid request: POST data is empty!";
    }
} else {
    echo "Invalid request method!";
}
?>
