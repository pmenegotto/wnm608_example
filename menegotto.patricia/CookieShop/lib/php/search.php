<?php
require_once 'db.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

$sort = isset($_GET['sort']) ? $_GET['sort'] : 'name_asc';

$orderClause = 'name ASC';
switch ($sort) {
    case 'name_asc':
        $orderClause = 'name ASC';
        break;
    case 'name_desc':
        $orderClause = 'name DESC';
        break;
    case 'price_asc':
        $orderClause = 'price ASC';
        break;
    case 'price_desc':
        $orderClause = 'price DESC';
        break;
}

if ($search == '') {
    $sql = "SELECT product_id, name, description, price, image_url FROM products ORDER BY $orderClause";
} else {
    $sql = "SELECT product_id, name, description, price, image_url FROM products WHERE name LIKE ? OR description LIKE ? ORDER BY $orderClause";
}

$stmt = $conn->prepare($sql);

if ($search !== '') {
    $searchTerm = '%' . $search . '%';
    $stmt->bind_param('ss', $searchTerm, $searchTerm);
}

$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
$conn->close();