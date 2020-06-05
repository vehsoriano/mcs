CREATE TABLE IF NOT EXISTS users(
    customer_id INT(11) NOT NULL AUTO_INCREMENT,
    name TINYTEXT NOT NULL,
    address LONGTEXT NOT NULL,
    email TINYTEXT NOT NULL,
    mobile_no VARCHAR(11),
    role VARCHAR(11),
    password LONGTEXT NOT NULL,
    PRIMARY KEY(customer_id)
);