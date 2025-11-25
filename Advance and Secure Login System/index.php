<?php

if(isset($_GET['session_expired'])){
    echo "<script>alert('Session expired! Please login again.');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Advance & Secure Login System</title>

<link rel="manifest" href="favicon_io/site.webmanifest">
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<!-- cdn JQUARY -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>

<!--code For pop up alert when signup  ------------------------------------------------------------------------------>


  <main>
<!--code For signup form------------------------------------------------------------------------------>
    <div class="box">
      <div class="sh">
         &nbsp; Create Your Account ✨
      </div>
      <form autocomplete="off" >
        <input type="text" id="uName" placeholder="Enter your name" onchange="checkName() "required>
             <input type="email" id="uEmail" placeholder="Enter your email"  onchange="checkEmail() "required>
                 <input type="password" id="uPass" placeholder="Password" maxlength="12" onchange="checkPass() "required>
                             <input type="submit" name="Signupbtn" value="Confirm" id="Signupbtn">
                                    <p>Allready have an account ? &nbsp; <a href="#" id="lbtn">Login</a></p>
                                    <div class="header"> </div>
                                          </form>
<!--code For login form ------------------------------------------------------------------------------>
      <div class="box2">
          <div class="sh">
                  Welcome Back 👋
                        </div>
      <P>Login to continue to your blog dashboard</P>
      <form action="login.php" method="post" autocomplete="off">
            <input type="text" name="uEmail" placeholder="Enter your email" required>
                  <input type="password" name="uPass" placeholder="Password" maxlength="12" required>
                           <input type="submit" name="Loginbtn" value="Login" id="Loginbtn">
                                      <p>New user? &nbsp; <a href="signup.php" id="Sibtn">Sign Up</a></p>
      </form>
      </div>
    </div>


<!-- Jquary and AJAX reqest to send signup from data to signup.php and recive result ---------------------------------------------------------->
    <script>
  $(document).ready(function () {
    $("#Signupbtn").click(function (e) {
      e.preventDefault(); // Prevent default form submission
      // variable assignments
      var username = $("#uName").val().trim();
      var email = $("#uEmail").val().trim();
      var pass = $("#uPass").val().trim();
      if(username==="" && email==="" && pass==="")
    {
      alert("All files is Requied!");
    }

      $.ajax({
        type: "POST",
        url: "signup.php",
        data: {
          Name: username,
          Email: email,
          Password: pass
        },
        success: function (response) {
          $(".header").html(response).fadeIn(1500);
// set time out to hide the popup alert  window .............................................................................>
          setTimeout(function () {
            $(".header").fadeOut(1500);
            window.location.href="#";
          },2000);
        }
      });
    });
  });
</script>
  </main>
  <script src="script.js"></script>
</body>
</html>