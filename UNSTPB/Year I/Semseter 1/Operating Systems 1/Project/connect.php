<?php
$servername = "localhost";
$username = "adiicmp";
$password = "Mcvwrtrb00!";
$databasename = "tensiune";

$dbcon = mysqli_connect($servername, $username, $password, $databasename);
if(!$dbcon){
        die("Failed to connect to database: $databasename ---" . mysqli_connect_error());
}
?>
