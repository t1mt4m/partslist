<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "partslist";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "connected";
    }
    catch(PDOEception $e)
    {
        echo "failed to connect: " . $e->getMessage();
    }
?>