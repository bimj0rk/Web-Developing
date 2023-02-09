<!DOCTYPE html>

<html>
	<head>
		<link rel = "shortcut icon" href = "heartrate.ico">
		<title>Citire tensiune - cautare dupa data</title>
	</head>
	<body bgcolor = "green">
		<div align = "center">

		<?php

		include("connect.php");

		$data_cautata = $_POST['data'];
		$query = "select * from tensiune where data like '$data_cautata'";
		$result = mysqli_query($dbcon, $query);

		while($row = mysqli_fetch_array($result)){
			$data = $row['data'];
			$sys = $row['sys'];
			$dia = $row['dia'];
			$puls = $row['puls'];
			$user = $row['user'];
			print "Data: $data, tensiune SYS/DIA: $sys/$dia, puls: $puls, utilizator: $user";
		}
		mysqli_close($dbcon);
		?>
		<p><a href = "index.html">Inapoi</a></p>
		<p><a href = "cautare.html">Cautare noua</a></p>
		</div>
	</body>
</html>
