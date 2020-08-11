<?php
    require_once './config/router.php';
    require_once FILE_PHP_CONFIG;

    if (isset($_POST["email"])) {
        $name=$_POST["fullname"];
        $sex = (int)$_POST["sex"];
        $bday = $_POST['bday'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $password = md5($_POST['password']);

        // Kết nối DataBase
        connect();

        $sqlinsert="INSERT INTO t_account(`fullname`, `password`, `birthday`, `sex`, `phone`, `id`, `address`,`create_datetime`) VALUES ('$name','$password','$bday',$sex,'$phone','$email','$address', CURRENT_TIMESTAMP())";
        $result = $conn->query($sqlinsert);
        if($result){
            echo json_encode(['status'=>'success']);
        }else{
            echo json_encode(['status'=>'error']);
        }
    }

    // Đóng kết nối
    disconnect();
?>