<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$hostname = "localhost";
$username = "root";
$password = "";
$database = "social";

// Create a connection to the MySQL server
$con = mysqli_connect($hostname, $username, $password, $database);

?>

<html>
    <body>
        <h1>Success</h1>
</body>
</html>

