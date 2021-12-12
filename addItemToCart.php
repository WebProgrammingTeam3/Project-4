<!doctype html>

<html>

<head lang="en">
	<meta charset="UTF-8">
	<title>Adding Item To Cart</title>
</head>

<body>
	<div>
<?php
$servername = "localhost";
$username = "rsalter2";
$password = "rsalter2";
$dbname = "rsalter2";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$name=$_POST["artist1"];

$sql = "INSERT INTO Cart (itemid)
VALUES ('$name')";

if ($conn->query($sql) === TRUE) {
    echo "New item successfully saved";
} else {
    echo "Error: New item failed to be saved" . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
	<a href="displayTable.php"><input type="button" id="btn1" value="OK"></a>
	</div>
</body>

</html>
