<?php
$servername = "localhost";
$username = "root";  // Default XAMPP user
$password = "";  // Default XAMPP password (empty)
$dbname = "car_leasing_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch cars data
$sql = "SELECT * FROM cars";
$result = $conn->query($sql);

echo "<h2>Car Listings</h2>";
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Car Name</th>
<th>Brand</th>
<th>Model Year</th>
<th>Price Per Day</th>
<th>Availability</th>
</tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row['id']."</td>
        <td>".$row['car_name']."</td>
        <td>".$row['brand']."</td>
        <td>".$row['model_year']."</td>
        <td>".$row['price_per_day']."</td>
        <td>".$row['availability']."</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No cars available</td></tr>";
}

echo "</table>";
$conn->close();
?>
