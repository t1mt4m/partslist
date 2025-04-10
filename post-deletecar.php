<?php
    session_start(); 
    include_once("connection.php");
    array_map("htmlspecialchars", $_POST);
try{
    $stmt = $conn->prepare("DELETE FROM cars WHERE carID = :carID");
    $stmt->bindParam(':carID', $_POST['carID']);
    $stmt->execute();
    $conn = null;
}
catch(PDOException $e){
    echo "error".$e->getMessage();
    echo(" unsuccessful");
}
 ?>
 <html>
    <head>
        <title>deleting car</title>
    </head>
    <body>
        <h1>car deleted successfully</h1>
        <p><a href="index.php">home</a></p>
        <p><a href="deletecar.php">delete another car</a></p>
    </body>
</html>