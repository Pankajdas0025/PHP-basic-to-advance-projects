<?php
$servername = "localhost";
$username = "root";
$password = "Pankaj#12345";
$dbname = "php_basic_projects";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
