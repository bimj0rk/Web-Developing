<?php
$servername = "localhost";
$username = "webapp";
$password = "webapp";
$databasename = "webapp";

$dbcon = new mysqli ($servername, $username, $password, $databasename) 
         or die ("Connection failed: " . $dbcon -> error);

?>
