
<?php
include './db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM students WHERE ID=$id");
header("Location:index.php?delete=success");
?>