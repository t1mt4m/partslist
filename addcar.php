<?php
include_once("connection.php");
array_map("htmlspecialchars", $_POST);


    try{
    $stmt = $conn->prepare("
    INSERT INTO cars (carMk)
    VALUES (:carMake, :carModel, :carYear)");
    $stmt->bindParam(':carModel', $_POST['carModel']);
    $stmt->bindParam(':carYear', $_POST['carYear']);
    $stmt->bindParam(':carModel', $_POST['carModel']):
    $stmt->execute();
    $conn=null;
    }
    catch(PDOException $e)
    {
        echo "error".$e->getMessage();
    }
echo("submitted");
?>