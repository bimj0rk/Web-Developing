<!DOCTYPE html>

<html lang = "en">
	<head>
		<link rel = "stylesheet"  href = "css/main.css">
        <link rel = "stylesheet" href = "bootstrap-3.4.1-dist/css/bootstrap.css">
        <link rel = "stylesheet"  href = "bootstrap-3.4.1-dist/css/bootstrap.min.css">
        <link rel = "shortcut icon" href = "img/heartrate.ico">
		<meta charset = "8">
		<title>Health300 - Select User</title>
	</head>

	<body>
		<div class = "navbar">
            <div class = "container">
                <div class = "row">
                    <div class = "col-md-12">
                        <a href = "index.html">Home </a>
                        <a href = "quiz.html">Quiz </a>
                        <a href = "preDashboard.html">Dashboard </a>
                        <a href = "calculator.html">Calculator</a>
                    </div>
                </div>    
            </div>
        </div>
		<div class = "flex-center icon">
			<form action = "" method = "POST">
				<select name = "name">
					<option value = "">-Select User-</option>
					<?php
						require("php/connect.php");
						$query = "select name from user";
						$result = mysqli_query($dbcon, $query);
						while($row = mysqli_fetch_array($result)){
							print '<option value ="' . $row['name'] . '">' . $row['name']. '</option>';
						}
					?>
				</select><br>
				<input type = "submit" class = "button" value = "Enter" name = "btnSubmit">
			</form>
			<?php
				if(isset($_POST['btnSubmit'])){
					$name = $_POST['name'];
	  
					$arr = array($name);
					setcookie('search', serialize($arr));
					header("Location: dashboard.php");
				}  
			?>
		</div>
	</body>
</html>

