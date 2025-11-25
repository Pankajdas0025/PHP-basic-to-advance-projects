<?php
session_start();
include 'db.php';



        if($_SERVER['REQUEST_METHOD']=="POST"){

    $Email = mysqli_real_escape_string($conn, strip_tags($_POST['uEmail']));
    $Pass = mysqli_real_escape_string($conn, $_POST['uPass']);


    // $sqlcheck="SELECT *FROM signup_data
    //  WHERE EMAIL='$Email' ";
    //  $response=$conn->query($sqlcheck);
    //  if($response->num_rows == 1)


    $stmt = $conn->prepare("SELECT * FROM signup_data WHERE EMAIL = ?");
    $stmt->bind_param("s", $Email);
    $stmt->execute();
    $response = $stmt->get_result();

    if($response->num_rows == 1){
        $row = $response->fetch_assoc();

        if(password_verify($Pass, $row['PASSWORD'])){

            $_SESSION['email'] = $Email;
            $_SESSION['password'] =$Pass;
            $_SESSION['name'] = $row['NAME'];
            $_SESSION['last_activity'] = time(); // Store login time


            header("Location: welcome.php");
            exit;
        } else {
            echo "<script>alert('Invalid password'); window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('User Not Found'); window.location='index.php';</script>";
    }
}



?>
