<?php
session_start(); 
include_once("connection.php");
array_map("htmlspecialchars", $_POST);
try{
    $stmt = $conn->prepare("
    INSERT INTO projectHasParts (projectID, userID, carID,)
    VALUES (:projectID, :userID, :carID)");
    $stmt->bindParam(':projectID', $_POST['projectID']);
    $stmt->bindParam(':userID', $_SESSION['userID']);
    $stmt->bindParam(':carID', $_POST['carID']);

    $stmt->execute();
    $conn=null;
}
catch(PDOException $e){
        echo "error".$e->getMessage();
    }
echo("submitted");
?>