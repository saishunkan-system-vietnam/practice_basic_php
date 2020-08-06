<?php
require '../config/router.php';
require FILE_PHP_CONFIG;

if (isset($_POST["id"])) {
    $id = $_POST["id"];

    // update dữ liệu
    $sql = "UPDATE t_order_detail SET del_flg = 1 , upadte_datetime = CURRENT_TIMESTAMP()  WHERE id_order = '$id'";
    $orderDetail = $mysqli->query($sql);
    if ($orderDetail) {
        $sql = "UPDATE t_order SET del_flg = 1 , upadte_datetime = CURRENT_TIMESTAMP()  WHERE id = '$id'";
        $order = $mysqli->query($sql);
        if ($order) {
            echo json_encode(['status' => 'success']);
        }
        else{
            echo json_encode(['status' => 'error']);
        }
       
    } else {
        echo json_encode(['status' => 'error']);
    }
}

// Đóng kết nối
$mysqli->close();
?>