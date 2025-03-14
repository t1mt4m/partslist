<!DOCTYPE html>
<html>
<head>
    
    <title>ADD YOUR CAR</title>
    
</head>
<body>
    current cars: 
    <br>
    <?php
        include_once('connection.php');
        $stmt = $conn->prepare("SELECT * FROM cars ORDER BY carMake ASC");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
        echo('<option value = '. $row["carID"].'> '.$row["carMake"]." ".$row["carModel"]." ".$row["carYear"]."</option>");
        }
    ?> 
    <br>
    <br>
    <form action="post-car.php" method="POST">
    make: <input type="text" name="carMake"><br>
    model: <input type="text" name="carModel"><br>
    year: <input type="integer" name="carYear"><br>
    price: <input type="integer" name="carPrice"><br>
    <input type="submit" value="Add car">
    </form>
</body>
</html>