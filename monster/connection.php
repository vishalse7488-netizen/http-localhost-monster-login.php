<?php
$server   = "localhost";
$username = "root";
$password = ""; 
$dbname   = "login_db";

$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Database connected successfully!";
}
?>
