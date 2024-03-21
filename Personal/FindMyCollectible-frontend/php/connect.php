<?php
$servername = "localhost";
$username = "findmy";
$password = "findmy";
$databasename = "findmy";

$dbcon = new mysqli ($servername, $username, $password, $databasename) 
         or die ("Connection failed: " . $dbcon -> error);

?>
