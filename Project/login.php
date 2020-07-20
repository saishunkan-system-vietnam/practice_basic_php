<?php
    session_start(); 
    require 'config.php';

    if(isset($_REQUEST['type']) && $_REQUEST['type'] == 'logout'){
        // xoa session
        unset($_SESSION[SESSION_USERNAME]);

        // Xóa cookie
        setcookie(COOKIE_USERNAME, '', time() - 14400);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngô Tá Sinh</title>
    <link rel="stylesheet" type="text/css" href="./style_login.css">
    <script src="./valid.js"></script>
</head>

<body>
    <div class="loginbox">
        <img src="avatar.png" class="avatar">
        <h1>Đăng Nhập</h1>
        <form action="login_submit.php" method ="POST" onsubmit="return validateLogin()">
            <p>Tên đăng nhập</p>
            <input type="text" name="Username" id="username" placeholder="Nhập tên đăng nhập">
            <p>Mật khẩu</p>
            <input type="password" name="Password" id="password" placeholder="Nhập mật khẩu">
            <input id="wb" name ="saveAccount" type="checkbox" value="1" />
            <label for="wb" id="somelabel">Lưu tài khoảng.</label>
            <input type="submit" name="login" value="Login">
            <a href="#">Quên mật khẩu ?</a><br>
            <a href="#">Chưa có mật tài khoảng !!!!!</a>
        </form>

    </div>
</body>

</html>