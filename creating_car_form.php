<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental</title>
</head>
<body>
<h1>You have successfully logged in</h1>

<div>
	<a href="display_car_form.php"><input type="button" id="btn1"  value="Rent a Car"></a>
	<a href="login.php"><input type="button" id="btn1" onclick="addA.php" value="Logout"></a>
</div>

<?php
$host = "localhost";
$port = 3306;
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($host, $port, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}



// Creating the tables
$sql = "CREATE TABLE cars (name VARCHAR(50), model VARCHAR(50))";
if ($conn->query($sql) === TRUE) {
} else {
//table already exists
}

$conn->close();

?>

    
</body>
</html>