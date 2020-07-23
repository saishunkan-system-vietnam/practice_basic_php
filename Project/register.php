<?php
    require './config/router.php';
    require FILE_PHP_CONFIG;
    $isExists = false;

    if (isset($_GET["email"])) {
        $email = $_GET["email"];
        $result = $mysqli->query("SELECT * FROM account WHERE email = '$email'");

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

        $sqlinsert="INSERT INTO account(`fullname`, `password`, `birthday`, `sex`, `phone`, `email`, `address`) VALUES ('$name','$password','$bday',$sex,'$phone','$email','$address')";

        if($mysqli->query($sqlinsert)){
            echo true;
        }else{
            echo false;
        }
    }

    // Đóng kết nối
    $mysqli -> close();
?>