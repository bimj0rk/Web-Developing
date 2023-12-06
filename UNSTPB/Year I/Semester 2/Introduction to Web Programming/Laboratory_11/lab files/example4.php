<?php
	$color = 'aqua';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<style>
		body {
			background-color: <?php echo $color; ?>;
		}

		form {
			display: inline-block;
		}

		.box {
			width: 100px;
			height: 100px;
			display: inline-block;
			cursor: pointer;
			border: 1px solid black;
		}
	</style>
</head>
<body id="body">
	
	<form action="" method="POST">
		<input type="hidden" value="red" name="red">
		<input type="submit" value="" class="box" style="background-color: red">
	</form>

	<form action="" method="POST">
		<input type="hidden" value="blue" name="blue">
		<input type="submit" value="" class="box" style="background-color: blue">
	</form>

	<form action="" method="POST">
		<input type="hidden" value="lime" name="lime">
		<input type="submit" value="" class="box" style="background-color: lime">
	</form>


	<script>
		console.log(document.cookie);
	</script>
</body>
</html>