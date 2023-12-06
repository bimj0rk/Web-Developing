<!DOCTYPE html>

<html lang = en>
    <head>
        <link rel = "stylesheet"  href = "css/main.css">
        <link rel = "stylesheet" href = "bootstrap-3.4.1-dist/css/bootstrap.css">
        <link rel = "stylesheet"  href = "bootstrap-3.4.1-dist/css/bootstrap.min.css">
        <link rel = "shortcut icon" href = "img/heartrate.ico">
		<meta charset = "8">
        <title>Health300 - kCal results</title>
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
            $arr = unserialize($_COOKIE['kcal']);
            $age = $arr[0];
            $weight = $arr[1];
            $height = $arr[2];
            $gender = $arr[3];
        ?>
        <div class = "flex-center icon">
            <h4>You need to consume: </h4>
            <h2 id = "kcal">
            <script>
                var age = <?php echo $age; ?>,
                    weight = <?php echo $weight; ?>,
                    height = <?php echo $height; ?>,
                    gender = <?php echo json_encode($gender); ?>,
                    id = document.getElementById("kcal");

                function calculatekCal(){
                    var kcal;
                    if(gender = "male"){
                        kcal = 10 * weight + 6.25 * height - 5 * age + 5;
                    } else if(gender = "female"){
                        kcal = 10 * weight + 6.25 * height - 5 * age - 161;
                    }
                    return kcal;
                }

                var kcal = calculatekCal();
                id.innerHTML = kcal;
            </script>
            calories per day.
            </h2>
            <a href = "calculator.html" class = "button">Go back</a>
        </div>
    </body>
</html>