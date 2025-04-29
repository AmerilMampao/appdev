CREATE DATABASE myinfo

CREATE TABLE mytbl(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    address VARCHAR(255),
    emailaddress VARCHAR(255),
    section VARCHAR(255),
    contact VARCHAR(16)
);

INSERT INTO `mytbl` (`name`, `address`, `emailaddress`, `section`, `contact`) 
VALUES ('Ameril Mampao', 'Tanauan City', 'amerilmampao@gmail.com', 'COM221', '09062319874'), 
('Omar Ghazal', 'Lipa City', 'omarg@gmail.com', 'COM221', '09062319874');