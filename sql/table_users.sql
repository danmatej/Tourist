CREATE TABLE users (
    user_id INT NOT NULL auto_increment,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    first_name varchar(255) NOT NULL,
    last_name varchar(255) NOT NULL,
    is_admin TINYINT(1) NOT NULL DEFAULT 0,
    PRIMARY KEY  (user_id)
)