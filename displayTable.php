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

$sql = "SELECT name, ctype, color, quantity FROM Item WHERE itemid<=10";
$result = $conn->query($sql);
echo "<h3>Rental Cars</h3>";
if ($result->num_rows > 0) {
     // output data of each row
	echo "<table><tr><th>Name</th><th>Type</th><th>color</th><th>Quantity</th></tr>";
     while($row = $result->fetch_assoc()) {
		 $name=$row["name"];
		 $ctype=$row["ctype"];
		 $color=$row["color"];
		 $quantity=$row["quantity"];


         echo "<tr><td>".$name."</td><td>".$ctype."</td><td>".$color."</td><td>".$quantity."</td></tr>";
     }
	 echo "</table>";
} else {
     echo "0 results";
}

$sql = "SELECT name, snum FROM Item WHERE itemid>=11";
$result = $conn->query($sql);
echo "<h3>Parking Spaces</h3>";
if ($result->num_rows > 0) {
     // output data of each row
	echo "<table><tr><th>Spaces</th></tr>";
     while($row = $result->fetch_assoc()) {

		 $name=$row["name"];
		 $snum=$row["snum"];
         echo "<tr><td>".$name."</td></tr><tr><td>".$snum."</td></tr>";
     }
	 echo "</table>";
} else {
     echo "0 results";
}


$conn->close();
?>  

	<div>
	<a href="addArtist.php"><input type="button" id="btn1" value="Add new Artist"></a>
	<a href="addAlbum.php"><input type="button" id="btn1" value="Add new Album"></a>
	<a href="login.php"><input type="button" id="btn1" onclick="addA.php" value="Logout"></a>
	</div>
</body>

</html>