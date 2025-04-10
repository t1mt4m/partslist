
<!DOCTYPE html>
<?php
session_start(); 
include_once("connection.php");
array_map("htmlspecialchars", $_POST);
try{
    $stmt = $conn->prepare("
    INSERT INTO cars (carMake, carModel, carYear, carPrice)
    VALUES (:carMake, :carModel, :carYear, :carPrice)");
    $stmt->bindParam(':carMake', $_POST['carMake']);
    $stmt->bindParam(':carModel', $_POST['carModel']);
    $stmt->bindParam(':carYear', $_POST['carYear']);
    $stmt->bindParam(':carPrice', $_POST['carPrice']);
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
        <title>adding car</title>
    </head>
    <body>
        <h1>car added successfully</h1>
        <p><a href="index.php">home</a>.</p>
    </body>
</html>

        