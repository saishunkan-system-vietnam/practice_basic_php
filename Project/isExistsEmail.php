<?php
    require './config/router.php';
    require FILE_PHP_CONFIG;

    if (isset($_GET["email"])) {
        $email = $_GET["email"];
        $result = $mysqli->query("SELECT * FROM t_account WHERE id = '$email' AND del_flg = 0");

        if ($result->num_rows>0) {
            echo json_encode(['status'=>'exists']);
        }
        else{
            echo json_encode(['status'=>'notExists']);
        }
    }
    // Đóng kết nối
    $mysqli -> close();
?>