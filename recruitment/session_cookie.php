<?php
// session_start();
require_once "./config/router.php"; 
// SESSION
if (isset($_SESSION['email-login']) && isset($_SESSION['password-login']) && !isset($_SESSION['flg_login'])) {   
    header("location: " . FILE_PHP_INDEX);
}

if (isset($_COOKIE['userCookie']) && isset($_COOKIE['passCookie']) && !isset($_SESSION['flg_login'])) {
    header("location: " . FILE_PHP_INDEX);
} 
// ob_end_flush();
?>