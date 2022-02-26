CREATE TABLE User(
    id int(10) unsigned NOT NULL AUTO_INCREMENT,
    email varchar(320),
    username varchar(60),
    password varchar(255),
    PRIMARY KEY(id),
    UNIQUE KEY (email)
);