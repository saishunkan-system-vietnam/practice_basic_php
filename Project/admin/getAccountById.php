<?php 
     require_once '../config/router.php';
     require_once FILE_PHP_CONFIG;

    if (isset($_POST["id"])) {
        $id = $_POST["id"];

        // Kết nối DataBase
        connect();

        // Select dữ liệu
        $result = $conn->query("SELECT * FROM t_account WHERE id = '$id'"); 
        if ($result->num_rows>0) {
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }   
        }
        echo json_encode($data);
    }
    
    // Đóng kết nối
    disconnect();

?>