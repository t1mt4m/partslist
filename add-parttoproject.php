<!DOCTYPE html>
<html>
<head>
    
    <title>ADD PART TO PROJECT</title>
    
</head>
<body>
    <form action="post-parttoproject.php" method="POST">
    <!--Creates a drop down list-->
    partID:<select name="partID"><br>
    <?php
        include_once('connection.php');
    	$stmt = $conn->prepare("SELECT * FROM parts ORDER BY partType ASC");
    	$stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	    {
            echo('<option value = '. $row["partID"].'> '.$row["brand"]." ".$row["partName"]." ".$row["partType"]."</option>");
	    }
    ?>	
    </select><br>
    notes: <input type="text" name="notes"><br>
    <input type="submit" value="Add part to project">
    </form>
</body>
</html>
