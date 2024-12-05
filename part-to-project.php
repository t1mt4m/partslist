<!DOCTYPE html>
<html>
<head>
    
    <title>ADD PART TO PROJECT</title>
    
</head>
<body>
    <form action="addparttoproject.php" method="POST">;
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
    <!--Creates a drop down list-->
    part:<select name="part">
    <?php
    	$stmt = $conn->prepare("SELECT * FROM parts ORDER BY partType ASC");
    	$stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	    {
            echo('<option value = '. $row["partID"].'> '.$row["partName"]." ".$row["partType"]." ".$row["price"]."</option>");
	    }
    ?>	
</select>
    <input type="submit" value="Add part to project">
    </form>
</body>
</html>
