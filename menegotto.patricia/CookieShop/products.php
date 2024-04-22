<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <?php include 'parts/link-css.php'; ?>
</head>
<body>
    <?php include 'parts/navbar.php'; ?>

    <main>
        <section class="wrap gap5">
        <?php
            require_once 'lib/php/db.php';

            $sql = "SELECT product_id, name, description, price, image_url FROM products";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // Processar cada linha do resultado
                while($row = $result->fetch_assoc()) {
                    echo "<div class='card bg-pink'>";
                    echo "<img src='" . htmlspecialchars($row['image_url']). "' alt='" . htmlspecialchars($row["name"]). "'>";
                    echo "<div class='card__text'>";
                    echo "<h4>" . htmlspecialchars($row["name"]). "</h4><br>";
                    echo "<p>" . htmlspecialchars($row["description"]). "</p>";
                    echo "<p>Price: $" . htmlspecialchars(number_format($row['price'], 2, ',', '.')) . "</p><br><br>";
                    echo '<a class="btn" href="product-page.php?id=' . $row['product_id'] . '">View More</a>';
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nenhum produto encontrado.</p>";
            }
            $conn->close();
            ?>
        </section>
    </main>

    <?php include 'parts/footer.php'; ?>
</body>
</html>

