<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$hostname = "localhost";
$username = "root";
$password = "";
$database = "social";

// Create a connection to the MySQL server
$con = mysqli_connect($hostname, $username, $password, $database);
$query = mysqli_query($con, "INSERT INTO test (name) VALUES ('Venkat')");
?>
<html>
<head>
</head>
<body>
    <main>
        <h1>Welcome to My Website</h1>
    </main>
</body>
</html>
