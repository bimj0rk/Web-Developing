<!DOCTYPE html>

<html lang = en>
    <head>
        <link rel = "stylesheet"  href = "css/main.css">
        <link rel = "stylesheet" href = "bootstrap-3.4.1-dist/css/bootstrap.css">
        <link rel = "stylesheet"  href = "bootstrap-3.4.1-dist/css/bootstrap.min.css">
        <link rel = "shortcut icon" href = "img/heartrate.ico">
		<meta charset = "8">
        <title>Health300 - BMI results</title>
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
        <?php
            $arr = unserialize($_COOKIE['bmi']);
            $weight = $arr[0];
            $height = $arr[1];
        ?>
        <div class = "flex-center icon">
            <h4>Your BMI is:</h4>
            <h2 id = "bmi">
            <script>
                var weight = <?php echo $weight; ?>,
                    height = <?php echo $height; ?>,
                    heightInMeters = height/100;

                function calculateBMI(w, h){
                    var bmi = 0;
                    bmi = w/(h^2);
                    return bmi;
                }

                let bmi = calculateBMI(weight, heightInMeters).toFixed(2);
                let id = document.getElementById('bmi');
                id.innerHTML = bmi;
            </script>
            </h2>
            <a href = "calculator.html" class = "button">Go back</a>
        </div>
    </body>
</html>