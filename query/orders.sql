CREATE TABLE IF NOT EXISTS orders(
    order_id INT(11) NOT NULL AUTO_INCREMENT,
    customer_id INT(11),
    customer_name varchar(55),
    product_id INT(11),
    order_time datetime,
    quantity INT(11),
    total_price FLOAT,
    FOREIGN KEY(product_id) REFERENCES products(product_id),
    FOREIGN KEY(customer_id) REFERENCES users(customer_id),
    PRIMARY KEY(order_id)
);


INSERT INTO ORDERS (customer_id, customer_name, product_id, order_time)
VALUES(3,'Verrell Soriano',74, curdate());

select users.customer_id, orders.customer_name, users.email, orders.order_time, products.product_code, products.product_name, products.product_price
FROM orders, users, products
WHERE orders.customer_id=users.customer_id and orders.product_id=products.product_id