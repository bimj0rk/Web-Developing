<!DOCTYPE html>

<html>
	<head>
		<link rel = "shortcut icon" href = "heartrate.ico">
		<title>Citire tensiune - introducere valori</title>
	</head>
	<body bgcolor = "green">
		<div align = "center">

		<?php
		include("connect.php");

		$data = mysqli_real_escape_string($dbcon, $_POST['data']);
		$sys = mysqli_real_escape_string($dbcon, $_POST['sys']);
		$dia = mysqli_real_escape_string($dbcon, $_POST['dia']);
		$puls = mysqli_real_escape_string($dbcon, $_POST['puls']);
		$nume = mysqli_real_escape_string($dbcon, $_POST['nume']);

		$query = "insert into tensiune (data, sys, dia, puls, user) values ('$data', '$sys', '$dia', '$puls', '$nume')";
		if(mysqli_query($dbcon, $query)){
			echo "Valorile au fost adaugate";
		} else {
			echo "Valorile nu au fost adaugate";
		}

		mysqli_close($dbcon);
		?>
		<p><a href = "tabel.php">Tabel cu valori</a></p>
		<p><a href = "citire.php">Adaugare valori noi</a></p>
		<p><a href = "index.html">Inapoi</a></p>
		</div>
	</body>
</html>

