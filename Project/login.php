<?php
    session_start();
    require './config/router.php';
    require FILE_PHP_CONFIG;
    $resultlogin = false;

    if (isset($_POST["uid"]) && isset($_POST["pass"]) && isset($_POST["save"]) ) {
        $email = $_POST["uid"];
        $password = md5($_POST["pass"]);

        $result = $mysqli->query("SELECT * FROM account WHERE id = '$email' AND password = '$password'");
        if ($result->num_rows) {
            $_SESSION[SESSION_USERNAME] = $email;

            if ($_POST["save"] == "1") {
                setcookie(COOKIE_USERNAME, $email, time() + 14400);
                setcookie(COOKIE_PASSWORD, $password, time() + 14400);
            }
            $resultlogin = true;       
        }   

        echo $resultlogin;
    }

    // Đóng kết nối
    $mysqli -> close();
?>