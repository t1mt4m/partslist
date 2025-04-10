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
    
    <title>DELETE PROJECT</title>
    
</head>
<body>
    <form action="post-deleteproject.php" method="POST">
    projectID: <select name="projectID">
        <?php
            include_once('connection.php');
            $stmt = $conn->prepare("SELECT * FROM projects ORDER BY userID ASC");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo('<option value = '. $row["projectID"].'> '.$row["userID"].' '.$row["projectName"].' '.$row["carID"].'/option>');
            }
        ?>
    </select><br>
    <br>
    <h1>THIS ACTION CANNOT BE UNDONE</h1><br>
    <input type="submit" value="delete project">
    <br>
    <?php
        echo($_SESSION['username'].': '.$_SESSION['userID']);
    ?>
</body>
</html>