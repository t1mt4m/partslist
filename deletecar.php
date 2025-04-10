<?php
session_start(); //start session
if (!isset($_SESSION['username'])) 
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URL'];
    header("location:login.php");
}

if (($_SESSION['role']) != 1)
{   
    header("location:index.php");
}
echo ($_SESSION['username']." ".$_SESSION['userID'])
?>
<html>
<head>
    
    <title>DELETE CAR</title>
    
</head>
<body>
    <form action="post-deletecar.php" method="POST">
    carID: <select name="carID">
        <?php
            include_once('connection.php');
            $stmt = $conn->prepare("SELECT * FROM cars ORDER BY carMake ASC");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo('<option value = '. $row["carID"].'> '.$row["carMake"]." ".$row["carModel"]." ".$row["carYear"]."</option>");
            }
        ?>
    </select><br>
    <br>
    <h1>THIS ACTION CANNOT BE UNDONE</h1><br>
    <input type="submit" value="delete car">
    <br>
    <?php
        echo($_SESSION['username'].': '.$_SESSION['userID']);
    ?>
</body>
</html>