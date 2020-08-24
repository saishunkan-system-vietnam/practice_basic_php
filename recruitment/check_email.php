<?php
require_once "./config/config.php";
require_once "./config/router.php";
require_once 'send_mail.php';  

if (isset($_POST["email"])) {
    $email = $connect->real_escape_string($_POST["email"]);
    $sql = "SELECT * FROM t_account where id='$email'and del_flg = 0";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $str = "mncvbzxafsdgh12345ujkiolpqwertyui67890";
        $str_mixed = str_shuffle($str);
        $token = substr($str_mixed, 0, 10);

        $sqlUpdateToken = "UPDATE t_account set token = '$token', token_expire = DATE_ADD(NOW(), INTERVAL 5 minute), update_datetime = NOW() where id='$email'";
        $connect->query($sqlUpdateToken);  

        SendEmail($email, $token);
        echo 1;
    } else {
        echo 0;
    }

    close_connect();
}
