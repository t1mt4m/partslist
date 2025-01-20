<?php
session_start(); 
include_once("connection.php");
array_map("htmlspecialchars", $_POST);
try{
    $stmt = $conn->prepare("
    INSERT INTO projectHasParts (projectID, partID)
    VALUES (:projectID, :partID)");
    $stmt->bindParam(':projectID', $_SESSION['projectID']);
    $stmt->bindParam(':partID', $_POST['partID']);
    $stmt->execute();
    $conn=null;
}
catch(PDOException $e){
        echo "error".$e->getMessage();
    }
echo("submitted");
?>