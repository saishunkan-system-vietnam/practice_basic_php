<?php
    require './config/router.php';
    require FILE_PHP_CONFIG;
    echo "ágdjadjsd";
    $isExists = false;

    if (isset($_GET["email"])) {
        $email = $_GET["email"];
        $result = $mysqli->query("SELECT * FROM t_account WHERE id = '$email' AND del_flg = 0 ");

        if ($result->num_rows){
            $isExists = true;
        }

        echo $isExists;
    }

    if (isset($_POST["email"])) {
        $name=$_POST["fullname"];
        $sex = (int)$_POST["sex"];
        $bday = $_POST['bday'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $password = md5($_POST['password']);

        $sqlinsert="INSERT INTO t_account(`fullname`, `password`, `birthday`, `sex`, `phone`, `id`, `address`) VALUES ('$name','$password','$bday',$sex,'$phone','$email','$address')";

        if($mysqli->query($sqlinsert)){
            echo json_encode(['status'=>'success']);
        }else{
            echo json_encode(['status'=>'error']);
        }
    }

    // Đóng kết nối
    $mysqli -> close();
?>