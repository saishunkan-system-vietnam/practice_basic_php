<?php
require_once "./config/config.php";
require_once "./config/router.php";

if (isset($_POST["email"])) {
    $email = $connect->real_escape_string($_POST["email"]);

    $sql = "SELECT * FROM usertbl where email='$email'and del_flag = 0";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        // exit(json_encode(array("status" => 1, "msg" => 'Email đã được gửi. Vui lòng kiểm tra hộp thư!')));
        $str = "mncvbzxafsdgh12345ujkiolpqwertyui67890";
        $str_mixed = str_shuffle($str);
        $str_token = substr($str_mixed, 0, 10);
        $token = $str_token;
        echo 1;
    } else {
        // Email không tồn tại. Vui lòng kiểm tra lại email!
        // exit(json_encode(array("status" => 0, "msg" => 'ssss')));
        echo 0;
    }
    close_connect();
};
