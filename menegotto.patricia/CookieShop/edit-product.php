<?php
require_once 'lib/php/db.php';

$product_id = $_GET['id'] ?? null;
if (!$product_id) {
    echo "Product ID is required.";
    exit;
}

// Prepara a consulta para buscar as informações do produto
$stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
$stmt->bind_param('i', $product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if (!$product) {
    echo "Product not found.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <?php include 'parts/link-css.php'; ?>
</head>
<body>
    <?php include 'parts/navbar.php'; ?>
    <main>
        <section class="bg-yellow">
            <div>
                <form class="forms" action="lib/php/update_product.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                    <label for="name">Name:</label>
                    <input class="input-box" type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>">

                    <label for="description">Description:</label>
                    <textarea class="input-box" id="description" name="description"><?php echo htmlspecialchars($product['description']); ?></textarea>

                    <label for="price">Price:</label>
                    <input class="input-box" type="text" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>">

                    <label for="image_url">Image URL:</label>
                    <input class="input-box" type="text" id="image_url" name="image_url" value="<?php echo htmlspecialchars($product['image_url']); ?>">
                    <br>
                    <button type="submit" class="btn">Update Product</button>
                </form>
            </div>
        </section>
    </main>
    <?php include 'parts/footer.php'; ?>
</body>
</html>
