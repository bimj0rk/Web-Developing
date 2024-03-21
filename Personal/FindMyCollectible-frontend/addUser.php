<!DOCTYPE html>

<html lang = "en">
	<head>
		<link rel = "stylesheet"  href = "css/main.css">
        <link rel = "stylesheet" href = "bootstrap-3.4.1-dist/css/bootstrap.css">
        <link rel = "stylesheet"  href = "bootstrap-3.4.1-dist/css/bootstrap.min.css">
        <link rel = "shortcut icon" href = "img/heartrate.ico">
		<meta charset = "8">
		<title>Health300 - Add User</title>
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
			<h1>Add user</h1>

			<form action = "" method = "POST">
				<input type = "text" placeholder = "Name" name = "name"><br>
				<input type = "text" placeholder = "Weight" name = "weight"><br>
				<input type = "text" placeholder = "Height" name = "height"><br>
				<input type = "text" placeholder = "Age" name = "age"><br>
				<select name = "gender">
					<option value = "">-Select Gender-</option>
					<option value = "male">Male</option>
					<option value = "female">Female</option>
				</select><br>
				<input type = "submit" class = "button" value = "Submit" name = "btnSubmit">
			</form>
		</div>
		<?php
            if(isset($_POST['btnSubmit'])){
                $name = $_POST['name'];
				$weight = $_POST['weight'];
				$height = $_POST['height'];
				$age = $_POST['age'];
				$gender = $_POST['gender'];

                $arr = array($name, $weight, $height, $age, $gender);
                setcookie('addUser', serialize($arr));
                header("Location: validateUserAdd.php");
            }
		?>
	</body>
</html>

