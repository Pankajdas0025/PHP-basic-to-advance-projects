<?php

      if(isset($_GET['status']) && $_GET['status'] == "send" )
{
   echo "<script>alert('✅ Message sent successfully!');</script>";
}

      elseif(isset($_GET['status']) && $_GET['status'] == "fail")
{
  echo "<script>alert('😟Message sent Failed!');</script>";
}
else echo "<script>alert('😎 Try Again!');</script>";
?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Email Sender</title>
  <style>
#container

{

  box-shadow: 0px 0px 25px black inset;
  border-radius: 15px;
}
    </style>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div id="container" class="bg-white p-10 rounded-1xl shadow-xl w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center text-indigo-600">Send Email Testing</h2>

    <form action="send.php" method="POST" class="space-y-4">
      <div>
        <label class="block text-sm font-semibold text-gray-700">Receiver Email</label>
        <br>
        <input type="email" name="to_email" required
          class="w-full px-4 py-2 border rounded-lgI.  focus:ring-2 focus:ring-indigo-400"/>
      </div>

      <button type="submit"
        class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition-all duration-300"
        onclick=" ">
        Send
      </button>
    </form>
  </div>

</body>
</html>




<?php

