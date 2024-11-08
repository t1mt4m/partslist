<!DOCTYPE html>
<?php
session_start(); //start session
//if (!isset($_SESSION['username'])) 
//{   
//    $_SESSION['backURL'] = $_SERVER['REQUEST_URL'];
//    header("Location:login.php");
//}
?>
<html>
<head>
    
    <title>ADD PROJECT</title>
    
</head>
<body>
    <form action="addproject.php" method="POST">
    projectName: <input type="text" name="projectName"><br>
    carID: <select name="carID">
        <?php
            include_once('connection.php');
            $stmt = $conn->prepare("SELECT * FROM cars ORDER BY carMake ASC");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo('<option value = '. $row["carID"].'> '. $row["carID"]." ".$row["carModel"]." ".$row["carMake"]."</option>");
            }
        ?>
        </select><br>
    userID: <select name="userID">
        <?php
            include_once('connection.php');
            $stmt = $conn->prepare("SELECT * FROM users ORDER BY userID ASC");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo('<option value = '. $row["userID"].'> '.$row["username"]."</option>");
            }
        ?>
        </select><br>
    <input type="submit" value="Add project">
    <br>
    <?php
        echo($_SESSION['username'].': '.$_SESSION['userID']);
    ?>
</body>
</html>
