<!DOCTYPE html>
<html>
<head>
    
    <title>ADD YOUR PART</title>
    
</head>
<body>
    <form action="addpart.php" method="POST">
    partName: <input type="text" name="partName"><br>
    price: <input type="float" name="price"><br>
    partType: <input type="text" name="partType"><br>
    brand: <input type="text" name="brand"><br>
    compatible car: <select name="carID">
        <?php
            include_once('connection.php');
            $stmt = $conn->prepare("SELECT * FROM cars ORDER BY carMake ASC");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo('<option value = '. $row["carID"].'> '.$row["carMake"]." ".$row["carModel"]." ".$row["carYear"]."</option>");
            }
        ?>
        </select><br>
    
    <input type="submit" value="Add part">
</body>
</html>