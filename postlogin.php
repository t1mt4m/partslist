<?php
session_start();
include_once("connection.php");
array_map("htmlspecialchars", $_POST);
print_r($_POST);
$stmt = $conn->prepare("SELECT * FROM users;");
$stmt->bindParam(':username', $_POST['Username']);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{ 
    $hashed= $row['password'];
    $attempt= $_POST['password'];
    if(password_verify($attempt,$hashed)){
        $_SESSION['name']=$row["usernamename"];
        if (!isset($_SESSION['backURL'])){
            $backURL= "/login.php"; //Sets a default destination if no BackURL set (login.php)
        }else{
            $backURL=$_SESSION['backURL'];
        }
        unset($_SESSION['backURL']);
        header('Location: ' . $backURL);
    }else{
        header('Location: login.php');
    }
}
$conn=null;
?>
