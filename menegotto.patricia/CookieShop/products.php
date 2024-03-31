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
        <section class="section2">
            <?php for( $i = 0; $i < 8; $i++){
                echo '
                <div class="section2__card card">
                    <img src="./img/image.png" alt="Product Image">
                    <div class="section2__card__text">
                        <h4>Lorem ipsum</h4>
                        <br>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit tempora, illum velit ex dignissimos quas quidem ipsum enim impedit cupiditate, ad dolorem nihil, quam non optio voluptate adipisci consequuntur deserunt.</p>
                    </div>
                    <a class="btn" href="product-page.php">View More</a>
                </div>';
            } ?>
            
            <button class="btn">View More</button>
        </section>
    </main>

    <?php include 'parts/footer.php'; ?>
</body>
</html>