<?php
session_start();
include 'session.php';
include 'db.php';

if(isset($_SESSION['email']) && isset($_SESSION['name'])) {

    $Email = $_SESSION['email'];
    $Name = $_SESSION['name'];
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home | Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f4f7fc;
        }

        #logout{
            text-decoration: none;
            background: #ff2e63;
            padding: 8px 12px;
            border-radius: 5px;
            color: #fff;
            font-size: 15px;
            width:20%;

        }
        .container {

            margin-top: 50px;
        }
        .card {
            color: #ffffffff;
            border-radius:15px;
            height: 500px;
            width: 420px;
            margin:70px auto ;
            background: linear-gradient(180deg,#6366f1,#f43f5e);
            box-shadow:0px 0px 20px black inset;
            padding:50px 1.5%;
            text-align:left;
            box-sizing:border-box;
            display:flex;
            flex-direction:column;


        }
        h2 {
            margin-bottom: 10px;

        }
        p {
            font-size: 16px;
            font-weight: 600;

        }
    </style>
</head>
<body>
    <div class="container">

        <div class="card">
            <h2>Welcome to Your Dashboard 👋</h2>
            <p><b>Name:</b> <?php echo $Name; ?></p>
            <p><b>Email:</b> <?php echo $Email; ?></p>
            <a  id="logout" href="logout.php" >Logout</a>
        </div>
    </div>

</body>
</html>
