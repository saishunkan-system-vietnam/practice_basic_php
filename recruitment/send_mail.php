<?php

require_once './PHPMailer/src/PHPMailer.php';
require_once './PHPMailer/src/Exception.php';
require_once './PHPMailer/src/OAuth.php';
require_once './PHPMailer/src/POP3.php';
require_once './PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "./config/router.php";

function SendEmail($email_to,  $token)
{

    $email_from = 'minhmailfortest@gmail.com';
    
    $mail = new PHPMailer(true);                              
    try {
        $mail->CharSet  = 'UTF-8';
        $mail->SMTPDebug = 0;                                     
        $mail->isSMTP();                                          
        $mail->Host = 'smtp.gmail.com';                           
        $mail->SMTPAuth = true;                                   
        $mail->Username = $email_from;                            
        $mail->Password = 'm260497h';                             
        $mail->SMTPSecure = 'tls';                                
        $mail->Port = 587;                                        
    
        $mail->setFrom($email_from, 'Admin');
        $mail->addAddress('minhmatloi@gmail.com', 'user');       
        $mail->addAddress($email_to);         
       
        $mail->isHTML(true);                                  
        $mail->Subject = '[MinhNN.com] Đổi mật khẩu';       
        $mail->Body    = "
           Xin chào,<br><br>
           Tôi mà Admin website MinhNN.com!<br>
           Bạn đã gửi yêu cầu thay đổi mật khẩu tài khoản đăng nhập. Để thay đổi mật khẩu hãy click vào link phía dưới: <br>
           <a href = 'http://minhnn.com/set_new_password.php?email=$email_to&token=$token'>
           http:/MinhNN.com/set_new_password.php?email=$email_to'&token=$token
           </a><br><br>
    
           Thank you,<br>
           Admin of MinhNN.com
           
           ";
       
        $mail->send();
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
    
}
?>