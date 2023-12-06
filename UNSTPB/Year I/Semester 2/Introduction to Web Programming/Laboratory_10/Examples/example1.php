<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Example 1</title>
    </head>

    <body>
        <?php
            function sumDigits($n){
                $sum = 0;
                while($n > 0){
                    $sum = $sum + $n%10;
                    $n = intval($n/10);
                }
                return $sum;
            }
            echo "<br>" , sumDigits(4135);
        ?>
    </body>
</html> 