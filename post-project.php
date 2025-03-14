<!DOCTYPE html>
<?php
session_start(); 
include_once("connection.php");
array_map("htmlspecialchars", $_POST);
print_r($_POST);
echo($_SESSION['username']." ".$_SESSION['userID']);
try{
    $stmt = $conn->prepare("
    INSERT INTO projects (projectID, projectName, carID, userID)
    VALUES (NULL, :projectName, :carID, :userID)");
    $stmt->bindParam(':projectName', $_POST['projectName']);
    $stmt->bindParam(':carID', $_POST['carID']);
    $stmt->bindParam(':userID', $_SESSION['userID']);
    $stmt->execute();
    $conn=null;
}
catch(PDOException $e){
        echo "error".$e->getMessage();
    }
echo("submitted");
?>
<html>
    <head>
        <title>added</title>
    </head>
    <body>
        <h1>added successfully</h1>
        <p>
            <a href="index.php">back</a> <br>
            <a href="showoptions.php">view projects</a>
        </p>

    </body>
</html>