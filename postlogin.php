<?php
session_start();
include_once("connection.php");
array_map("htmlspecialchars", $_POST);
print_r($_POST);

$stmt = $conn->prepare("SELECT * FROM users WHERE username = :username;");
$stmt->bindParam(':username', $_POST['username']);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
    $hashed = $row['password'];
    $attempt = $_POST['password'];
    echo $hashed, $attempt;
    if (password_verify($attempt, $hashed)) {
         $_SESSION['username'] = $row["username"];
         $_SESSION['userID'] = $row["userID"]; 
        if (!isset($_SESSION['backURL'])) {
            $backURL = "login.php"; // Sets a default destination if no BackURL set (login.php)
        } else {
            $backURL = $_SESSION['backURL'];
        }
        unset($_SESSION['backURL']);
        header('Location: users.php');
        echo "yes";
    } else {
        //header('Location: login.php');
        echo "no";
    }
}
echo "  even worse";
$conn = null;
?>
