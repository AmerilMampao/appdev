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
    password VARCHAR(255),
    accounttype VARCHAR(1),
    section VARCHAR(10),
    contact VARCHAR(16)
);

-- Insert data into the table
INSERT INTO mytbl(
    name,
    address,
    emailaddress,
    password,
    accounttype,
    section,
    contact
)
VALUES(
    'Ameril Mampao',
    'Tanauan City',
    'amerilmampao@gmail.com',
    'password123',
    'student',
    'COM221',
    '09062319874'
),(
    'Omar Ghazal',
    'Lipa City',
    'omarg@gmail.com',
    'password456',
    'student',
    'COM221',
    '09062319874'
);