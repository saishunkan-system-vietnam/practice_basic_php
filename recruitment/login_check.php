<?php
session_start();
require_once "./config/config.php";
require_once "./config/router.php";

if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["remember"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];    
    $remember = $_POST["remember"];   
    $sqlSelectUser = "SELECT * FROM t_account where id='$email' and password='$password' and del_flg=0";
    $result = $connect->query($sqlSelectUser);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['email-login'] = $_POST['email'];
            $_SESSION['password-login'] = $_POST['password'];
            $_SESSION['flg_login'] = 1;     

            if ($row["admin_flg"] == 1)
            {
                $_SESSION['flg_admin'] = 1;
            }

            if ( $remember == 1) {
                setcookie('userCookie', $_POST['email'], time() + 180); 
                setcookie('passCookie', $_POST['password'], time() + 180);
            }       

             echo 1;
        }
    } else {
        echo "Email hoặc password không chính xác. Vui lòng kiểm tra lại!";
    }
    close_connect();
};
?>
