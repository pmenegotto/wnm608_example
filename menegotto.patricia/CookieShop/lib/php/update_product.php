<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $product_id = $_POST['product_id'] ?? null;
    $name = $_POST['name'] ?? null;
    $description = $_POST['description'] ?? null;
    $price = $_POST['price'] ?? null;
    $image_url = $_POST['image_url'] ?? null;

    // Validação simples para garantir que os campos obrigatórios estão preenchidos
    if (!$product_id || !$name || !$price) {
        echo "Required fields are missing.";
        exit;
    }

    $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, price = ?, image_url = ? WHERE product_id = ?");
    $stmt->bind_param('ssdsi', $name, $description, $price, $image_url, $product_id);

    if ($stmt->execute()) {

        header("Location: ../../admin-products.php?success=Product updated successfully");
    } else {
        echo "Error updating product.";
    }
} else {
    header("Location: admin-products.php");
    exit;
}