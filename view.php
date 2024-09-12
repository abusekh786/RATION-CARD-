<?php
include 'db.php';  // Include your database connection file

$sql = "SELECT id, name, age, address, card_number FROM ration_cards";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>Address</th><th>Card Number</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["age"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["address"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["card_number"]) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No ration cards submitted yet.";
}
$conn->close();
?>
