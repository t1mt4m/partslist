<!DOCTYPE html>
<html>
<head>
    <title>User Options</title>
</head>
<body>
<?php
include_once('connection.php');
$stmt = $conn->prepare("SELECT * FROM users WHERE userID =:selecteduser");
$stmt->bindParam(':selecteduser', $_POST["Username"]);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
echo($row["userID"].' '.$row["username"]."<br>");
}

$stmt = $conn->prepare("SELECT * FROM projects WHERE userID=:selecteduser");
$stmt->bindParam(':selecteduser', $_POST["Username"]);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
echo($row["projectID"]."<br>");
}
?>	
</form>
</body>
</html>
