<html>
<head lang="en">
	<meta charset="UTF-8">
	<title>Checkout</title>
</head>

<body>
	<div>
<?php
$host = "localhost";
        $port = 3306;
        $username = "rsalter2";
        $password = "rsalter2";
        $dbname = "rsalter2";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
require 'connect.php';
	$result = mysqli_query($con, 'select * from Orders');
?>
<table cellpadding="2" cellspacing="2" border="0">
	<tr>
		<th>user</th>
		<th>item</th>
		<th>amount</th>
	</tr>
	<?php while($product = mysqli_fetch_object($result)) { ?>
		<tr>
			<td><?php echo $product->userid; ?></td>
			<td><?php echo $product->itemid; ?></td>
			<td><?php echo $product->count; ?></td>
			<td><a href="viewcart.php?id=<?php echo $product->userid; ?>">checkout</a></td>
		</tr>
	<?php } ?>
</table>