<?php 
    require '../config/config.php';
    $output = '';

    if (isset($_POST["id"])) {
        $id = $_POST["id"];

        // Select dữ liệu
        $result = $mysqli->query("SELECT * FROM t_account WHERE id = '$id' "); 
        if ($result->num_rows) {
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }   
        }
        echo json_encode($data);
    }
    
    // Đóng kết nối
    $mysqli -> close();

?>