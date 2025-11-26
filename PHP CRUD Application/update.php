
 <?php
 include "./db.php";

 if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $id = $_POST['uid'];
    $name = $_POST['uname'];
    $course = $_POST['ucourse'];
    $email = $_POST['uemail'];

    $stmt = $conn->prepare("UPDATE students SET NAME=?, COURSE=?, EMAIL=? WHERE ID=?");
    $stmt->bind_param("sssi", $name, $course, $email, $id);
    $stmt->execute();
    header("Location:index.php?update=success");
    exit();


}
  ?>