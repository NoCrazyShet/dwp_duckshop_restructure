DROP DATABASE IF EXISTS duckshopdb;
CREATE DATABASE duckshopdb;
USE duckshopdb;

CREATE TABLE admin (
userID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
eMail varchar(60),
password varchar(60),
accessLevel int(1)
);

CREATE TABLE customer (
customerID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
eMail varchar(60),
firstName varchar(30),
lastName varchar(30),
orderHistory varchar(300),
password varchar(30),
cardHolderName varchar(200),
cardNumber int(30),
CVC int(3),
expirationDate int(8)
);

CREATE TABLE shipper (
shipperID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
shipperName varchar(50),
phone int(20)
);

CREATE TABLE employee (
employeeID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
phone int(20),
eMail varchar(60),
firstName varchar(30),
lastName varchar(30)
);

CREATE TABLE customerOrders (
orderID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
shipperID int,
customerID int,
employeeID int,
orderDateDay int(2),
orderDateMonth int(2),
orderDateYear int(4),
orderComment varchar(255),
FOREIGN KEY (shipperID) REFERENCES shipper (shipperID),
FOREIGN KEY (customerID) REFERENCES customer (customerID),
FOREIGN KEY (employeeID) REFERENCES employee (employeeID)
);

CREATE TABLE orderHistory (
orderHistoryID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
customerID int(10),
orderID int,
FOREIGN KEY (customerID) REFERENCES customer (customerID),
FOREIGN KEY (orderID) REFERENCES customerOrders (orderID)
);

CREATE TABLE productCategory (
categoryID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
categoryName VARCHAR (60)
);

CREATE TABLE product (
productID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
categoryID int,
productRating varchar(5),
productIMG varchar(100),
productDescription varchar(300),
productStock varchar (10),
productPrice int(10),
productName varchar(100),
FOREIGN KEY (categoryID) REFERENCES productCategory (categoryID)
);

CREATE TABLE orderInfo (
orderInfoID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
orderID int,
productID int,
quantity int(2),
FOREIGN KEY (orderID) REFERENCES customerOrders (orderID),
FOREIGN KEY (productID) REFERENCES product (productID)
);

CREATE TABLE review (
reviewID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
productID int,
reviewText varchar(300),
title varchar(100),
rating varchar(5),
FOREIGN KEY (productID) REFERENCES product (productID)
);

CREATE TABLE companyInfo (
CVR int(10) NOT NULL PRIMARY KEY,
logo varchar(100),
logoText varchar(300),
aboutUs varchar(500),
zipCode int(4),
street varchar(30),
streetNumber int(3),
phone int(20),
eMail varchar(60)
);

CREATE TABLE companyContact (
contactID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
openHours varchar(20),
openDay varchar(200),
CVR int(10),
FOREIGN KEY (CVR) REFERENCES companyInfo (CVR)
);

CREATE TABLE news (
articleID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
articleText varchar (10000),
articleTitle varchar(100),
articleIMG VARCHAR(100)
);

CREATE TABLE comments (
commentID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
articleID int,
commentTitle varchar(100),
commentText varchar(10000),
FOREIGN KEY (articleID) REFERENCES news (articleID)
);

CREATE TABLE customerContact (
full_name varchar(50),
email varchar (100),
message VARCHAR (300),
code_confirmation VARCHAR (300)
);

INSERT INTO admin VALUES(1, 'duranovic46@gmail.com', '$2y$15$Q.rE3kqj3kpbH5AiVWP5bebiT5v3FE9ghsjMXT9kLY00ydtemO/I6', 1);
INSERT INTO admin VALUES(2, 'j.pettit51@gmail.com', '$2y$15$Q.rE3kqj3kpbH5AiVWP5bebiT5v3FE9ghsjMXT9kLY00ydtemO/I6', 1);




