<!DOCTYPE html>
<html>
<head>
    
    <title>ADD PART TO PROJECT</title>
    
</head>
<body>
    <form action="addparttoproject.php" method="POST">
    <!--Creates a drop down list-->
    part:<select name="part">
    <?php
    	$stmt = $conn->prepare("SELECT * FROM parts ORDER BY partType ASC");
    	$stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	    {
            echo('<option value = '. $row["partID"].'> '.$row["brand"]." ".$row["partName"]." ".$row["partType"]."</option>");
	    }
    ?>	
    </select>
    <label for="notes">Notes:</label><br>
    <input type="text" id="notes" name="notes"><br><br>
    <input type="submit" value="Add part to project">
    </form>
</body>
</html>
