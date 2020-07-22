<?php
    session_start();
    require './config/router.php';
    require FILE_PHP_CONNECT;
    if (isset($_POST["registbtn"])) {
        $name=$_POST["fullname"];
        $sex = $_POST["sex"];
        $bday = $_POST['bday'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $password = md5($_POST['password']);

        $sqlselect = "SELECT COUNT(*) AS 'total' FROM `account` WHERE email = '$email'";
        $result = $mysqli->query($sqlselect) or die ($mysqli->error);

        if ($result->num_rows > 0) {
            echo '<script language="javascript">';
            echo 'alert("Email của bạn đã được đăng kí!")';
            echo '</script>';
        }
        else{
            $sqlinsert="INSERT INTO account(`fullname`, `password`, `birthday`, `sex`, `phone`, `email`, `address`) VALUES ('$name','$password','$bday',$sex,'$phone','$email','$address')";

            $mysqli->query($sqlinsert) or die ($mysqli->error);

            header("location: index.php");
        }
    }

?>