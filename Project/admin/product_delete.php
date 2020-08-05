<?php
    require '../config/router.php';
    require FILE_PHP_CONFIG;

    if (isset($_POST["id"])) {
        $id = $_POST["id"];

        // update dữ liệu
        $sql = "UPDATE t_product SET del_flg = 1 , upadte_datetime = CURRENT_TIMESTAMP()  WHERE id = '$id'";
        $result = $mysqli->query($sql); 
        if ($result) {
            echo json_encode(['status'=>'success']);
        }
        else{
            echo json_encode(['status'=>'error']);
        }
    }
    
    // Đóng kết nối
    $mysqli -> close();
?>