<?php
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <?php include 'parts/link-css.php'; ?>
</head>
<body>
    <?php include 'parts/navbar.php'; ?>

    <main>
        <section class="section cart-section">
            <div class="cart-section__images">
                <img class="cart-section__images__main-image" src="./img/image.png" alt="">
                <div class="cart-section__images__images-carousel">
                    <img src="./img/image.png" alt="">
                    <img src="./img/image.png" alt="">
                    <img src="./img/image.png" alt="">
                </div>
            </div>
            <div class="cart-section__text">
                <h3>Lorem ipsum dolor <?php echo $id ?></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit dolore quam, ipsa tenetur placeat non expedita ex cum nisi! Ratione odit placeat rerum earum similique repudiandae architecto corrupti. Rem, nobis?</p>
                <button class="btn">Add to cart</button>
            </div>
        </section>
    </main>

    <?php include 'parts/footer.php'; ?>
</body>
</html>