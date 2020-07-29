<?php
require_once "./config/config.php";
require_once "./config/router.php";

if (isset($_POST['password'])) {
    $password = $connect->real_escape_string($_POST['password']);
    $sql = "SELECT * FROM usertbl where email='$email'and token='$token'
    and token != '' and token_expire > NOW() and del_flag = 0";
    $result = $connect->query($sql);
}
?>