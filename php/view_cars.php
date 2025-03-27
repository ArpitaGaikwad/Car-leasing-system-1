<?php
include 'db_connect.php';

$sql = "SELECT * FROM cars";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cars</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Available Cars</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Car Name</th>
            <th>Brand</th>
            <th>Model Year</th>
            <th>Price Per Day</th>
            <th>Availability</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['car_name']}</td>
                        <td>{$row['brand']}</td>
                        <td>{$row['model_year']}</td>
                        <td>\${$row['price_per_day']}</td>
                        <td>" . ($row['availability'] ? "Available" : "Not Available") . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No cars found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
