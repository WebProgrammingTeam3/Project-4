<!DOCTYPE html>
<html>
<head>
	<title>Pre-Paid Parking</title>
	<link rel="stylesheet" type="text/css" href="prepay.css">
</head>
<body>

<div class="head"> <p><h2 id="banner">Parking Kiosk</h2><a href="login.php">Rental Cars</a>	| <a href="parkingkiosk.php">Reserve Parking</a></p>
</div>

<div id="mainBody">
	<h1>Welcome to the Pre-Paid Parking Kiosk</h1><br>

	<p>Parking Rates:</p>
	<p>Half-A-Day: $5.00/day</p>
	<p>One Day: $10.00/day</p>
	<p>Two Days: $11.00/day</p>
	<p>Three Days: $12.00/day</p>
	<p>Four Days (or more): $13.00/day</p>
	<br><p>Space Accomodation Fees:</p>
	<p>Sedan: +$2.00</p>
	<p>SUV: +$3.00</p>
	<p>Truck: +$5.00</p>
	<p>Van: +$4.00</p>
	<p>Motorcycle: +$1.00</p>
	<p>Luxury/Sport: +$6.00</p>
	<p>VIP Parking: For an extra fee of $7.00, you upgrade to valet parking in our reserved private lot. Come or go, your car will be brought straight to you at a moments notice.</p>
</div>
	<!-- 
	Car Type
	Time Slot 
	Pricing
	VIP vs Standard
	Bonus? : Trending Section 
	-->
<div id="formsect">
	<form action="assignspace.php" method="post">
	
	<!--Car type selector-->
	<label for="ctype">Select Car Type: </label>
	<select name="ctype" id="ctype">
		<option value="Sedan">Sedan</option>
		<option value="SUV">SUV</option>
		<option value="Sport">Sport</option>
		<option value="Truck">Truck</option>
		<option value="Van">Van</option>
		<option value="Motorcycle">Motorcycle</option>
	</select>
	<br><br>
	<!-- Time Slot -->
	<!-- FIND A WAY TO SELECT ONLY ONE OPTION PLEASE -->
	<div>
	Select Time Frame:
	<div class="timef">
	<input type="radio" name="time" value="1/2 Day(s)"><label for="1/2 Day(s)">1/2 Day(s)</label><br>

	<input type="radio" name="time" value="1 Day(s)"><label for="1 Day">1 Day(s)</label><br>

	<input type="radio" name="time" value="2 Day(s)"><label for="2 Day(s)">2 Day(s)</label><br>

	<input type="radio" name="time" value="3 Day(s)"><label for="3 Day(s)">3 Day(s)</label><br>

	<input type="radio" name="time" value="4 Day(s)+"><label for="4 Day(s)+">4 Day(s)+</label><br>
	</div>
</div>
<br>
	<!-- VIP/Standard -->
	<label for="vip">VIP: </label>
	<select name="vip">
		<option value="VIP Parking">VIP Parking</option>
		<option value="Standard Parking">Standard Parking</option>
	</select>
<br><br>


	<div id="button"><input type="submit" name="submit" value="Submit"></div>

	</form>
</div>


	<?php

$host = 'localhost';
$username = 'mhosein2';
$password = 'mhosein2';
$dbname = 'mhosein2';

$connect = mysqli_connect($host, $username, $password, $dbname);

if ($connect->connect_error) {
	die("Connection failed: " . $connect->connect_error);
}

for ($i = 0; $i <= 10; $i++) {
$random  = rand(10000, 19999);
$id = $random;
$randStat = rand(0, 1) ? 'Available' : 'Reserved';
$status = $randStat;

$sql = "INSERT INTO parking VALUES ('$id', '$status')";
if ($connect->query($sql) === TRUE) {
    //echo "New space successfully saved";
} else {
    //echo "Error: New artist failed to be saved" . $sql . "<br>" . $conn->error;
}
}

$connect->close();
?>

</body>
</html>