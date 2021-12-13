<!doctype html>

<html>

<head lang="en">
	<meta charset="UTF-8">
<title>Choose a Product</title>
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
	
	  <p>
		  Click here to go to our Pre-Pay Parking Services Website: <a href="parkingkiosk.php"><button>Pre-Pay Parking Services</button></a>
	</p>

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

$sql = "SELECT itemid, name, ctype, color, quantity FROM Items WHERE itemid<=10";
$result = $conn->query($sql);
echo "<h3>Rental Cars</h3>";
if ($result->num_rows > 0) {
     // output data of each row
	echo "<table><tr><th>Car ID</th><th>Name</th><th>Type</th><th>color</th><th>Quantity</th></tr>";
     while($row = $result->fetch_assoc()) {
	     	 $itemid=$row["itemid"];
		 $name=$row["name"];
		 $ctype=$row["ctype"];
		 $color=$row["color"];
		 $quantity=$row["quantity"];


         echo "<tr><td>".$itemid."</td><td>".$name."</td><td>".$ctype."</td><td>".$color."</td><td>".$quantity."</td></tr>";
     }
	 echo "</table>";
} else {
     echo "0 results";
}

$sql = "SELECT itemid, snum FROM Items WHERE itemid>=11";
$result = $conn->query($sql);
echo "<h3>Parking Spaces</h3>";
if ($result->num_rows > 0) {
     // output data of each row
	echo "<table><tr><th>Space ID</th><th>Space Number</th></tr>";
     while($row = $result->fetch_assoc()) {

		 $itemid=$row["itemid"];
		 $snum=$row["snum"];
         echo "<tr><td>".$itemid."</td><td>".$snum."</td></tr>";
     }
	 echo "</table>";
} else {
     echo "0 results";
}


$conn->close();
?>  

	<div>
		<form action="addItemToCart.php" method="post">
		<h3>Insert the Space or Car ID you would like to purchase into the box below:</h3>
		<p>Selection: <input name="artist1" type="text"></p>
		<input type="submit" id="btn3" value="Submit">
		<a href="displayTable.php"><input type="button" id="btn1"  value="Cancel"></a>
		<a href="displayCart.php"><input type="button" id="btn1"  value="Your Cart"></a>
	</div>
</body>

</html>
