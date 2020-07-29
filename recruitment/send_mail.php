<?php
// require './PHPMailer/src/Exception.php';
// require './PHPMailer/src/PHPMailer.php';
// require './PHPMailer/src/SMTP.php';

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// require 'C:\xampp\phpMyAdmin\vendor\autoload.php';


require_once './PHPMailer/src/PHPMailer.php';
require_once './PHPMailer/src/Exception.php';
require_once './PHPMailer/src/OAuth.php';
require_once './PHPMailer/src/POP3.php';
require_once './PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "./func_change_password.php"; 
require_once "./config/router.php";

function SendEmail($email_to,  $token)
{

    $email_from = 'minhmailfortest@gmail.com';
    // $str = "mncvbzxafsdgh12345ujkiolpqwertyui67890";
    // $str_mixed = str_shuffle($str);
    // $str_token = substr($str_mixed, 0, 10);
    // $token = $str_token;
    // $token = GenerateToken();
    
    $mail = new PHPMailer(true);                              
    try {
        //Server settings
        $mail->CharSet  = 'UTF-8';
        $mail->SMTPDebug = 0;                                     // Enable verbose debug output
        $mail->isSMTP();                                          // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                           // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
        $mail->Username = $email_from;                                 // SMTP username
        $mail->Password = 'm260497h';                             // SMTP password
        $mail->SMTPSecure = 'tls';                                // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                        // TCP port to connect to
    
        $mail->setFrom($email_from, 'Admin');
        $mail->addAddress('minhmatloi@gmail.com', 'user');        // Add a recipient
        $mail->addAddress($email_to);         // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
    
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = '[MinhNN.com] Đổi mật khẩu';
        // $mail->Body    = 'This is the HTML message bodygfffdgdfgdfgdf <b>in bold!</b>';
        $mail->Body    = "
           Xin chào,<br><br>
           Tôi mà Admin website MinhNN.com!<br>
           Bạn vừa gửi yêu cầu thay đổi mật khẩu của tài khoản đăng nhập. Để thay đổi mật khẩu hãy click vào link phía dưới: <br>
           <a href = 'http://minhnn.com/set_new_password.php?email=$email_to&token=$token'>
           http:/MinhNN.com/set_new_password.php?email=$email_to'&token=$token
           </a><br><br>
    
           Thank you,<br>
           Admin of MinhNN.com
           
           ";
       
        $mail->send();
        //echo 'Thư đã được gửi đi';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
    
}
?>