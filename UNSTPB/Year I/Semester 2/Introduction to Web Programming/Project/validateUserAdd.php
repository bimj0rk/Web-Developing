<!DOCTYPE html>

<html lang = "en">
	<head>
		<link rel = "stylesheet"  href = "css/main.css">
        <link rel = "stylesheet" href = "bootstrap-3.4.1-dist/css/bootstrap.css">
        <link rel = "stylesheet"  href = "bootstrap-3.4.1-dist/css/bootstrap.min.css">
        <link rel = "shortcut icon" href = "img/heartrate.ico">
		<meta charset = "8">
		<title>Health300 - Add User</title>
	</head>
	<body>
		<div class = "navbar">
            <div class = "container">
                <div class = "row">
                    <div class = "col-md-12">
                        <a href = "index.html">Home </a>
                        <a href = "quiz.html">Quiz </a>
                        <a href = "preDashboard.html">Dashboard </a>
                        <a href = "calculator.html">Calculator</a>
                    </div>
                </div>    
            </div>
        </div>
		<div class = "flex-center icon">
			<h3>
				<?php
					require("php/connect.php");

					$arr = unserialize($_COOKIE['addUser']);
					$name = $arr[0];
					$weight = $arr[1];
					$height = $arr[2];
					$age = $arr[3];
					$gender = $arr[4];

					$heightInMeters = $height/100;
					$bmi = $weight / ($heightInMeters ** 2);

					if(strcmp($gender, "male") == 0){
						$kcal = 10 * $weight + 6.25 * $height - 5 * $age + 5;
					} elseif(strcmp($gender, "female") == 0){
						$kcal = 10 * $weight + 6.25 * $height - 5 * $age - 161;
					}


					$query = "INSERT INTO user (name, weight, height, age, gender, bmi, kcal) 
							VALUES ('$name', '$weight', '$height', '$age', '$gender', '$bmi', '$kcal')";
					if($dbcon->query($query) == TRUE){
						echo "User has been added.<br>";
					} else {
						echo "Error" . mysqli_error($dbcon);
					}
				?>
			</h3>	
			<a href = "preDashboard.html" class = "button">Go back</a>
		</div>
	</body>
</html>
