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
        <section style="margin: 1%; padding: 0;">
            <div class="content">
                <form class="search" action="products.php" method="GET">
                    <input type="search" id="search" name="search">
                    <select name="sort">
                        <option value="name_asc">Name (A-Z)</option>
                        <option value="name_desc">Name (Z-A)</option>
                        <option value="price_asc">Price (Low to High)</option>
                        <option value="price_desc">Price (High to Low)</option>
                    </select>
                    <button class="btn search__button">Search</button>
                </form>
            </div>
        </section>
        <section class="wrap gap5">
            <?php
                require_once 'lib/php/search.php';

                if ($result->num_rows > 0) {
                    // Processar cada linha do resultado
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <div class='card bg-pink'>
                            <img src="<?php echo htmlspecialchars($row['image_url'])?>" alt="<?php htmlspecialchars($row["name"]) ?>">
                            <div class='card__text'>
                                <h4><?php echo htmlspecialchars($row["name"]) ?></h4><br>
                                <p><?php echo htmlspecialchars($row["description"]) ?></p>
                                <p>Price: $<?php echo htmlspecialchars(number_format($row['price'], 2, ',', '.')) ?></p><br><br>
                            </div>
                            <a class="btn" href="product-page.php?id=<?php echo $row['product_id'] ?>">View More</a>
                        </div>
                        <?php
                    }
                }
            ?>
        </section>
    </main>

    <?php include 'parts/footer.php'; ?>
</body>
</html>