CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image_url VARCHAR(255)
);

INSERT INTO products (name, description, price, image_url) VALUES
('chocolatechip', 'Delicious chocolate chip cookies.', 2.99, 'images/chocolatechip.png'),
('oatmealraisin', 'Oatmeal raisin cookies for a classic taste.', 2.99, 'images/oatmealraisin.png'),
('sugar', 'Sweet sugar cookies with icing.', 2.99, 'images/sugar.png'),
('peanutbutter', 'Peanut butter cookies with rich flavor.', 2.99, 'images/peanutbutter.png'),
('snickerdoodle', 'Cinnamon sugar snickerdoodle cookies.', 2.99, 'images/snickerdoodle.png'),
('gingersnap', 'Crunchy and spicy gingersnap cookies.', 2.99, 'images/gingersnap.png'),
('shortbread', 'Buttery shortbread cookies.', 2.99, 'images/shortbread.png'),
('macadamia', 'White chocolate macadamia nut cookies.', 3.49, 'images/macadamia.png'),
('brownie', 'Chocolate brownie cookies with chunks.', 2.99, 'images/brownie.png'),
('lemon', 'Lemon cookies with a tangy twist.', 2.99, 'images/lemon.png'),
('almond', 'Almond cookies with a crunchy texture.', 2.99, 'images/almond.png'),
('coconut', 'Coconut cookies with real coconut flakes.', 2.99, 'images/coconut.png');