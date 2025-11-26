
 <?php

 include "./db.php";
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $name =htmlspecialchars( $_POST['stname']);
      $course =htmlspecialchars( $_POST['stcourse']);
      $email =htmlspecialchars( $_POST['stemail']);


      $stmt = $conn->prepare("INSERT INTO students (NAME, COURSE, EMAIL) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $name, $course, $email);
      $stmt->execute();
      header("Location:index.php?create=success");

      exit();
  }
  ?>