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

$sql = "SELECT Cart.itemid,Items.name,Items.ctype,Items.color,Items.quantity FROM Cart INNER JOIN Items ON Cart.itemid = Items.itemid WHERE Cart.itemid = Items.itemid AND Items.itemid<=10";
$result = $conn->query($sql);
echo "<h3>Your Rentals</h3>";
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
/* backup parking services system
$sql = "SELECT Cart.itemid, Items.name, Items.snum FROM Cart INNER JOIN Items ON Cart.itemid = Items.itemid WHERE Cart.itemid = Items.itemid AND Items.itemid>=11";
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
*/

$conn->close();
?>  

	<div>
	<a href="displayTable.php"><input type="button" id="btn1" value="Back To Inventory"></a>
	<a href="checkout.php"><input type="button" id="btn1" value="Checkout"></a>
	<a href="login.php"><input type="button" id="btn1" onclick="addA.php" value="Logout"></a>
	</div>
</body>

</html>
