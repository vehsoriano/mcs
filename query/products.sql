CREATE TABLE IF NOT EXISTS products(
product_id INT(11) NOT NULL AUTO_INCREMENT,
product_code CHAR(10),
product_image BLOB,
product_name VARCHAR(25),
product_price FLOAT,
product_quantity INT(11),
PRIMARY KEY(product_id)
);  