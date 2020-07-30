<?php
require_once "./config/config.php";
require_once "./config/router.php";
require_once "./func_change_password.php";

if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $connect->real_escape_string($_GET['email']);
    $token = $connect->real_escape_string($_GET['token']);

    $sql = "SELECT * FROM usertbl where email='$email'and token='$token'
    and token != '' and token_expire > NOW() and del_flag = 0";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        //    $token = GenerateToken();
        //    $sqlUpdateToken = "UPDATE usertbl set token = '' where email='$email'";
        //    $connect->query($sqlUpdateToken);
        //    header('location: reset_password.php');
        //     exit();
        // echo "ok rồi đó";
        // header('location: reset_password.php');
        require_once "reset_password.php";
        echo "<script> $('#email_page').hide();$('#password_page').show();</script>";
        // echo "<script>$('#email_check').val('$email')</script>";
        // echo "<script>alert($('#email_check').val())</script>";
    } else {
        header('location: index.php');
    }
}
