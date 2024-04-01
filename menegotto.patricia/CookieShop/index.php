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
            <div class="section1__content">
                <h1>Lorem ipsum dolor sit amet</h1>
                <div class="section1__content__search">
                    <input type="search" id="search" name="search">
                    <button class="btn section1__content__search__button">Search</button>
                </div>
            </div>
        </section>
        <section class="section2">
            <div class="section2__card card">
            <img src="./img/image.png" alt="">
                <div class="section2__card__text">
                    <div class="section2__card__text">
                        <h4>Lorem ipsum</h4>
                        <br>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit tempora, illum velit ex dignissimos quas quidem ipsum enim impedit cupiditate, ad dolorem nihil, quam non optio voluptate adipisci consequuntur deserunt.</p>
                    </div>
                </div>
            </div>
            <div class="section2__card card">
                <img src="./img/image.png" alt="">
                <div class="section2__card__text">
                    <div class="section2__card__text">
                        <h4>Lorem ipsum</h4>
                        <br>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit tempora, illum velit ex dignissimos quas quidem ipsum enim impedit cupiditate, ad dolorem nihil, quam non optio voluptate adipisci consequuntur deserunt.</p>
                    </div>
                </div>
            </div>
            <div class="section2__card card">
                <img src="./img/image.png" alt="">
                <div class="section2__card__text">
                    <h4>Lorem ipsum</h4> 
                    <br>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit tempora, illum velit ex dignissimos quas quidem ipsum enim impedit cupiditate, ad dolorem nihil, quam non optio voluptate adipisci consequuntur deserunt.</p>
                </div>            
            </div>
        </section>
    </main>

    <?php include 'parts/footer.php'; ?>
</body>
</html>