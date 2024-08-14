<?php
include_once("connection.php");
#create tables
$stmt=$conn->prepare("DROP TABLE IF EXISTS cars;
CREATE TABLE `cars` (
  `cars` varchar(128) NOT NULL
);
CREATE TABLE `parts` (
  `partID` int(4) NOT NULL,
  `partName` varchar(128) NOT NULL,
  `price` float NOT NULL,
  `partType` smallint(3) NOT NULL
);
CREATE TABLE `parttype` (
  `partTypeNo` smallint(3) NOT NULL,
  `partType` varchar(64) NOT NULL
);
CREATE TABLE `projecthasparts` (
  `projectID` int(8) NOT NULL,
  `partID` int(4) NOT NULL,
  `fitted` tinyint(1) NOT NULL,
  `inShop` tinyint(1) NOT NULL,
  `works` tinyint(1) NOT NULL,
  `notes` varchar(256) NOT NULL
);
CREATE TABLE `projects` (
  `projectID` int(4) NOT NULL,
  `userID` int(8) NOT NULL,
  `projectName` varchar(32) NOT NULL,
  `projectHost` varchar(32) NOT NULL
);
CREATE TABLE `users` (
  `userID` int(8) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
);
")