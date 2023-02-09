<!DOCTYPE html>

<html lang = "en">
	<head>
		<link rel = "stylesheet"  href = "css/main.css">
        <link rel = "stylesheet" href = "bootstrap-3.4.1-dist/css/bootstrap.css">
        <link rel = "stylesheet"  href = "bootstrap-3.4.1-dist/css/bootstrap.min.css">
        <link rel = "shortcut icon" href = "img/heartrate.ico">
		<meta charset = "8">
		<title>Health300 - Date Search</title>
	</head>
	<body>
		<div class = "navbar">
            <div class = "container">
                <div class = "row">
                    <div class="col-md-12">
                        <a href = "index.html">Home </a>
                        <a href = "quiz.html">Quiz </a>
                        <a href = "preDashboard.html">Dashboard </a>
                        <a href = "calculator.html">Calculator</a>
                    </div>
                </div>    
            </div>
        </div>
		<div class = "flex-center icon">
			<form action = "dateSearch.php" method = "post">
				<input type = "text" name = "date" placeholder = "Date"></br>
				<input type = "submit" value = "Search" name = "btnSubmit" class = "button">
			</form>
		</div>
		<?php
				if(isset($_POST['btnSubmit'])){
					$date = $_POST['date'];

					$arr = array($date);
					setcookie('searchDate', serialize($arr));
					header("Location: dateSearchResults.php");
				}
			?>
	</body>
</html>


