<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" href = "css/styles.css">
        <meta charset="UTF-8">
        <title>Exercise 5</title>
    </head>

    <body>
        <form action = "" method = "get">
            <p><input type = "text" name = "name" placeholder="Name"></p>
            <p><input type = "text" name = "telephone" placeholder="Telephone"></p>
            <p><select name = "type" id = "type">
                <option value = "cup">Cup</option>
                <option value = "plain cone">Plain cone</option>
                <option value = "sugar cone">Sugar cone</option>
                <option value = "waffle cone">Waffle cone</option>
            </select></p>
            <p><input type = "submit" value = "Place order" name = "btnOrder"></p>
        </form>

        <?php
            if(isset($_GET['btnOrder'])){
                $name = $_GET['name'];
                $telephone = $_GET['telephone'];
                $type = $_GET['type'];

                $arr = array($name, $telephone, $type);
                setcookie('order', serialize($arr));
                header("Location: order.php");
            }
        ?>
    </body>
</html>