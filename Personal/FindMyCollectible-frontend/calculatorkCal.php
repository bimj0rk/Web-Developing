<!DOCTYPE html>

<html lang = en>
    <head>
        <link rel = "stylesheet"  href = "css/main.css">
        <link rel = "stylesheet" href = "bootstrap-3.4.1-dist/css/bootstrap.css">
        <link rel = "stylesheet"  href = "bootstrap-3.4.1-dist/css/bootstrap.min.css">
        <link rel = "shortcut icon" href = "img/heartrate.ico">
		<meta charset = "8">
        <title>Health300 - kCal Calculator</title>
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
                <input type = "text" name = "age" placeholder = "Age"><br>
                <input type = "text" name = "weight" placeholder = "Weight(kg)"><br>
                <input type = "text" name = "height" placeholder = "Height(cm)"><br>
                <select name = "gender">
                    <option value = "male">Male</option>
                    <option value = "female">Female</option>
                </select><br>
                <input type = "submit" value = "Calculate calories" name = "btnSubmit" class = "button">
            </form>
        </div>
        <?php
          if(isset($_POST['btnSubmit'])){
              $age = $_POST['age'];
              $weight = $_POST['weight'];
              $height = $_POST['height'];
              $gender = $_POST['gender'];

              $arr = array($age, $weight, $height, $gender);
              setcookie('kcal', serialize($arr));
              header("Location: kcalResults.php");
          }  
        ?>
    </body>
</html>