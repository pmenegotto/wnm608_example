<?php
require_once 'lib/php/db.php'; // Garanta que este arquivo conecta com o banco de dados.

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? null;
    $description = $_POST['description'] ?? null;
    $price = $_POST['price'] ?? null;
    $image_url = $_POST['image_url'] ?? null;

    // Verifica se os campos necessários estão preenchidos
    if (!$name || !$price) {
        echo "Please fill in all required fields.";
    } else {
        // Prepara a SQL para inserção no banco de dados
        $stmt = $conn->prepare("INSERT INTO products (name, description, price, image_url) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssds', $name, $description, $price, $image_url);
        if ($stmt->execute()) {
            // Redireciona para a lista de produtos após a inserção
            header("Location: admin-products.php?success=Product added successfully");
            exit;
        } else {
            echo "Failed to add product: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <?php include 'parts/link-css.php'; ?>
</head>
<body>
    <?php include 'parts/navbar.php'; ?>

    <main>
        <section class="bg-yellow">
            <div>
                <form class="forms" action="add_product.php" method="POST">
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
                    <button type="submit" class="btn">Add Product</button>
                </form>
            </div>
        </section>
    </main>

    <?php include 'parts/footer.php'; ?>
</body>
</html>
