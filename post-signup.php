<!DOCTYPE html>
<?php
include_once("connection.php");
array_map("htmlspecialchars", $_POST);
$hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT); //hashing the password
if($_POST["password"]!=$_POST["confirmpassword"]){
    echo "Error: Passwords do not match"; //error message for non matching passwords
}
else{
    try{
        $stmt = $conn->prepare("
        INSERT INTO users (username,password,role)
        VALUES (:username,:password,0)");//default role is 0
        $stmt->bindParam(':username', $_POST["username"]);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->execute();//executes SQL commands shown above, bindParams for sanitisation
        $conn=null;
        echo("submitted");
        }
        catch(PDOException $e)//PDO was set to exception in connection.php
        {
            echo "error ".$e->getMessage();
        }
}?>
<html>
    <head>
        <title>added</title>
    </head>
    <body>
        <h1>signed up successfully</h1>
        <p><a href="index.php">home</a>.</p>
    </body>
</html>
