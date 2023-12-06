<!DOCTYPE html>
<html>

	<head>
		<link rel = "shortcut icon" href = "heartrate.ico">
		<title>Citire tensiune - tabel de valori</title>
	</head>

	<body bgcolor = "green">

		<div align = "center">

		<table border = '2'>
			<tr>
				<th>Data</th>
				<th>SYS / DIA (mmHg)</th>
				<th>Puls</th>
				<th>Utilizator</th>	
			</tr>

		<?php

		include("connect.php");
		$query = "select * from tensiune";
		$result = mysqli_query($dbcon, $query);
		while($row = mysqli_fetch_array($result)){
			$data = $row['data'];
			$sys = $row['sys'];
			$dia = $row['dia'];
			$puls = $row['puls'];
			$user = $row['user'];

			print "<tr><td>$data</td><td>$sys / $dia</td><td>$puls</td><td>$user</td></tr>";

			
		}
		?>
		<p><a href = "index.html">Inapoi</a></p>
		</div>
	</body>
</html>
