<!DOCTYPE html>

<html lang="en">
	<head>
		<link rel = "shortcut icon" href = "heartrate.ico">
		<title>Citire tensiune - adaugare utilizator</title>
	</head>
	<body bgcolor = "green">
		<div align = "center">

		<?php
		include("connect.php");
	
		$nume = mysqli_real_escape_string($dbcon, $_POST['nume']);

		$query = "insert into user(nume) values ('$nume')";
		if(mysqli_query($dbcon, $query)){
			echo "Utilizatorul a fost adaugat.";
		} else {
			echo "Utilizatorul nu a fost adaugat" . mysqli_error($dbcon);
		}

		mysqli_close($dbcon);
		?>
		
		<p><a href = "index.html">Inapoi</a></p>
	</div>
	</body>
</html>
