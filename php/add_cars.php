<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_name = $_POST['car_name'];
    $brand = $_POST['brand'];
    $model_year = $_POST['model_year'];
    $price_per_day = $_POST['price_per_day'];
    $availability = $_POST['availability'];

    $sql = $conn->prepare("INSERT INTO cars (car_name, brand, model_year, price_per_day, availability) 
            VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param("ssids", $car_name, $brand, $model_year, $price_per_day, $availability);

    if ($sql->execute()) {
        echo "Car added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $sql->close();
    $conn->close();
}
?>
