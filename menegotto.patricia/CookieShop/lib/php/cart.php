<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = isset($_POST['product_id']) ? $_POST['product_id'] : null;

    if (isset($_POST['action']) && $_POST['action'] == 'add') {
        $quantity = 1;
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$productId] = array('quantity' => $quantity);
        }
    } elseif (isset($_POST['update'])) {
        // Atualiza a quantidade
        $newQuantity = $_POST['quantity'];
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] = $newQuantity;
        }
    } elseif (isset($_POST['remove'])) {
        // Remove o produto do carrinho
        unset($_SESSION['cart'][$productId]);
    }
    header("Location: ../../cart_page.php"); // Redireciona para evitar re-submissão do formulário
    exit();
}
