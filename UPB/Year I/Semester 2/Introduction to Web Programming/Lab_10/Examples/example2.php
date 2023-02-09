<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Example 2</title>
    </head>

    <body>
        <?php
            $arrTest = [3, 5, 4, 1];
            function deleteElement($arr, $element){
                $index = array_search($element, $arr);
                if($index > -1) array_splice($arr, $index, 1);
                return $arr;
            }
            
            function displayArray($arr){
                for($i = 0; $i < count($arr); $i++) echo $arr[$i] . " ";   
                echo "<br>";
            }

            displayArray(deleteElement($arrTest, 4));
        ?>
    </body>
</html>