<?php require_once 'lib/php/cart.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Cart</title>
    <?php include 'parts/link-css.php'; ?>
</head>
<body>
    <?php include 'parts/navbar.php'; ?>

    <main>
        <section class="bg-yellow flex-column">
            <div class="content">
                <h1>Cart</h1>
            </div>
            <div class="content">
                <table class="">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($_SESSION['cart'] as $productId => $productDetails) {
                            $sql = "SELECT name, price FROM products WHERE product_id = '$productId'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $product = $result->fetch_assoc();
                                $subTotal = $product['price'] * $productDetails['quantity'];
                                $total += $subTotal;
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product['name']); ?></td>
                            <td>$<?php echo htmlspecialchars(number_format($product['price'], 2)); ?></td>
                            <td>
                                <form action="lib/php/cart.php" method="post">
                                    <input class="input-number" type="number" name="quantity" value="<?php echo htmlspecialchars($productDetails['quantity']); ?>" min="1">
                                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($productId); ?>">
                                    <input class="btn" type="submit" name="update" value="Refresh">
                                </form>
                            </td>
                            <td>$<?php echo htmlspecialchars(number_format($subTotal, 2)); ?></td>
                            <td>
                                <form action="lib/php/cart.php" method="post">
                                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($productId); ?>">
                                    <input class="btn" type="submit" name="remove" value="Remove">

                                </form>
                            </td>
                        </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total:</th>
                            <th colspan="4">$<?php echo htmlspecialchars(number_format($total, 2)); ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
            <br>
            <br> 
            <div>
                <a href="checkout.php" class="btn">Checkout</a>
            </div>
        </section>
    </main>

    <?php include 'parts/footer.php'; ?>
</body>
</html>

<?php $conn->close(); ?>
