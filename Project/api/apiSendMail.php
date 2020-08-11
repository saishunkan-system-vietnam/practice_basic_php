<?php
session_start();
require('../config/router.php');
require(SITE_API_CONFIG);
$to =  trim($_POST['mail']);
$subject = 'Link đổi mật khẩu';

$encoded_subject = mb_encode_mimeheader($subject,"UTF-8");

$from = 'shadowin1811@gmail.com';

$token = substr(md5(rand(0, 100000)), 0, 16);
$route = "http://nhanvp.com/changePass.php?email=$to&token=$token";

$headers = 'From: nhanvp.com' . "\r\n" .
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion() . "\r\n" .
    'Content-type: text/html; charset=UTF-8' .
    'charset: UTF-8';
$message = "
<h2>Chào bạn,</h2>
        <p>Chúng tôi nhận được một yêu cầu của bạn về việc thay đổi mật khẩu.</p>
        <p>Để thay đổi mật khẩu bạn hãy nhấp vào link sau <a href=$route>Tích vào đây</a></p>
</body>";

$sql_select_mail = "SELECT * FROM t_account WHERE email = '$to' AND admin_flg = 0 AND del_flg = 0";
$result_select_mail = mysqli_query($connect, $sql_select_mail) or die("Lỗi truy vấn");


if (!mysqli_num_rows($result_select_mail)) {
    echo false;
} else {

    $sqlUPD = "UPDATE t_account SET token = '$token', update_datetime = CURRENT_TIMESTAMP(), time_token = ADDTIME(CURRENT_TIMESTAMP(), '00:05:00') WHERE email = '$to' AND admin_flg = 0 AND del_flg = 0";

    if (mysqli_query($connect, $sqlUPD)) {
        $success = mail($to, $encoded_subject, $message, $headers);
        if ($success) {
            echo true;
        } else {
            echo false;
        }
    } else {
        echo false;
    }
    mysqli_close($connect);
}
