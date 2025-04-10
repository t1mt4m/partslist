<?php
session_start();
if(isset($_SESSION['name']))
{
    unset($_SESSION['name']);
}
?>
<!DOCTYPE html>
<a href="login.php">login</a>
