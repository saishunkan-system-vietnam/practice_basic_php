<?php
session_start();
require_once "./config/router.php";

unset($_SESSION["email-login"]);
unset($_SESSION["password-login"]);
unset($_SESSION["flg_login"]);
session_destroy();
header("Location:".FILE_PHP_INDEX);
?>