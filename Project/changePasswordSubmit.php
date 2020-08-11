<?php
    require_once './config/router.php';
    require_once FILE_PHP_CONFIG;

    if (isset($_POST["email"]) && isset($_POST["token"]) && isset($_POST["password"])) {
        $email = $_POST["email"];
        $token = $_POST["token"];
        $password = md5($_POST["password"]);

        // Kết nối DataBase
        connect();

        // Kiểm tra có phải là mail cần đổi mật khẩu và có quá thời gian cho phép không?
        $resultSelect = $conn->query("SELECT * FROM t_account WHERE id = '$email' AND token = '$token' AND del_flg = 0 AND ADDTIME(update_datetime,'0:05:00') > CURRENT_TIMESTAMP()");

        // Trường hợp là mail đổi mật khẩu và trong thời gian cho phép.
        if ($resultSelect->num_rows>0){
            $resultUpdate = $conn->query("UPDATE t_account SET password='$password', update_datetime = CURRENT_TIMESTAMP() WHERE id='$email' AND del_flg = 0");
            
            // Kiểm tra đổi mật khẩu
            if ($resultUpdate){
                echo 'Đổi mật khẩu thành công';
            }else{
                echo 'Đổi mật khẩu thất bại';
            }
        }
        else{
            echo 'Email không chính xác hoặc đã quá thời gian cho phép đổi mật khẩu. Xin vui lòng thử lại';
        }
    }
    // Đóng kết nối
    disconnect();
?>