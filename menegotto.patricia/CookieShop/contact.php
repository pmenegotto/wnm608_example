<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <?php include 'parts/link-css.php'; ?>
</head>
<body>
    <?php include 'parts/navbar.php'; ?>

    <section class="section contact-section">
        <div class="contact-section__contact-card bg-black">
            <h1 class="contact-section__contact-card__title text-white">Contact Us</h1>

            <form class="contact-section__contact-card__form">
                <input class="contact-section__contact-card__form__input-text bg-black text-white" type="text" id="name" name="name" placeholder="Name">
                <input class="contact-section__contact-card__form__input-text bg-black text-white" type="text" id="phone" name="phone" placeholder="Phone">
                <input class="contact-section__contact-card__form__input-text bg-black text-white" type="text" id="address" name="address" placeholder="Address">
                <input class="contact-section__contact-card__form__input-submit" type="submit" value="Submit">
            </form>
        </div>
    </section>
    <section class="section contact-section">
        <div class="contact-section__newsletter bg-light-blue">
                <h1 class="contact-section__newsletter__title text-black">Newsletter</h1>
                <form class="contact-section__newsletter__form">
                    <input class="contact-section__newsletter__form__input-text bg-light-blue" type="text" id="name" name="name" placeholder="Name">
                    <input class="contact-section__newsletter__form__input-text bg-light-blue" type="text" id="phone" name="phone" placeholder="Phone">
                    <input class="contact-section__newsletter__form__input-text bg-light-blue" type="text" id="address" name="address" placeholder="Address">
                    <div class="contact-section__newsletter__form__checkbox">
                        <input class="contact-section__newsletter__form__checkbox__input-checkbox" type="checkbox" id="newsletter" name="checkbox">
                        <label class="contact-section__newsletter__form__checkbox__label-checkbox"for="newsletter">I agree to the terms of use.</label>
                    </div>
                    <input class="contact-section__newsletter__form__input-submit" type="submit" value="Submit">
                </form>
            </div>
    </section>

    <?php include 'parts/footer.php'; ?>
</body>
</html>