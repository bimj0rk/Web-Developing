<!DOCTYPE html>

<html lang = "en">
	<head>
		<link rel = "stylesheet" href = "css/main.css">
		<link rel = "stylesheet" href = "bootstrap-3.4.1-dist/css/bootstrap.css">
		<link rel = "stylesheet" href = "bootstrap-3.4.1-dist/css/bootstrap.min.css"> 
		<link rel = "shortcut icon" href = "img/heartrate.ico">
		<meta charset = "8">
		<title>Health300 - Insert Values</title>
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
			<h1>Insert Values below: </h1>

			<form action = "" method = "POST">
				<input type = "text" placeholder = "Date" name = "date"><br>
				<input type = "text" placeholder = "Systolic pressure" name = "sys"><br>
				<input type = "text" placeholder = "Diastolic pressure" name = "dia"><br>
				<input type = "text" placeholder = "BPM" name = "bpm"><br>
				<select name = "user">
					<option value = "">-Select User-</option>
					<?php
						include("php/connect.php");
						$query = "select name from user";
						$result = mysqli_query($dbcon, $query);
						while($row = mysqli_fetch_array($result)){
							echo '<option value ="' . $row['name'] . '">' . $row['name']. '</option>';
						}
					?>
				</select><br>
				<input type = "submit" class = "button" value = "Add" name = "btnSubmitValues">
			</form>
			<?php
				if(isset($_POST['btnSubmitValues'])){
					$date = $_POST['date'];
					$sys = $_POST['sys'];
					$dia = $_POST['dia'];
					$bpm= $_POST['bpm'];
					$user = $_POST['user'];

					$arr = array($date, $sys, $dia, $bpm, $user);
					setcookie('addValues', serialize($arr));
					header("Location: validateInsertValues.php");
				}
			?>
		</div>
	</body>
</html>

