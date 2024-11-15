<!DOCTYPE html>
<?php
session_start(); //start session
//if (!isset($_SESSION['username'])) 
//{   
//    $_SESSION['backURL'] = $_SERVER['REQUEST_URL'];
//    header("location:login.php");
//}
//echo ($_SESSION['username']." ".$_SESSION['userID'])
?>
<html>
<head>
    
    <title>ADD YOUR USER</title>
    
</head>
<body>
    <form action="adduser.php" method="POST">
    username: <input type="text" name="username"><br>
    password: <input type="password" name="password"><br>
    confirmpassword: <input type="password" name="confirmpassword"><br>

    <br>
    <!--Next 3 lines create radio buttons to select user role-->
    <input type="radio" name="role" value="user" checked> User<br>
    <input type="radio" name="role" value="admin"> Admin<br>
    <input type="submit" value="Add User">
    </form>
    <?php 
    include_once('connection.php');
    $stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
    echo($row["username"].' '.$row["role"].' '.$row["password"]."<br>");
    }
    ?>

</body>
</html>