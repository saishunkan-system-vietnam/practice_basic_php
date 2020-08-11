<?
require_once('../config/router.php');
require_once(FILE_CONFIG);

include BASE_PATH . "../PHPMailer-master/src/PHPMailer.php";
include BASE_PATH . "../PHPMailer-master/src/Exception.php";
include BASE_PATH . "../PHPMailer-master/src/OAuth.php";
include BASE_PATH . "../PHPMailer-master/src/POP3.php";
include BASE_PATH . "../PHPMailer-master/src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$conn = ConnectDB();

if(isset($_POST['email']))
{
    $toEmail = $_POST['email'];
    $token = (uniqid(true));

    $sql = "SELECT COUNT(*) as cnt FROM t_account WHERE uid = '$toEmail' and del_flg = 0";

    $result=$conn->query($sql);
        
    if ($result->num_rows > 0)
    {
            $data = $result->fetch_assoc();
            $cnt = $data['cnt'];
            
            if($cnt == 0 )
            {
                die($cnt);
            }
            else
            {
                $content = URL_CHANGE_PASS.'?uid='.$toEmail.'&token='.$token;
                $timeout = time() + 300;

                $sql = "UPDATE t_account SET token = '{$token}', timeout = {$timeout} WHERE uid = '$toEmail' and del_flg = 0";
                $result=$conn->query($sql);


                $mail = new PHPMailer(true);
                try {
                    $mail->SMTPDebug = 2;
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'ssv.survey2020@gmail.com';
                    $mail->Password = 'b9425116a@';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;
                
                    $mail->CharSet = 'UTF-8';
                    $mail->setFrom('ssv.survey2020@gmail.com', 'SSV Survey');
                    $mail->addAddress($toEmail);
                
                    $mail->isHTML(true);
                    $mail->Subject = 'Xác nhận lấy lại mật khẩu';
                    $mail->Body    = $content;
                    $mail->AltBody = '';
                
                    $mail->send();
                } catch (Exception $e) {
                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }
            }
    }
}

if(isset($_POST['uid']) && isset($_POST['checktimeout']) && isset($_POST['token']))
{
    $uid = $_POST['uid'];
    $token = $_POST['token'];

    $sql = "SELECT timeout, token FROM t_account WHERE uid = '$uid' and del_flg = 0";

    $result=$conn->query($sql);
        
    if ($result->num_rows > 0)
    {
        $data = $result->fetch_assoc();
        $timeout = $data['timeout'];
        $tokendb = $data['token'];
        
        if($timeout < time() || $tokendb != $token)
        {
            echo false;
        }
        else
        {
            echo true;
        }
    }
}

if(isset($_POST['uid']) && isset($_POST['changepass']) && isset($_POST['pass']))
{
    $uid = $_POST['uid'];
    $pass = $_POST['pass'];
    $token = (uniqid(true));

    $sql = "UPDATE  t_account SET pass = '{$pass}', token = '{$token}', timeout = 0 WHERE uid = '$uid' and del_flg = 0";

    $result=$conn->query($sql);
    echo $result;
}

$conn = ConnectDB();
?>