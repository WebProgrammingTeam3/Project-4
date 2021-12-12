<!DOCTYPE html>
<html>
<head>
	<title>Confirmation Page</title>
	<link rel="stylesheet" type="text/css" href="checkout.css">
</head>
<body>
<div class="head"> <p><h2 id="banner">Parking Kiosk</h2><a href="login.php">Rental Cars</a>	| <a href="parkingkiosk.php">Reserve Parking</a></p>
</div>

<div id="checkoutBox">


<?php

$name = $_POST['name'];

if(isset($_POST['submit'])){
	echo "<h3> Thank you for your service " .$name. "</h3>";
	echo "<p> Your payment has been proccessed succesfully. A summary of your transaction can be found below:</p>";
}

$host = 'localhost';
$username = 'mhosein2';
$password = 'mhosein2';
$dbname = 'mhosein2';

$connect = mysqli_connect($host, $username, $password, $dbname);

if ($connect->connect_error) {
	die("Connection failed: " . $connect->connect_error);
}


//ctype, timef, vip, price, ordNum
$result = mysqli_query($connect, "SELECT * FROM checkout ORDER BY id DESC LIMIT 1");
 $row = mysqli_fetch_assoc($result);
echo "<h3> Space ID#: " .$row['ordNum']. "</h3>";

 echo "<p> Car Type: " .$row['ctype']. "</p>";

 echo "<p> Time Frame: " . $row['timef'] . "</p>";

 echo "<p> Package: " . $row['vip'] . "</p>";

 echo "<p> Total amount charged: $" . $row['price']. ".00 per day</p>";

echo "<p id='contact'>For any questions/concerns, please contact us at parkingkiosk@pk.com</p>"


?>

<a href="parkingkiosk.php"><input type="button" value="Return to Home"></a>

</div>

</body>
</html>