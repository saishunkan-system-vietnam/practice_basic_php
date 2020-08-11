<?php
require_once "./config/config.php";
require_once "./config/router.php";

if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $connect->real_escape_string($_GET['email']);
    $token = $connect->real_escape_string($_GET['token']);

    $sql = "SELECT * FROM t_account where id='$email'and token='$token'
    and token != '' and token_expire > NOW() and del_flg = 0";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        require_once "reset_password.php";
        echo "<script> $('#email_page').hide();$('#password_page').show();</script>";
    } else {
        header('location: index.php');
    }
}
