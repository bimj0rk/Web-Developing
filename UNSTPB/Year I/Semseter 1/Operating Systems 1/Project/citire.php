<!DOCTYPE html>
<html>
	<head>
		<link rel = "shortcut icon" href = "heartrate.ico">
		<title>Citire tensiune - introducere valori</title>
	</head>

	<body bgcolor = "green">
		<div align = "center">
		<h1>Introducere valori</h1>

		<form action = "citirerezultate.php" method = "post">
			Data: <input type = "text" name = "data" id = "data"><br>
			Tensiune sistolica: <input type = "text" name = "sys" id = "sys"><br>
			Tensiune diastolica: <input type = "text" name = "dia" id = "dia"><br>
			Puls: <input type = "text" name = "puls" id = "puls"><br>
			Utilizator: <select name = "nume">
			<option value = " ">-Selecteaza-</option><br>
			<?php
				include("connect.php");
				$query = "select nume from user";
				$result = mysqli_query($dbcon, $query);
				while($row = mysqli_fetch_array($result)){
				echo '<option value ="' . $row['nume'] . '">' . $row['nume']. '</option>';
				}
			?>

			<input type = "submit" value = "Adauga">
		</form>
		</div>
	</body>
</html>

