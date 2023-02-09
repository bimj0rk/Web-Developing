<!DOCTYPE html>
<html lang = "en">
    <head>
        <link rel = "stylesheet" href = "css/styles.css">
        <meta charset="UTF-8">
        <title>Exercise 8</title>
    </head>

    <body>
        <form action = "" method = "POST">
            <p>
                <input type = "text" name = "name" placeholder = "Name">
            </p>

            <p>
                <input type = "text" name = "email" placeholder = "Email">
            </p>

            <p>
                <select name = "social" id = "social">
                    <option value = "Facebook">Facebook</option>
                    <option value = "Google">Google</option>
                    <option value = "Twitter">Twitter</option>
                </select>
            </p>

            <p>
                <input type = "submit" value = "Login" name = "btnLogin">
            </p>
        </form>

        <?php
            if(isset($_POST['btnLogin'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $social = $_POST['social'];

                $arr = array($name, $email, $social);
                setcookie('login', serialize($arr));
                header("Location: login.php");
            }
        ?>
    </body>
</html>