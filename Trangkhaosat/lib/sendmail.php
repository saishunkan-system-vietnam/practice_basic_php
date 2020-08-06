<?
require_once('../config/router.php');

include BASE_PATH . "../PHPMailer-master/src/PHPMailer.php";
include BASE_PATH . "../PHPMailer-master/src/Exception.php";
include BASE_PATH . "../PHPMailer-master/src/OAuth.php";
include BASE_PATH . "../PHPMailer-master/src/POP3.php";
include BASE_PATH . "../PHPMailer-master/src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
die(uniqid(true));
if(isset($_POST['email']))
{
    $address = $_POST['email'];
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'ssv.survey2020@gmail.com';                 // SMTP username
    $mail->Password = 'b9425116a@';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
 
    //Recipients
    $mail->CharSet = 'UTF-8';
    $mail->setFrom('ssv.survey2020@gmail.com', 'SSV Survey');
    $mail->addAddress($address);     // Add a recipient
 
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Xác nhận lấy lại mật khẩu';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = '';
 
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
}

?>