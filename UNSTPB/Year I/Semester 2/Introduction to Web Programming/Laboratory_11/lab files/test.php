<?php
	

	include 'functions.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<link rel="stylesheet" href="css/styles.css">
</head>
<body>

	<div class="container">
		<form method='POST' action=''>
			<?php question(); ?>
			<input type="submit" value="Answer">
		</form>

		<p>Name: </p>
		<p>Correct: </p>
		<p>Wrong: </p>
	</div>	

</body>
</html>