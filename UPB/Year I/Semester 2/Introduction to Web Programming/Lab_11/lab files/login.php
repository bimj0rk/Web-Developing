<?php
    $arr = unserialize($_COOKIE['login']);
    echo "Name:" . " " . $arr[0];
    echo "<br>";
    echo "Email:" . " " . $arr[1];
    echo "<br>";
    echo "Social website:" . " " . $arr[2];
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <link rel = "stylesheet" href = "css/styles.css">
        <meta charset = "UTF-8">
        <title>Login</title>
    </head>
</html>