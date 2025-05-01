CREATE DATABASE myinfo

CREATE TABLE mytbl(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    address VARCHAR(255),
    emailaddress VARCHAR(255),
    password VARCHAR(255),
    accounttype VARCHAR(255),
    section VARCHAR(1),
    contact VARCHAR(16)
);

INSERT INTO `mytbl` (`name`, `address`, `emailaddress`, `section`, `contact`) 
VALUES ('Ameril Mampao', 'Tanauan City', 'amerilmampao@gmail.com', 'COM221', '09062319874'), 
('Omar Ghazal', 'Lipa City', 'omarg@gmail.com', 'COM221', '09062319874');

-- this is for the with log in na pero for now wala pa

-- Create the database
CREATE DATABASE myinfo;

-- Create the table
CREATE TABLE mytbl (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    address VARCHAR(255),
    emailaddress VARCHAR(255),
    section VARCHAR(10),
    contact VARCHAR(16),
    password VARCHAR(255),
    accounttype VARCHAR(1)
);

-- Insert data into the table
INSERT INTO mytbl(
    name,
    address,
    emailaddress,
    section,
    contact,
    password,
    accounttype
)
VALUES(
    'Ameril Mampao',
    'Tanauan City',
    'amerilmampao@gmail.com',
    'COM221',
    '09062319874',
    'student',
    '2'
),(
    'Poging Admin',
    'Lipa City',
    'omarg@gmail.com',
    'COM221',
    '09062319874',
    'admin123',
    '1'
);

INSERT INTO `mytbl`(
    `id`,
    `name`,
    `address`,
    `emailaddress`,
    `password`,
    `account_type`,
    `section`,
    `contact`
)
VALUES(
    NULL,
    'Poging Admin',
    'satabitabilang',
    'admin@pogi.com',
    'admin',
    '1',
    'pogi221',
    '09062319879'
);