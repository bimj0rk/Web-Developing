<!DOCTYPE html>

<html lang = "en">
	<head>
	<link rel = "stylesheet"  href = "css/main.css">
        <link rel = "stylesheet" href = "css/preDashboard.css">
        <link rel = "stylesheet" href = "bootstrap-3.4.1-dist/css/bootstrap.css">
        <link rel = "stylesheet"  href = "bootstrap-3.4.1-dist/css/bootstrap.min.css">
        <link rel = "shortcut icon" href = "img/heartrate.ico">
		<meta charset = "8">
        <link rel = "shortcut icon" href = "img/heartrate.ico">
		<title>Heart300 - Insert Values</title>
	</head>
	<body>
		<div class="navbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a href = "index.html">Home </a>
                        <a href="quiz.html">Quiz </a>
                        <a href="preDashboard.html">Dashboard </a>
                        <a href="calculator.html">Calculator</a>
                    </div>
                </div>    
            </div>
        </div>
		<div class = "flex-center icon">
		<?php
			require("php/connect.php");

			$arr = unserialize($_COOKIE['addValues']);
			$date = $arr[0];
			$sys = $arr[1];
			$dia = $arr[2];
			$bpm = $arr[3];
			$user = $arr[4];

			$query = "INSERT INTO heart_rate (date, sys, dia, bpm, user) VALUES ('$date', '$sys', '$dia', '$bpm', '$user')";
			if($dbcon->query($query) == TRUE){
				echo "<h3>Values have been added to the database.</h3>";
			} else {
				echo "Error!";
			}

			mysqli_close($dbcon);
		?>
		<p><a href = "preDashboard.html" class = "button">Go back</a></p>
		</div>
	</body>
</html>

