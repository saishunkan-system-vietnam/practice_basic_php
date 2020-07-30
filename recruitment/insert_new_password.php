<?php
require_once "./config/config.php";
require_once "./config/router.php";

if (isset($_POST['password']) && isset($_POST['email']) && isset($_POST['token'])) {

    $password = $connect->real_escape_string($_POST['password']);
    $email = $connect->real_escape_string($_POST['email']);
    $token = $connect->real_escape_string($_POST['token']);

    $sql = "SELECT * FROM usertbl where email='$email'and token='$token'
           and token != '' and token_expire > NOW() and del_flag = 0";

    $result = $connect->query($sql);

    if ($result->num_rows <= 0) {
        close_connect();
        echo "Link đổi mật khẩu có thể đã hết hạn hoặc đường dẫn url đã bị thay đổi. Vui lòng kiểm tra lại!";
        return;
    }

    $sqlUpdate = "UPDATE usertbl set password = '$password', token = concat(token, '_expired') where email='$email'";

    if ($connect->query($sqlUpdate) === true) {
        echo 1;
        close_connect();
        return;
    }
    else
    {
        close_connect();
        echo "Đã xảy ra lỗi. Đổi mật khẩu thất bại";
    }
}
