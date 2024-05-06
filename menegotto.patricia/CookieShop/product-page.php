<?php

require_once 'lib/php/db.php';

$id = $conn->real_escape_string($_GET['id']);

$sql = "SELECT name, description, price, image_url FROM products WHERE product_id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    $product = false;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product ? htmlspecialchars($product['name']) : 'Produto não encontrado'; ?></title>
    <?php include 'parts/link-css.php'; ?>
</head>
<body>
    <?php include 'parts/navbar.php'; ?>

    <main>
        <?php if ($product): ?>
            <section class="section cart-section">
                <div class="cart-section__images">
                    <img class="cart-section__images__main-image" src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="">                </div>
                <div class="cart-section__text">
                    <h3><?php echo htmlspecialchars($product['name']) . "<br> $" . htmlspecialchars(number_format($product['price'], 2)) ?></h3>
                    <p><?php echo htmlspecialchars($product['description']); ?></p>
                    <br>
                    <form action="lib/php/cart.php" method="post">
                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($id); ?>">
                        <input type="hidden" name="action" value="add">
                        <button type="submit" class="btn">Add to cart</button>
                    </form>
                </div>
            </section>
        <?php else: ?>
            <p>Error.</p>
        <?php endif; ?>
    </main>

    <?php include 'parts/footer.php'; ?>
</body>
</html>