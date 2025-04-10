<?php
    session_start(); 
    include_once("connection.php");
    array_map("htmlspecialchars", $_POST);
try{
    $stmt = $conn->prepare("DELETE FROM projects WHERE projectID = :projectID");
    $stmt = $conn->prepare("DELETE FROM projecthasparts WHERE projectID = :projectID");
    $stmt->bindParam(':projectID', $_POST['projectID']);
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
        <title>deleting project</title>
    </head>
    <body>
        <h1>project deleted successfully</h1>
        <p><a href="index.php">home</a></p>
        <p><a href="deleteproject.php">delete another part</a></p>
    </body>
</html>