<?php
	$arr = unserialize($_COOKIE['order']);	
	echo "Name:" . " " . $arr[0];
	echo "<br>";
	echo "Telephone:" . " " .  $arr[1];
	echo "<br>";
	echo "Type:" . " " .  $arr[2];
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel = "stylesheet" href = "css/styles.css">	
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
</html>