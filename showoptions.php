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

$stmt = $conn->prepare("SELECT * FROM projects WHERE projectID =:projectID");
$stmt->bindParam(':projectID', $_POST['projectID']);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    $_SESSION['projectID'] = $_POST["projectID"];
    echo $_SESSION["projectID"].' '.$row["projectName"].' '.$row["carID"]; 
//these two blocks ensure that the userID and projectID are correctly stored in session variables
}

?>	
<br>
<p>current parts to this project:</p>
<?php
$stmt = $conn->prepare("SELECT * FROM projecthasparts WHERE projectID = :projectID");
$stmt->bindParam(':projectID', $_SESSION['projectID']);
$stmt->execute();
while ($row1 = $stmt->fetch(PDO::FETCH_ASSOC))
{
    echo "projectID:".' '.$_SESSION["projectID"].' '." <br> partID: ".' '.$row1["partID"].' '."<br>".' '.$row1["notes"] ."<br>";
    $stmt2 = $conn->prepare("SELECT * FROM parts WHERE partID = :partID"); 
    $stmt2->bindParam(':partID', $row1["partID"]); 
    $stmt2->execute();
    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC))
    {  
        echo $row["partName"].' '.$row["brand"] ."<br><br>";
    }
}
?>
<br>
<a href = "add-parttoproject.php">add existing part to project</a><br>
<a href = "add-part.php">add new parts to database</a>
</form>
</body>
</html>
