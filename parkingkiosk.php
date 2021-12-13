<!DOCTYPE html>
<html>
<head>
	<title>Pre-Pay Parking</title>
	<link rel="stylesheet" type="text/css" href="prepay.css">
</head>
<body>


<div class="head"> <p><h2 id="banner">Parking Kiosk</h2><a href="login.php">Rental Cars</a>	| <a href="parkingkiosk.php">Reserve Parking</a></p>
</div>

	
<div id="mainPrepay">
	<h1>Welcome to the Pre-Paid Parking Kiosk</h1><br>	<p>Book the best Atlanta parking near all of your favorite destinations with the help of our Kiosk</p>
	<p>With so many sights to see, you won't waste a minute searching for parking, with our great rates and availability offered throughout the city.</p><br>
	<p>Need to Book a Rental Car?<br>We recommend: <a href="login.php" class="inline"><button>Car Rental</button></a></p>
	<a href="parkingform.php"><input type="button" id="button" value="Reserve Your Space"></a>

<?php
$host = 'localhost';
$username = 'mhosein2';
$password = 'mhosein2';
$dbname = 'mhosein2';

$connect = mysqli_connect($host, $username, $password, $dbname);

if ($connect->connect_error) {
	die("Connection failed: " . $connect->connect_error);
}


$sql = "DROP TABLE IF EXISTS parking";
if ($connect->query($sql) === TRUE) {
} else {
	echo "Error removing table: " . $connect->error;
}

$sql = "CREATE TABLE IF NOT EXISTS `parking` (id INT NOT NULL PRIMARY KEY, status VARCHAR(10) NOT NULL)";
if ($connect->query($sql) === TRUE) {
} else {
	echo "Error creating table: " . $connect->error;
}

$sql = "DROP TABLE IF EXISTS checkout";
if ($connect->query($sql) === TRUE) {
} else {
	echo "Error removing table: " . $connect->error;
}

$sql = "CREATE TABLE IF NOT EXISTS checkout (id MEDIUMINT NOT NULL AUTO_INCREMENT, ctype VARCHAR(10) NOT NULL, timef VARCHAR(30) NOT NULL, vip VARCHAR(30) NOT NULL, price INT(5) NOT  NULL, ordNum INT(5) NOT NULL, PRIMARY KEY (id))";

if ($connect->query($sql) === TRUE) {
} else {
	echo "Error creating table: " . $connect->error;
}


$connect->close();
?>
	</div>

</body>
</html>
