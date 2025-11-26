<!-- =============================================================================
Basic Login System without security and password verify function
testing credentials
email: admin@gmail.com
password: admin@123
============================================================================= -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
    form
    {
        background-color:skyblue;
        height: 400px;
        width: 350px;
        margin: 50px auto;
        padding: 30px;
        border-radius : 15px;
        box-shadow: 0px 0px 20px black inset ;
        border:2px solid rgb(233, 148, 148) ;
    }input
    {
        display: block;
        width: 80%;
        height: 40px;
        margin: 30px 0;
        padding:0 10px;
    }input[type="submit"]
    {
        display: block;
        width: 86%;
        height: 40px;
        margin: 25px 0;
        padding:0 10px;
    }
#error
    {
background-color:lightyellow;
padding: 10px 15px;
display:none;
    }
    </style>
</head>
<body>
<form method="POST" autocomplete="off">
<h1>Login Page</h1>
<input type="email" name="email_id" id="" placeholder="Enter email"  required>
<input type="password" name="password" id="" placeholder="Enter password"  required>
<input type="submit" value="Login">
<span id="error"></span>

<?php

$conn = new mysqli ("localhost", "root","","PHP_BASIC_PROJECTS");
if($conn->connect_error)
{
    echo "Failed to connect database! ";
}
else
{
    if($_SERVER['REQUEST_METHOD'] == "POST")
{
$email_id = $_POST['email_id'];
$password = $_POST['password'];
$sql = "SELECT *FROM users WHERE EMAIL = '$email_id'";
$response = $conn->query($sql);
if($response)

    {
        if($response->num_rows!=0)
        {
        $sql2 = "SELECT *FROM users WHERE PASSWORD = '$password'";
        $response2 = $conn->query($sql2);
        if($response2)
        {
               if($response2->num_rows!=0)
               {
echo "<span style='color:green;'>Login Sucess!</span>";
echo "<script>
setTimeout(()=>
{
 window.location.href='./welcome.html';
},2000);
</script>";
               }
               else
               {

              echo "<script>
               const Error = document.querySelector('#error');
               Error.innerHTML = 'Incorrect password!';
               Error.style.display='block';
setTimeout(()=>
{
 Error.innerHTML = ''
 Error.style.display='none';
},2000);
                    </script>";


               }
        }
        }
        else
        {
     echo "<script>
               const Error = document.querySelector('#error');
               Error.innerHTML = ' User Not Found!';
               Error.style.display='block';
setTimeout(()=>
{
 Error.innerHTML = ''
 Error.style.display='none';
},2000);
                    </script>";

        }
    }
}
}

?>

</form>

</body>
</html>

