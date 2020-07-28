<?php
session_start();
require_once "./config/config.php";
require_once "./config/router.php";
if (isset($_POST["email"])&&isset($_POST["password"])&&isset($_POST["remember"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];    
    $remember = $_POST["remember"];   
    $sqlSelectUser = "SELECT * FROM usertbl where email='$email' and password='$password' and del_flag=0";
    $result = $connect->query($sqlSelectUser);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['email-login'] = $_POST['email'];
            $_SESSION['password-login'] = $_POST['password'];
            if ( $remember == 1) {
                setcookie('userCookie', $_POST['email'], time() + 180); // 86400 = 1day
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
