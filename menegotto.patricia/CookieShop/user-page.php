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
        <section>
            <div class="login">
                <h4>Login</h4>
                <form class="forms" action="">
                    <input class="input-box" type="text" placeholder="E-mail">
                    <input class="input-box" type="password" placeholder="Password">
                    <button class="btn" type="submit">Login</button>
                </form>
                <br>
                <a class="btn" href="register.php">Register here</a>
                <br>
                <a class="btn" href="admin-products.php">Admin Page</a>
            </div>
        </section>
    </main>

    <?php include 'parts/footer.php'; ?>
</body>
</html>