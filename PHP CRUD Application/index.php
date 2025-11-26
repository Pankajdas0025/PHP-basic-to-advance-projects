<?php include "./db.php";


if (isset($_GET['create']) && $_GET['create'] === 'success') {
    echo "
    <script>
    window.addEventListener('load', function () {
        const msg = document.querySelector('.message');
        msg.innerHTML = 'Record created successfully!';
        msg.style.color = 'green';
        setTimeout(() => msg.innerHTML = '', 3000);
    });
    </script>";
}

else if (isset($_GET['delete']) && $_GET['delete'] === 'success') {
    echo "
    <script>
    window.addEventListener('load', function () {
        const msg = document.querySelector('.message');
        msg.innerHTML = 'Record deleted successfully!';
        msg.style.color = 'red';
        setTimeout(() => msg.innerHTML = '', 3000);
    });
    </script>";
}

else if (isset($_GET['update']) && $_GET['update'] === 'success') {
    echo "
    <script>
    window.addEventListener('load', function () {
        const msg = document.querySelector('.message');
        msg.innerHTML = 'Record updated successfully!';
        msg.style.color = '#0077ff';
        setTimeout(() => msg.innerHTML = '', 3000);
    });
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD Application</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<main>
    <!-- Update Popup Modal -->
<div class="updateModal" id="updateModal">
    <div class="updateBox">
        <h3>Update Student</h3>
        <form method="POST" action="update.php">
            <input type="hidden" name="uid" id="uid">
            <input type="text" name="uname" id="uname" placeholder="Enter Student name" required>
            <input type="text" name="ucourse" id="ucourse" placeholder="Enter Student course" required>
            <input type="email" name="uemail" id="uemail" placeholder="Enter Student email" required>
            <button type="submit" class="updateSubmit">Update</button>
            <button type="button" id="closeModal">Cancel</button>
        </form>
    </div>
</div>

<div class="heading">
   <div class="head">
     <div><i class="fa-solid fa-list"></i> Students List</div>
     <div class="message"></div>
    </div>
    <button id="addbtn">Add Student <i class="fa-solid fa-plus"></i></button>
</div>

<div>
  <form class="add" method="POST" action="create.php">
    <input type="text" name="stname" placeholder="Enter Student name" required />
    <input type="text" name="stcourse" placeholder="Enter Student course" required />
    <input type="email" name="stemail" placeholder="Enter Student Email" required />
    <input type="submit" value="Submit" />
  </form>
</div>

<table border="1">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Course</th>
        <th>Email</th>
        <th>Action</th>
    </thead>
    <tbody>

<?php
$stmt = $conn->prepare("SELECT * FROM students");
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "
        <tr>
            <td>{$row['ID']}</td>
            <td>{$row['NAME']}</td>
            <td>{$row['COURSE']}</td>
            <td>{$row['EMAIL']}</td>
            <td>
            <button class='editBtn a1' data-id='{$row['ID']}' data-name='{$row['NAME']}'  data-course='{$row['COURSE']}' data-email='{$row['EMAIL']}'><i class='fa-solid fa-pen-to-square'></i>  </button>
            <a class='a3' href='delete.php?id={$row['ID']}'> <i class='fa-solid fa-trash'></i> </a>
            </td>
        </tr>";
    }
}
?>
    </tbody>
</table>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="./script.js"></script>

</body>
</html>
