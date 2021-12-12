<html>
<head lang="en">
	<meta charset="UTF-8">
	<title>Checkout</title>
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
.CCForm {
    max-width: 700px;
    background-color: #fff;
    margin: 100px auto;
    overflow: hidden;
    padding: 25px;
    color: #4c4e56;
}
.CCForm label {
	width: 100%;
    margin-bottom: 10px;
}
.CCForm .pay {
    float: left;
    font-size: 18px;
    padding: 10px 25px;
    margin-top: 20px;
    position: relative;
}
.CCForm .pay .form-control {
    line-height: 40px;
    height: auto;
    padding: 0 16px;
}
.CCForm .secuirtyCode {
    width: 35%;
}
.CCForm #card-number-field {
    width: 100%;
}
.CCForm #expiration-date {
    width: 49%;
}
.CCForm #credit_cards {
    width: 50%;
    margin-top: 25px;
    text-align: right;
}
.CCForm #pay-now {
    width: 100%;
    margin-top: 25px;
}
.CCForm .pay .btn {
    width: 100%;
    margin-top: 3px;
    font-size: 24px;
    background-color: #2ec4a5;
    color: white;
}
.CCForm .pay select {
    padding: 10px;
    margin-right: 15px;
}
.transparent {
    opacity: 0.2;
}
@media(max-width: 650px) {
    .CCForm .secuirtyCode,
    .CCForm #expiration-date,
    .CCForm #credit_cards {
        width: 100%;
    }
    .CCForm #credit_cards {
        text-align: left;
    }
}
	</style>
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

$sql = "SELECT Cart.itemid, Items.name, Items.snum FROM Cart INNER JOIN Items ON Cart.itemid = Items.itemid WHERE Cart.itemid = Items.itemid AND Items.itemid>=11";
$result = $conn->query($sql);
echo "<h3>Parking Spaces</h3>";
if ($result->num_rows > 0) {
     // output data of each row
	echo "<table><tr><th>Space ID</th><th>Space Number</th></tr>";
     while($row = $result->fetch_assoc()) {


     	 $itemid=$row["itemid"];
		 $snum=$row["snum"];
         echo "<tr><td>".$itemid."</td></tr><tr><td>".$snum."</td></tr>";
     }
	 echo "</table>";
} else {
     echo "0 results";
}


$conn->close();
?>  
<div class="CCForm">
    <div class="pay">
        <form>
            <div class="form-group" id="card-number-field">
                <label for="ccN">Card Number</label>
                <input type="text" class="form-control" id="ccN">
            </div>
            <div class="form-group secuirtyCode">
                <label for="securityCode">Security Code</label>
                <input type="text" class="form-control" id="securityCode">
            </div>
            <div class="form-group" id="exp">
                <label>Expiration</label>
                <select>
                    <option value="01">Jan</option>
                    <option value="02">Feb</option>
                    <option value="03">Mar</option>
                    <option value="04">Apr</option>
                    <option value="05">May</option>
                    <option value="06">Jun</option>
                    <option value="07">Jul</option>
                    <option value="08">Aug</option>
                    <option value="09">Sep</option>
                    <option value="10">Oct</option>
                    <option value="11">Nov</option>
                    <option value="12">Dec</option>
                </select>
                <select>
                    <option value="21"> 2021</option>
                    <option value="22"> 2022</option>
                    <option value="23"> 2023</option>
                    <option value="24"> 2024</option>
                    <option value="25"> 2025</option>
                    <option value="26"> 2026</option>
                </select>
            </div>
            <div class="form-group" id="credit_cards">
                <img src="americanexpress.jpg" id="americanexpress">
                <img src="visa.jpg" id="visa">
                <img src="mastercard.jpg" id="mastercard">
                <img src="Discover.jpg" id="discover">
            </div>
            <div class="form-group" id="payment">
                <button type="submit" class="btn btn-default" id="confirm-purchase">Confirm</button>
            </div>
        </form>
    </div>
</div>
<?php
$ccnum = $_POST['ccN'];
$ccdate = $_POST['exp'];
$cccode = $_POST['securitycode'];

// database insert SQL code
$sql = "INSERT INTO Users (ccnum, ccdate, cccode) VALUES ('$ccnum', '$ccdate', '$cccode')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Saved";
}
?>
</body>
</html>
