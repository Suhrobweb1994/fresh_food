<?php

$stmt = $pdo->prepare("SELECT * FROM items WHERE quantity > 0 AND available_until > NOW()");
$stmt->execute();
$items = $stmt->fetchAll();

foreach ($items as $item) {
    echo "<div>{$item['name']} - {$item['description']} - {$item['price']} USD</div>";
    echo "<a href='order.php?item_id={$item['id']}'>Order Now</a>";
}

// order.php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_SESSION['user_id']) && isset($_GET['item_id'])) {
    $item_id = $_GET['item_id'];
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO orders (user_id, item_id, status, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->execute([$user_id, $item_id, 'pending']);
    echo "Order placed successfully!";
}
?>