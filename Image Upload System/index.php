<?php
include "./db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload System</title>
    <link rel="stylesheet" href="./style.css">

</head>
<body>

<?php
$sql = "SELECT * FROM uploads ORDER BY reg_date DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
$row = $result->fetch_assoc();
}

?>


<form enctype="multipart/form-data" method="POST">
    <div class="profile">
      <h2>Welcome <?= htmlspecialchars($row['name']) ?> </h2>
      <img src="<?= htmlspecialchars($row['file_path']) ?>" alt="Picture"/>
   </div>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>
    <label for="file">Upload Profile Picture :</label>
    <input type="file" id="file" name="file" accept="image/*" required>
    <br>
    <input type="submit" value="Update Profile" name="upload">
</form>





<?php

if(isset($_POST['upload'])) {
    $name = htmlspecialchars($_POST['name']);
    $file = $_FILES['file'];

    // File details
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    // File extension

    $fileExt = explode('.', $fileName);  ///abc.png than it make two array element abc and png
    $fileActualExt = strtolower(end($fileExt));
    // $fileActualExt =pathinfo($fileName, PATHINFO_EXTENSION);

    // Allowed file types
    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) { // 1MB limit
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                // $fileNameNew =$fileName .".".$fileActualExt;
                $fileDestination = 'uploadedimages/'.$fileNameNew;
                $query="INSERT INTO uploads (name, file_path) VALUES ('$name', '$fileDestination')";

                // Here you can add code to insert $name and $fileDestination into your database
$result=$conn->query($query);
$conn->close();
if($result){
    echo "<p>Profile Picture uploaded successfully.</p>";

//   $oldFile = "uploads/" . $row['file_name'];
//     // Step 2: Delete old file if exists
//     if(file_exists($oldFile)){
//         unlink($oldFile);
//     }


    move_uploaded_file($fileTmpName, $fileDestination);
    echo "<p>Upload successful!</p>";
    echo "<p>Your file has been uploaded: <a href='" . $fileDestination . "'>" . $fileNameNew . "</a></p>";
    exit();
} else{
    echo "<p>Error: Could not execute the query.</p>";
}


            } else {
                echo "<p>Your file is too big!</p>";
            }
        } else {
            echo "<p>There was an error uploading your file!</p>";
        }
    } else {
        echo "<p>You cannot upload files of this type!</p>";
    }
}

?>

</body>
</html>