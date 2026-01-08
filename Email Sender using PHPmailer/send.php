<!-- =============================================================================
 send email using SMTP (PHPmailer)
 ================================================================================-->

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library files
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = htmlspecialchars($_POST['to_email']);
    $message = "<body style='margin: 0; padding:2px; background-color: #f4f4f4; font-family: Arial, sans-serif; line-height: 1.2; color: #333;'>
               <div style='max-width: 500px; margin: auto; padding: 15px; border-radius: 10px; box-shadow: 0px 0px 2cap black inset;'>
                <h1 style='color: #ffffff; padding:50px; background: linear-gradient(to right, #6366f1,#f43f5e); text-align: center; font-size:1.5rem;'>
                WELCOME 🙏
                </h1>
                <div style='background-color: #ecf0f1; padding: 10px; border-radius: 5px; margin-top: 20px;'>
                This Email is sending to you for Testing Purpose ! We use PHPMailer for This Email..
                <p><strong>Best regards</strong></p>
                <p>PHPmailer</p>
                </div>
                </div>
                </body>";



    // Send email =========================================
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'pd5569121@gmail.com';
         // Gmail App Password (16 digits) =============================
        $mail->Password = 'carp uidg qexa ****';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('pd5569121@gmail.com', 'Test PHPMailer');
        $mail->addAddress($to);


        $mail->isHTML(true);
        $mail->Subject = "PHPmailer Testing";
        $mail->Body = $message;
        $mail->send();
        header("location: index.php?status=send");

        }
        catch (Exception $e)
            {
            header("location: index.php?status=fail");
            }

}
?>