<?php
    require_once './config/router.php';
    require_once FILE_PHP_CONFIG;

    if (isset($_GET["email"])) {
        $email = $_GET["email"];

        // Kết nối DataBase
        connect();

        $result = $conn->query("SELECT * FROM t_account WHERE id = '$email' AND del_flg = 0");

        if ($result->num_rows>0) {
            echo json_encode(['status'=>'exists']);
        }
        else{
            echo json_encode(['status'=>'notExists']);
        }
    }
    
    // Đóng kết nối
    disconnect();
?>