<?php 
    require '../config/config.php';

    if (isset($_POST["id"]) && isset($_POST["fullname"]) && isset($_POST["sex"]) && isset($_POST["bday"])
    && isset($_POST["phone"]) && isset($_POST["address"]) ) {
        $id = $_POST["id"];
        $fullname = $_POST["fullname"];
        $sex = (int)$_POST["sex"];
        $bday = $_POST["bday"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $role = $_POST["role"];

        // update dữ liệu
        $sql = "UPDATE t_account SET fullname ='$fullname', sex =$sex , birthday = '$bday', phone = '$phone', address = '$address',  role =$role WHERE id = '$id'";
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