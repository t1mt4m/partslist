<?php
include_once("connection.php");
array_map("htmlspecialchars", $_POST);


    try{
    $stmt = $conn->prepare("
    INSERT INTO parts (partName, price, partType, brand)
    VALUES (:partName, :price, :partType, :brand)");
    $stmt->bindParam(':partName', $_POST['partName']);
    $stmt->bindParam(':price', $_POST['price']);
    $stmt->bindParam(':partType', $_POST['partType']);
    $stmt->bindParam(':brand', $_POST['brand']);
    $stmt->execute();
    $conn=null;
    }
    catch(PDOException $e)
    {
        echo "error".$e->getMessage();
    }
echo("submitted");
?>