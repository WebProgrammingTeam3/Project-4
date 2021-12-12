<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding Car Information to DB</title>
</head>
<body>
    <?php
        $host = "localhost";
        $port = 3306;
        $username = "rsalter2";
        $password = "rsalter2";
        $dbname = "rsalter2";

        // Create connection
        $conn = new mysqli($host, $port, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $car=$_POST["car1"];
        $model=$_POST["car_model"]

        $sql = "INSERT INTO cars
        VALUES ('$car', '$model')";

        if ($conn->query($sql) === TRUE) {
            echo "New artist successfully saved";
        } else {
            echo "Error: New artist failed to be saved" . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    ?>

    
</body>
</html>
