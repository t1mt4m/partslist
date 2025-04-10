<?php
    session_start(); 
    include_once("connection.php");
    array_map("htmlspecialchars", $_POST);
try{
    $stmt = $conn->prepare("DELETE FROM parts WHERE partID = :partID");
    $stmt->bindParam(':partID', $_POST['partID']);
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
        <title>deleting part</title>
    </head>
    <body>
        <h1>part deleted successfully</h1>
        <p><a href="index.php">home</a></p>
        <p><a href="deletepart.php">delete another part</a></p>
    </body>
</html>