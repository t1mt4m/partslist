<?php
session_start(); 
if (!isset($_SESSION['name']))
{   
    header("Location:login.php");
}

include_once("connection.php");
array_map("htmlspecialchars", $_POST);
switch($_POST["role"]){
	case "user":
		$role=0;
		break;
	case "Admin":
		$role=1;
		break;
}
$hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
if($_POST["password"]!=$_POST["confirmpassword"]){
    echo " but Error: Passwords do not match";
}
else{
    try{
        $stmt = $conn->prepare("
        INSERT INTO users (username,password,role)
        VALUES (:username,:password,:role)");
        $stmt->bindParam(':username', $_POST["username"]);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':role', $role);
        $stmt->execute();
        $conn=null;
        }
        catch(PDOException $e)
        {
            echo "error".$e->getMessage();
        }
    echo("submitted");
}?>