<?php
    require './config/router.php';
    require FILE_PHP_CONFIG;

    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        $result = $mysqli->query("UPDATE account SET password='$password' WHERE id='$email'");

        if ($result){
            echo 'Đổi mật khẩu thành công';
        }else{
            echo 'Đổi mật khẩu thất bại';
        }
    }
    // Đóng kết nối
    $mysqli -> close();
?>