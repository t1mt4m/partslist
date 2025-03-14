<!DOCTYPE html>
<?php
session_start(); //start session
if (!isset($_SESSION['username'])) 
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URL'];
    header("location:login.php");
}
echo ($_SESSION['username']." ".$_SESSION['userID'])
?>
<html lang="en">
<head>
  <title>Partslist</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href=styles.css>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right"style="margin-top:15px">
        <li><a href="projectslist.php">projects</a></li>
        <li><a href="projects.php">add project</a></li>
        <li><a href="parts.php">add parts</a></li>
        <li><a href="cars.php">add car</a></li>
        <li><a href="logout.php">log out</a></li>
        <li class="dropdown"> 
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


</body>
</html>