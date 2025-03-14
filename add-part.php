<!DOCTYPE html>
<html>
<head>
    
    <title>ADD YOUR PART</title>
    
</head>
<body>
current parts: 
    <br>
    <?php
        include_once('connection.php');
        $stmt = $conn->prepare("SELECT * FROM parts ORDER BY brand ASC");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
        echo('<option value = '. $row["partID"].'> '.$row["partName"]." ".$row["partType"]." ".$row["brand"]." ".$row["carID"]." ".$row["price"]."</option>");
        }
    ?> 
    <br>
    <br>
    <form action="post-part.php" method="POST">
    partName: <input type="text" name="partName"><br>
    partType: <input type="text" name="partType"><br>
    brand: <input type="text" name="brand"><br>
    compatible car: <select name="carID"><br>
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
    price: <input type="float" name="price"><br>
    
    <input type="submit" value="Add part">
</body>
</html>