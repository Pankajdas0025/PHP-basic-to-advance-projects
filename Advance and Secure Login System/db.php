<?php
$server="localhost";
$password = "pankaj"; //Enter your Password
$user="root";
$database="php_basic_projects";

$conn = new mysqli($server , $user , $password , $database);
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
?>
