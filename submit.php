<?php
include 'db.php';  // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $age = intval($_POST['age']);
    $address = htmlspecialchars($_POST['address']);
    $card_number = htmlspecialchars($_POST['card_number']);

    // Prepare SQL query to insert data
    $sql = "INSERT INTO ration_cards (name, age, address, card_number) VALUES (?, ?, ?, ?)";

    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siss", $name, $age, $address, $card_number);

    // Execute query
    if ($stmt->execute()) {
        echo "Ration card submitted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
