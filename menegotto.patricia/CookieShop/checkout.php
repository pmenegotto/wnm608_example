<?php require_once 'lib/php/cart.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css"> <!-- Assegure-se de que este arquivo CSS exista e seja o correto -->
</head>
<body>
    <?php include 'parts/navbar.php'; ?>

    <main class="checkout-container">
        <section class="bg-pink flex-column">
            <h1>Checkout</h1>
            <div class="checkout-form">
                <form action="process-checkout.php" method="post">
                    <section>
                        <h2>Personal Information</h2>
                        <label for="name">Full Name:</label>
                        <input class="input-box" type="text" id="name" name="name" required>
    
                        <label for="email">Email:</label>
                        <input class="input-box" type="email" id="email" name="email" required>
                    </section>
    
                    <section>
                        <h2>Address</h2>
                        <label for="address">Adress:</label>
                        <input class="input-box" type="text" id="address" name="address" required>
    
                        <label for="city">City:</label>
                        <input class="input-box" type="text" id="city" name="city" required>
    
                        <label for="postal-code">ZIP:</label>
                        <input class="input-box" type="text" id="postal-code" name="postal-code" required>
                    </section>
    
                    <section>
                        <h2>Products</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                session_start();
                                require_once 'lib/php/db.php';
                                if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                                    echo "<p>Your cart is empty!</p>";
                                } else {
                                    echo "<table>
                                            <thead>
                                                <tr>
                                                    <th>Produto</th>
                                                    <th>Quantidade</th>
                                                    <th>Preço Unitário</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>";
                                    $total = 0;
                                    foreach ($_SESSION['cart'] as $productId => $details) {
                                        $stmt = $conn->prepare("SELECT name, price FROM products WHERE product_id = ?");
                                        $stmt->bind_param("i", $productId);
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        if ($product = $result->fetch_assoc()) {
                                            $subTotal = $product['price'] * $details['quantity'];
                                            $total += $subTotal;
                                            echo "<tr>
                                                    <td>".htmlspecialchars($product['name'])."</td>
                                                    <td>{$details['quantity']}</td>
                                                    <td>$".number_format($product['price'], 2)."</td>
                                                    <td>$".number_format($subTotal, 2)."</td>
                                                  </tr>";
                                        }
                                        $stmt->close();
                                    }
                                    $conn->close();
                                
                                    echo "</tbody>
                                          <tfoot>
                                            <tr>
                                                <th colspan='3'>Total Geral:</th>
                                                <th>$".number_format($total, 2)."</th>
                                            </tr>
                                          </tfoot>
                                        </table>";
                                }
                            ?>
    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3">Total:</th>
                                    <th>$<?php echo number_format($total, 2); ?></th>
                                </tr>
                            </tfoot>
                        </table>
                            
                    </section>
                            
                    <button type="submit" class="btn">Next</button>
                </form>
            </div>
        </section>
    </main>

    <?php include 'parts/footer.php'; ?>
</body>
</html>