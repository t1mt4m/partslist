<?php
include_once("connection.php");
#create tables
$stmt=$conn->prepare("DROP TABLE IF EXISTS cars;
CREATE TABLE `cars` (
  `carID` int(4) NOT NULL,
  `carMake` varchar(64) NOT NULL,
  `carModel` int(64) NOT NULL,
  `carYear` int(4) NOT NULL,
  `carPrice` int(32) NOT NULL
);")
$stmt->execute();
$stmt=$conn->prepare("DROP TABLE IF EXISTS parts;
CREATE TABLE `parts` (
  `partID` int(4) NOT NULL,
  `partName` varchar(128) NOT NULL,
  `price` float NOT NULL,
  `partType` varchar(32) NOT NULL
);")
$stmt->execute();
$stmt=$conn->prepare("DROP TABLE IF EXISTS parttype;
CREATE TABLE `parttype` (
  `partTypeNo` smallint(3) NOT NULL,
  `partType` varchar(64) NOT NULL
);")
$stmt->execute();
$stmt=$conn->prepare("DROP TABLE IF EXISTS projecthasparts;
CREATE TABLE `projecthasparts` (
  `projectID` int(8) NOT NULL,
  `partID` int(4) NOT NULL,
  `fitted` tinyint(1) NOT NULL,
  `inShop` tinyint(1) NOT NULL,
  `works` tinyint(1) NOT NULL,
  `notes` varchar(256) NOT NULL
);")
$stmt=$conn->prepare("DROP TABLE IF EXISTS project;
CREATE TABLE `project` (
  `projectID` int(4) NOT NULL,
  `userID` int(8) NOT NULL,
  `projectName` varchar(32) NOT NULL,
  `projectHost` varchar(32) NOT NULL
);")
$stmt->execute();
$stmt=$conn->prepare("DROP TABLE IF EXISTS users
CREATE TABLE `users` (
  `userID` int(8) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` tinyint(4) NOT NULL
);
")
$stmt->execute();
?>