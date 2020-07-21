<?php
    session_start();
    require './config/router.php';
    require FILE_PHP_CONNECT;

    if (isset($_POST["register"])) {
        $name=$_POST["name"];
        $sex = $_POST["sex"];
        $bday = $_POST['bday'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $password = md5($_POST['password']);

        $sqlselect = "SELECT count(*) as 'total' FROM `account` WHERE email = $email";

        $mysqli->query($sqlselect) or die ($mysqli->error);

        if ($mysqli>0 ) {
            echo '<script language="javascript">';
            echo 'alert(Email của bạn đã được đăng kí!)';
            echo '</script>';
        }
        else{
            $sqlinsert="INSERT INTO account(`fullname`, `password`, `birthday`, `sex`, `phone`, `email`, `address`) VALUES ('$name','$password','$bday',$sex,'$phone','$email','$address')";

            $mysqli->query($sqlinsert) or die ($mysqli->error);
        }
    }

?>