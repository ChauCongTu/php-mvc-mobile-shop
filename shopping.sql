-- WEB BAN DIEN THOAI, LAPTOP, MAY TINH BANG
CREATE TABLE home (
    home_url VARCHAR NOT NULL,
    mantaince INT NOT NULL
);
CREATE TABLE users (
    user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR NOT NULL,
    user_fname VARCHAR NOT NULL,
    user_password VARCHAR NOT NULL,
    user_phone VARCHAR NOT NULL,
    user_address VARCHAR NOT NULL,
    isAdmin INT NOT NULL
);
CREATE TABLE category (
    cat_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cat_name VARCHAR NOT NULL,
    
);