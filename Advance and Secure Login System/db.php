<?php


$conn = new mysqli("localhost", "root", "Pankaj#12345", "php_basic_projects");
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
?>
