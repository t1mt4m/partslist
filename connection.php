<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "partslist";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected";
    }
catch(PDOException $e)
    {
        echo "failed to connect: " . $e->getMessage();
    }
?>