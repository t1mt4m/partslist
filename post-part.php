<!DOCTYPE html>
<?php
include_once("connection.php");
array_map("htmlspecialchars", $_POST);


    try{
    $stmt = $conn->prepare("
    INSERT INTO parts (partName, price, partType, brand, carID)
    VALUES (:partName, :price, :partType, :brand, :carID)");
    $stmt->bindParam(':partName', $_POST['partName']);
    $stmt->bindParam(':price', $_POST['price']);
    $stmt->bindParam(':partType', $_POST['partType']);
    $stmt->bindParam(':brand', $_POST['brand']);
    $stmt->bindParam(':carID', $_POST['carID']);
    $stmt->execute();
    $conn=null;
    }
    catch(PDOException $e)
    {
        echo "error".$e->getMessage();
    }
echo("submitted");
?>
<html>
    <head>
        <title>part added</title>
    </head>
    <body>
        <h1>part added successfully</h1>
        <p>
            <a href="add-part.php">add another part</a><br>
            <a href="index.php">home</a>

        </p>
    </body>
</html>