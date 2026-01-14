<?php
$servername = "localhost";
$username = "root";
$password = "pankaj";
$dbname = "php_basic_projects";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get ID if we are updating
    $update_id = isset($_GET['edit']) ? intval($_GET['edit']) : 0;
    $oldImage = "";
    $oldName = "";

        // If editing, fetch old data
        if($update_id > 0){
            $fetch = $conn->query("SELECT * FROM uploads WHERE id=$update_id");
            if($fetch->num_rows > 0){
                $data = $fetch->fetch_assoc();
                $oldImage = $data['file_path'];
                $oldName = $data['name'];
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Upload</title>
    <style>
        form {border:3px solid #f1f1f1;width:500px;padding:10px;margin:50px auto;background:#556B6B;min-height:300px;}
        input[type=text],input[type=file]{width:100%;padding:12px 20px;margin:8px 0;border:1px solid #ccc;box-sizing:border-box;}
    </style>
</head>
<body>

<form enctype="multipart/form-data" method="POST">
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $oldName; ?>" required>

    <label>Image:</label>
    <?php if($oldImage != ""): ?>
        <img src="<?php echo $oldImage; ?>" width="100"><br>
    <?php endif; ?>

    <input type="file" name="file" <?php echo $update_id==0 ? "required" : ""; ?>>

    <input type="submit" name="<?php echo $update_id>0 ? "update" : "upload"; ?>" value="<?php echo $update_id>0 ? "Update" : "Upload"; ?>">
</form>

<?php
// ---------- Insert New File ----------
if(isset($_POST['upload'])) {

    $name = htmlspecialchars($_POST['name']);
    $file = $_FILES['file'];
    $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg','jpeg','png','gif'];

    if(in_array($fileExt,$allowed)){
        $newName = uniqid().".".$fileExt;
        $fileDest = "uploadedimages/".$newName;

        if(move_uploaded_file($file['tmp_name'],$fileDest)){
            $conn->query("INSERT INTO uploads(name,file_path) VALUES('$name','$fileDest')");
            echo "<p>Uploaded Successfully!</p>";
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }
    }
}

// ---------- Update + Delete Old File ----------
if(isset($_POST['update']) && $update_id>0){

    $name = htmlspecialchars($_POST['name']);
    $newFileDest = $oldImage; // default old image

    if(isset($_FILES['file']) && $_FILES['file']['name']!=""){

        $file = $_FILES['file'];
        $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if(in_array($fileExt, ['jpg','jpeg','png','gif'])){
            $newName = uniqid().".".$fileExt;
            $newFileDest = "uploadedimages/".$newName;

            // delete previous file
            if(file_exists($oldImage)){
                unlink($oldImage);
            }

            move_uploaded_file($file['tmp_name'],$newFileDest);
        }
    }

    $conn->query("UPDATE uploads SET name='$name', file_path='$newFileDest' WHERE id=$update_id");
    echo "<p>Updated Successfully!</p>";
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}
?>

<table border="1" cellpadding="10" style="margin:auto; margin-top:20px;">
    <tr>
        <th>Name</th>
        <th>Image</th>
        <th>Action</th>
    </tr>

<?php
$result = $conn->query("SELECT * FROM uploads");
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<tr>
            <td>{$row['name']}</td>
            <td><img src='{$row['file_path']}' width='100'></td>
            <td><a href='?edit={$row['id']}'>Edit</a></td>
        </tr>";
    }
}
$conn->close();
?>
</table>

</body>
</html>
