<?php 
    require '../config/config.php';

    if (isset($_POST["id"])) {
        $id = $_POST["id"];

        // update dữ liệu
        $sql = "UPDATE t_account SET del_flg = 1 WHERE id = '$id'";
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