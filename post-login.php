<?php
session_start();
include_once("connection.php");
array_map("htmlspecialchars", $_POST);
print_r($_POST);

$stmt = $conn->prepare("SELECT * FROM users WHERE username = :username;");
$stmt->bindParam(':username', $_POST['username']);
$stmt->execute();

try{
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
        $hashed = $row['password']; //hashing the password
        $attempt = $_POST['password'];
        echo $hashed, $attempt;
        if (password_verify($attempt, $hashed)) { //verifies that the password has been hashed correctly
            $_SESSION['username'] = $row["username"]; //storing session variables
            $_SESSION['userID'] = $row["userID"]; 
            $_SESSION['role'] = $row["role"];
            if (!isset($_SESSION['backURL'])) {
                $backURL = "login.php"; // Sets a default destination if no BackURL set (login.php)
            } else {
                $backURL = $_SESSION['backURL'];
            }
            unset($_SESSION['backURL']);
            echo "success";
            header('Location: index.php'); //takes you automatically to index.php
        } else {
            echo "login failed";
            header('Location: login.php');
        }
    }
}
catch(PDOException $e) {
    echo "user not found  " . $e->getMessage(); //error message to show that user does not exist
}
$conn = null;
?>
