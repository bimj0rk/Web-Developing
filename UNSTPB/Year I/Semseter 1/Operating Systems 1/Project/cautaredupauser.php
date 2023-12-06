<!DOCTYPE html>

<html>
	<head>
		<link rel = "shortcut icon" href = "heartrate.ico">
		<title>Citire tensiune - cautare dupa utilizator</title>
	</head>

	<body bgcolor = "green">
		<div align = "center">
			<form action = "cautaredupauserrezultat.php" method = "post">
				Utilizator: <select name = "nume">
				<option value =" ">-Selecteaza-</option><br>
                        	<?php
                                	include("connect.php");
                                	$query = "select nume from user";
                                	$result = mysqli_query($dbcon, $query);
                                	while($row = mysqli_fetch_array($result)){
                                	echo '<option value ="' . $row['nume'] . '">' . $row['nume']. '</option>';
                                	}
                        	?>
				<input type = "submit" value = "Cauta">
			</form>
		</div>
	</body>
</html>

