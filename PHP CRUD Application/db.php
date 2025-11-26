<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "PHP_BASIC_PROJECTS";

$conn = new mysqli($server, $user, $password, $database);

if($conn->connect_error)

    {
        echo "Database Connection Failed!!";
    }


?>