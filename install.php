<?php
include_once("connection.php"); //connect to database

// create tables

$stmt=$conn->prepare("DROP TABLE IF EXISTS cars;
CREATE TABLE cars (
  carID int(4) AUTO_INCREMENT PRIMARY KEY,
  carMake varchar(64) NOT NULL,
  carModel varchar(64) NOT NULL,
  carYear int(4) NOT NULL,
  carPrice int(32) NOT NULL
);");
$stmt->execute();
$stmt=$conn->prepare("DROP TABLE IF EXISTS parts;
CREATE TABLE parts (
  partID int(4) AUTO_INCREMENT PRIMARY KEY,
  brand varchar(128) NOT NULL,
  partName varchar(128) NOT NULL,
  price float NOT NULL,
  partType varchar(32) NOT NULL,
  carID int(4) NOT NULL
);");
$stmt->execute();
$stmt=$conn->prepare("DROP TABLE IF EXISTS projecthasparts;
CREATE TABLE projecthasparts (
  projectID int(8) NOT NULL,
  partID int(4) NOT NULL,
  notes varchar(256) NOT NULL,
  PRIMARY KEY (projectID, partID)
);");
$stmt->execute();
$stmt=$conn->prepare("DROP TABLE IF EXISTS projects;
CREATE TABLE projects (
  projectID int(4) AUTO_INCREMENT PRIMARY KEY,
  userID int(8) NOT NULL,
  projectName varchar(32) NOT NULL,
  carID int(4) NOT NULL
);");
$stmt->execute();
$stmt=$conn->prepare("DROP TABLE IF EXISTS users;
CREATE TABLE users (
  userID int(8) AUTO_INCREMENT PRIMARY KEY,
  username varchar(32) NOT NULL,
  password varchar(256) NOT NULL,
  role tinyint(1) NOT NULL
);");
$stmt->execute();

// insert data into database tables, table references first then actual per user data after

$hashed_password = password_hash("password", PASSWORD_DEFAULT);
$stmt=$conn->prepare("
INSERT INTO users (username, password, role) VALUES 
('Strc1234', :pw, 0), 
('realgilly', :pw, 0),
('racerboy69', :pw, 0)
('HesDoingItSideways', :pw, 1);");
$stmt->bindParam(':pw', $hashed_password);
$stmt->execute();

$stmt=$conn->prepare("
INSERT INTO cars (carMake, carModel, carYear, carPrice) VALUES
('Mazda', 'MX-5 Miata', 1995, 2000),
('Toyota', 'Corolla', 2021, 35000),
('Tesla', 'Model S', 2015, 20000)
('Ford', 'Fiesta', 2013, 3000)
('Volvo', 'XC90', 2008, 6000;");
$stmt->execute();

$conn=null; //close connection
?>