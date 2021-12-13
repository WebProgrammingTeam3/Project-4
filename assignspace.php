<!DOCTYPE html>
<html>
<head>
	<title>Pre-Paid Parking</title>
	<link rel="stylesheet"$ctype="text/css" href="prepay.css">
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
	
<div id="formsect">
	<?php

$host = 'localhost';
$username = 'mhosein2';
$password = 'mhosein2';
$dbname = 'mhosein2';

$connect = mysqli_connect($host, $username, $password, $dbname);

if ($connect->connect_error) {
	die("Connection failed: " . $connect->connect_error);
}

$price = 0.00;
$ctype = $_POST['ctype'];
$time = $_POST['time'];
$vip = $_POST['vip'];

if (isset($_POST['submit'])){
	
//Increase price if VIP is selected
	if($vip == 'VIP Parking') {
		$price += 7.00;
	}


//Set pace price depending on the time frame
	if ($time == '1/2 Day(s)') {
		$price += 5.00;
	} else if ($time == '1 Day(s)') {
		$price += 10.00;
	} else if ($time == '2 Day(s)') {
		$price += 11.00;
	} else if ($time == '3 Day(s)') {
		$price += 12.00;
	} else if ($time == '4 Day(s)+') {
		$price += 13.00;
	}


//Increase price based on car$ctype
	if($ctype == 'SUV') {
		$price += 3.00;
	} else if ($ctype == 'Sedan') {
		$price += 2.00;
	} else if ($price == 'Van') {
		$price += 4.00;
	} else if ($ctype == 'Truck') {
		$price += 5.00;
	} else if ($ctype == 'Motorcycle') {
		$price += 1.00;
	} else if ($ctype == 'Sport') {
		$price += 6.00;
	}
}  
 echo "Total Price for Parking: $", $price, ".00 / day";

 $sql = "SELECT `id`, `status` FROM `parking` LIMIT 15";
 $result = mysqli_query($connect, $sql);
 echo "<h2>Parking Spaces</h2>";

 if(mysqli_num_rows($result) > 0) {
 	echo "<table><tr><th>Space ID#</th><th>Status</th></tr>";
 	while ($row = $result->fetch_assoc()) {

 		$idnum = $row["id"];
 		$stat = $row["status"];

 		echo "<tr><td>" .$idnum. "</td><td>" .$stat. "</td></tr>";
 	}
 	echo "</table>";
 	while ($row = mysqli_fetch_row($result)) {
 		printf("%s (%s)\n", $row[0], $row[1]);
 	}

 } else {
 	echo "0 result";
 }


 $result = mysqli_query($connect, "SELECT id FROM parking WHERE status='Available' LIMIT 1");
 $row = mysqli_fetch_assoc($result);
 echo "<h6 style='color:red; font-size:14px;'> Your Assigned Parking Space is Space ID#: ";
 $ordVal = $row['id'];
 echo $row['id'];
 echo "<br> Please Proceed to Checkout. Thank You For Your Service</h6>";

$sql = "INSERT INTO checkout (ctype, timef, vip, price, ordNum) VALUES ('$ctype', '$time', '$vip', '$price', '$ordVal')";
if ($connect->query($sql) === TRUE) {
    //echo "New space successfully saved";
} else {
    echo "Error: New space failed to be saved<br>" . $connect->error;
}


$connect->close();
?>

<a href="parkcheckout.html"><input type="button" value="Checkout"></a>
</div>


</body>
</html>


