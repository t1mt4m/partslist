<?php
session_start(); 
include_once("connection.php");
array_map("htmlspecialchars", $_POST);
try{
    $stmt = $conn->prepare("
    INSERT INTO projectHasParts (projectID, partID, notes)
    VALUES (:projectID, :partID, :notes)");
    $stmt->bindParam(':projectID', $_SESSION['projectID']);
    $stmt->bindParam(':partID', $_POST['partID']);
    $stmt->bindParam(':notes', $_POST['notes']);
    $stmt->execute();
    $conn=null;
}
catch(PDOException $e){
        echo "error".$e->getMessage();
    }
echo("submitted");
?>