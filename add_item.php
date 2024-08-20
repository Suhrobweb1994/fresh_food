<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $available_until = $_POST['available_until'];
    $vendor_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO items (vendor_id, name, description, price, quantity, available_until) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$vendor_id, $name, $description, $price, $quantity, $available_until]);
    echo "Item added successfully!";
}
?>