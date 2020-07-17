<?php
    session_start();
    include 'connect.php';

    $userName = $_POST["Username"];
    $passWord = $_POST["Password"];
    $result = $mysqli->query("SELECT * FROM user WHERE userName = '$userName' AND passWord = '$passWord'") or die ($mysqli->error);
    if ($result->num_rows) {
        $_SESSION["userName"] = $userName;
        if ($_POST["saveAccount"] == 1) {
            setcookie('username', $userName, time() + 14400);
            setcookie('password', $passWord, time() + 14400);
        }
        // Đóng kết nối
        $mysqli -> close();

        header("location: index.php");
    }   
    // Đóng kết nối
    $mysqli -> close();
?>