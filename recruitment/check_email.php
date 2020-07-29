<?php
// require_once './PHPMailer/src/PHPMailer.php';
// require_once './PHPMailer/src/Exception.php';
// require_once './PHPMailer/src/OAuth.php';
// require_once './PHPMailer/src/POP3.php';
// require_once './PHPMailer/src/SMTP.php';

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

require_once "./config/config.php";
require_once "./config/router.php";
require_once "./func_change_password.php"; //add
require      'send_mail.php';  

if (isset($_POST["email"])) {
    $email = $connect->real_escape_string($_POST["email"]);
    $sql = "SELECT * FROM usertbl where email='$email'and del_flag = 0";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        // exit(json_encode(array("status" => 1, "msg" => 'Email đã được gửi. Vui lòng kiểm tra hộp thư!')));
        // $str = "mncvbzxafsdgh12345ujkiolpqwertyui67890";
        // $str_mixed = str_shuffle($str);
        // $str_token = substr($str_mixed, 0, 10);
        // $token = $str_token;
        $token = GenerateToken();
        $sqlUpdateToken = "UPDATE usertbl set token = '$token', token_expire = DATE_ADD(NOW(), INTERVAL 5 minute) where email='$email'";
        $connect->query($sqlUpdateToken);  
        // require 'send_mail.php';     
        SendEmail($email, $token);
        echo 1;
    } else {
        echo 0;
    }
    close_connect();
};
