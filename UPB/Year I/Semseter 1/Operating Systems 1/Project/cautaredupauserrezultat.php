<!DOCTYPE html>
<html>
	<head>
		<link rel = "shortcut icon" href = "heartrate.ico">
		<title>Citire tensiune - cautare dupa utilizator</title>
	</head>
	<body bgcolor = "green">
		<div align = "center">

		<?php

		include("connect.php");

		$user_cautat = $_POST['nume'];
		$query = "select * from tensiune where user like '$user_cautat'";
		$result = mysqli_query($dbcon, $query);

		while($row = mysqli_fetch_array($result)){
			$data = $row['data'];
			$sys = $row['sys'];
			$dia = $row['dia'];
			$puls = $row['puls'];
			$user = $row['user'];
			print "Data: $data, tensiune SYS/DIA: $sys/$dia, puls: $puls, utilizator: $user <br>";
		}
		mysqli_close($dbcon);
		?>
		<p><a href = "index.html">Inapoi</a></p>
		<p><a href = "cautare.html">Cautare noua</a></p>
		</div>
	</body>
</html>

	
