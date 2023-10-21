<?php
ob_start();

$timezone = date_default_timezone_set("America/Chicago");
error_reporting(E_ALL);
ini_set('display_errors', 1);

$hostname = "localhost";
$username = "root";
$password = "";
$database = "social";

// Create a connection to the MySQL server
$con = mysqli_connect($hostname, $username, $password, $database);

?>