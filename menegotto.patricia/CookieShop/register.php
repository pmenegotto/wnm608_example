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
                <h4>Register</h4>
                <form class="forms" action="./lib/php/add-user.php" method="post">
                    <input class="input-box" name="name" type="text" placeholder="Name">
                    <input class="input-box" name="email" type="email" placeholder="E-mail">
                    <input class="input-box" name="password" type="password" placeholder="Password">
                    <button class="btn" type="submit">Register</button>
                </form>
            </div>
        </section>
    </main>

    <?php include 'parts/footer.php'; ?>
</body>
</html>