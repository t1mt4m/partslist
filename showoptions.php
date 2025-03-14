<!DOCTYPE html>
<html>
<head>
    <title>project options</title>
</head>
<body>
<?php
session_start(); //start session
if (!isset($_SESSION['username'])) 
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URL'];
    header("Location:login.php");
}
//echo ($_SESSION['username']." ".$_SESSION['userID']);



include_once('connection.php');
$stmt = $conn->prepare("SELECT * FROM users WHERE userID =:selecteduser");
$stmt->bindParam(':selecteduser', $_SESSION['userID']);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
echo($row["userID"].' '.$row["username"]."<br>");
}

$stmt = $conn->prepare("SELECT * FROM projects WHERE userID=:selecteduser");
$stmt->bindParam(':selecteduser', $_SESSION['userID']);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    $_SESSION['projectID'] = $row["projectID"];
echo $_SESSION['projectID'].' '.$row["projectName"].' '.$row['carID'] ;
}
?>	
<br>
<a href = "add-parttoproject.php">add existing part to project</a><br>
<a href = "add-part.php">add new parts to database</a>
</form>
</body>
</html>
