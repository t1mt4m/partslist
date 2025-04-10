<!DOCTYPE html>
<html>
<head>
    <title>projectslist</title>
</head>
<body>

<form action="showoptions.php"  method = "POST">

<?php 
//make if statement for when there are no projects (addproject redirect?)
?>

  <!--Creates a drop down list-->
	projectID: <select name="projectID">
    <?php
        include_once('connection.php');
        $stmt = $conn->prepare("SELECT * FROM projects ORDER BY projectID ASC");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            echo('<option value = '. $row["projectID"].'> '.$row["projectName"]."</option>");
        }
    ?>
    </select>	
</select>

  <input type="submit" value="View options">
</form>

<a href="projects.php">add project</a>

</body>
</html>

