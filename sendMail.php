<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'D:/PHP/vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->CharSet = "UTF-8";
    $mail->Host = 'smtp.163.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication

    $mail->Username = 'tzha0007@163.com';                 // SMTP username

    $mail->Password = 'zhangX0323';                           // SMTP password

    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted

    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('tzha0007@163.com', 'Mailer');

    $mail->addAddress('tzha0007@163.com', 'Joe User');     // Add a recipient

    $nametemp = $_POST['reply_form_name'];
    $emailtemp = $_POST['reply_form_email'];
    $subjecttemp = $_POST['reply_form_subject'];
    $contenttemp = $_POST['reply_form_message'];

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = "　　用户姓名：".$nametemp."
    　　邮箱：".$emailtemp."
    　　主题：".$subjecttemp."
    　　留言内容：".$contenttemp;

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "<script>alert('Message has been sent');location.href='./contact.html';</script>";
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}