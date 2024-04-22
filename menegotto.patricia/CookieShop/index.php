<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Shop</title>
    <?php include 'parts/link-css.php'; ?>
</head>
<body>
    <?php include 'parts/navbar.php'; ?>

    <main>
        <section class="bg-yellow">
            <div class="content">
                <h1>Welcome to the Cookie Shop</h1>
                <div class="search">
                    <input type="search" id="search" name="search">
                    <button class="btn search__button">Search</button>
                </div>
            </div>
        </section>
        <section class="bg-light-blue gap5 wrap">
            <?php
            require_once 'lib/php/db.php';

            // Consulta para buscar os produtos com ID 1, 2 e 3
            $sql = "SELECT product_id, name, description, price, image_url FROM products WHERE product_id IN (1, 2, 3)";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // Processar cada linha do resultado
                while($row = $result->fetch_assoc()) {
                    echo "<div class='section2__card card bg-white'>";
                    echo "<img src='" . htmlspecialchars($row['image_url']). "' alt='" . htmlspecialchars($row["name"]). "'>";
                    echo "<div class='section2__card__text'>";
                    echo "<h4>" . htmlspecialchars($row["name"]). "</h4><br>";
                    echo "<p>" . htmlspecialchars($row["description"]). "</p>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nenhum produto encontrado.</p>";
            }
            // Fechar a conexão apenas uma vez após o uso
            $conn->close();
            ?>
        </section>
    </main>

    <?php include 'parts/footer.php'; ?>
</body>
</html>
