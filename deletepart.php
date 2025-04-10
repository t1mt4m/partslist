<?php
session_start(); //start session
if (!isset($_SESSION['username'])) 
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URL'];
    header("location:login.php");
}

if (($_SESSION['role']) != 1) //this verifies the user role; if the user is not admin, they are returned to the homepage
{   
    header("location:index.php");
}
echo ($_SESSION['username']." ".$_SESSION['userID'])
?>
<html>
<head>
    
    <title>DELETE PART</title>
    
</head>
<body>
    <form action="post-deletepart.php" method="POST">
    partID: <select name="partID">
        <?php
            include_once('connection.php');
            $stmt = $conn->prepare("SELECT * FROM parts ORDER BY brand ASC");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo('<option value = '. $row["partID"].'> '.$row["brand"].' '.$row["partName"].' '.$row["price"].' '.$row["partType"].'/option>');
            }
        ?>
    </select><br>
    <br>
    <h1>THIS ACTION CANNOT BE UNDONE</h1><br>
    <input type="submit" value="delete part">
    <br>
    <?php
        echo($_SESSION['username'].': '.$_SESSION['userID']);
    ?>
</body>
</html>