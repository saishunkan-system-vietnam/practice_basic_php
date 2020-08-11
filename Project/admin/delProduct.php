<?php 
    require_once './config/router.php';
    require_once FILE_PHP_CONFIG;

    if (isset($_POST["id"])) {
        $id = $_POST["id"];

        // Kết nối DataBase
        connect();

        // update dữ liệu
        $sql = "UPDATE t_product SET del_flg = 1, upadte_datetime = CURRENT_TIMESTAMP() WHERE id = '$id'";
        $result = $conn->query($sql); 
        if ($result) {
            echo json_encode(['status'=>'success']);
        }
        else{
            echo json_encode(['status'=>'error']);
        }
    }
    
    // Đóng kết nối
    disconnect();

?>