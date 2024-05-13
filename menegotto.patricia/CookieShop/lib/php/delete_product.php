<?php
require_once 'db.php';
$product_id = $_GET['id'] ?? null;

if (!$product_id) {
    echo "Product ID is required.";
    exit;
}

$stmt = $conn->prepare("DELETE FROM products WHERE product_id = ?");
$stmt->bind_param('i', $product_id);
if ($stmt->execute()) {
    header("Location: ../../admin-products.php?success=Product removed successfully");
} else {
    echo "Error";
}
