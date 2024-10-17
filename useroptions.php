<!DOCTYPE html>
<html>
<head>
    <title>User Options</title>
</head>
<body>

<form action="showoptions.php"  method = "post">

  <!--Creates a drop down list-->
  user:<select username="Userame">
  <?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM users WHERE role=0 ORDER BY username ASC");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo('<option value = '. $row["userID"].'> '.$row["username"]." ".$row["role"]."</option>");
	}
   ?>	
</select>

  <input type="submit" value="View options">
</form>

</body>
</html>