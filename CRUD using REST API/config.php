<?php

$conn =new mysqli("localhost","root","pankaj","php_basic_projects");

if($conn->connect_error){
    die("Connection Failed : ". $conn->connect_error);
}

 ?>