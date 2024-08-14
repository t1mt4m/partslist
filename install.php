<?php
include_once("connection.php");
$stmt=$conn->prepare("DROP TABLE IF EXISTS ")