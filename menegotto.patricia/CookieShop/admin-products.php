<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Administration</title>
    <?php include 'parts/link-css.php'; ?>
</head>
<body>
    <?php include 'parts/navbar.php'; ?>

    <main>
        <section style="margin: 1%; padding: 0;">
            <div class="content">
                <form class="search" action="admin-products.php" method="GET">
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
        <section style="margin: 1%; padding: 0;">
            <a class="btn" href="add_product.php">Add product</a>
        </section>
        <section class="wrap gap5">
            
            <?php
                require_once 'lib/php/search.php';
                
                if ($result->num_rows > 0) {
                    ?>
                    <table class='table'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row['product_id']; ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['description']); ?></td>
                            <td>$ <?php echo htmlspecialchars(number_format($row['price'], 2, ',', '.')); ?></td>
                            <td><img src="<?php echo htmlspecialchars($row['image_url'])?>" alt="<?php htmlspecialchars($row["name"]) ?>" style='width:50px; height:50px;'></td>
                            <td>
                                <a href='edit-product.php?id=<?php echo $row['product_id']?>' class='btn'>Edit</a>
                                <a href='lib/php/delete_product.php?id=<?php echo $row['product_id']?>' class='btn'>Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<p>Error.</p>";
                }
            ?>
        </section>
    </main>

    <?php include 'parts/footer.php'; ?>
</body>
</html>