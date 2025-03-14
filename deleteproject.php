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