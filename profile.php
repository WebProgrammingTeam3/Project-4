<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>


    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
        }
        tr:nth-child(even){background-color: #a0a0a0}
        tr:nth-child(odd){background-color: #ffffff}
        tr:nth-child(1){font-weight: bold;}
	</style>
</head>
<body>

<?php
	
$host = "localhost";
$port = 3306;
$username = "rsalter2";
$password = "rsalter2";
$dbname = "rsalter2";

// Create connection
$conn = new mysqli($host, $port, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT artist, name, genre, rdate FROM albums";
$result = $conn->query($sql);
echo "<h3>Your Cars</h3>";
if ($result->num_rows > 0) {
     // output data of each row
	echo "<table><tr><th>Artist</th><th>Name</th><th>Genre</th><th>Model</th></tr>";
     while($row = $result->fetch_assoc()) {
		 $name=$row["name"];
		 $model=$row["model"];

         echo "<tr><td>".$art."</td><td>".$name."</td><td>".$genre."</td><td>".$rdate."</td></tr>";
     }
	 echo "</table>";
} else {
     echo "0 results";
}
 $conn->close();

?>

    <div>
        <a href="creating_car_form.php"><input type="button" id="btn1" value="Add new Car"></a>
        <a href="login.php"><input type="button" id="btn1" onclick="addA.php" value="Logout"></a>
	</div>


    
</body>
</html>
