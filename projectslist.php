<!DOCTYPE html>
<html>
<head>
    <title>projectslist</title>
</head>
<body>

<form action="showoptions.php"  method = "post">

<?php //make if statement for when there are no projects (addproject redirect?)
?>

  <!--Creates a drop down list-->
	project: <select name="project">
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

</body>
</html>

