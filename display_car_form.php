<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Form</title>
</head>
<body>
    <div>
		<form action="addCarToDB.php" method="post">
            <h3>Car Rental Form</h3>
            <p>Car: <input name="car1" type="text"></p>

            <p>Car Model: </p>
              <input type="radio" id="html" name="car_model" value="SUV">
              <label for="SUV">SUV</label><br>

              <input type="radio" id="css" name="car_model" value="Compact">
              <label for="Compact">Compact</label><br>

              <input type="radio" id="javascript" name="car_model" value="Midsize">
              <label for="Midsize">Midsize</label><br>

              <input type="radio" id="javascript" name="car_model" value="Luxury">
              <label for="Luxury">Luxury</label><br>


            <input type="submit" id="btn3" value="Submit">
            <a href="creating_car_form.php"><input type="button" id="btn1"  value="Cancel"></a>
		</form>
    </div>
    
</body>
</html>