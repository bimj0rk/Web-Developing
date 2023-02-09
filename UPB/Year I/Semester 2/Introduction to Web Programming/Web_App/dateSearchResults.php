<!DOCTYPE html>

<html lang = "en">
	<head>
		<link rel = "stylesheet"  href = "css/main.css">
        <link rel = "stylesheet" href = "bootstrap-3.4.1-dist/css/bootstrap.css">
        <link rel = "stylesheet"  href = "bootstrap-3.4.1-dist/css/bootstrap.min.css">
        <link rel = "shortcut icon" href = "img/heartrate.ico">
		<meta charset = "8">
		<title>Health300 - Date Search</title>
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

					$arr = unserialize($_COOKIE['searchDate']);
					$date = $arr[0];

					$query = "SELECT * FROM heart_rate WHERE date = '$date'";
					$result = mysqli_query($dbcon, $query);
					while($row = mysqli_fetch_array($result)){
							$date = $row['date'];
							$sys = $row['sys'];
							$dia = $row['dia'];
							$bpm = $row['bpm'];
							$user = $row['user'];
							print "Date: $date, SYS/DIA: $sys/$dia, BPM: $bpm, user: $user <br>";
					}
				?>
			</h3>
			<a href = "preDashboard.html" class = "button">Go back</a>
		</div>
	</body>
</html>
