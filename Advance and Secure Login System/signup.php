<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Get POST data and sanitize
    $Username = trim(mysqli_real_escape_string($conn, $_POST['Name']));
    $Email = trim(mysqli_real_escape_string($conn, $_POST['Email']));
    $Password = trim($_POST['Password']); // hash later

    // Validate email
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit();
    }

    // Check if email already exists
    $check_stmt = $conn->prepare("SELECT * FROM signup_data  WHERE email = ?");
    $check_stmt->bind_param("s", $Email);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result && $check_result->num_rows >= 1) {
        echo " This email is already registered!";
        exit();
    }

    // All fields required
    if (!empty($Username) && !empty($Email) && !empty($Password)) {

        // Hash the password
        $hashed_password = password_hash($Password, PASSWORD_DEFAULT);

        // Insert user using prepared statement
        $stmt = $conn->prepare("INSERT INTO signup_data (NAME, EMAIL, PASSWORD) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $Username, $Email, $hashed_password);

        if ($stmt->execute()) {
 echo "Success!";

            }
            else

              {
                echo "Faile!";
              }

        }
        else

          {
            echo "All Filled Required!!";
          }
        }

        else
        {
echo "Server Method not POST!";
        }

?>
