<?php 
    require '../config/router.php';
    require FILE_PHP_HEADERAD; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href=<?= LINK_ICON?>>
    <link rel="stylesheet" href=<?= FILE_CSS_STYLE_HEADER?>>
    <script src=<?= LINK_JQUERY?>></script>
</head>

<body>
    
   <!-- Đăng nhập -->
<div id="login" class="popup popupLogin">
    <form class="form_login formPopup" id="form_login" action="" method="post">
        <div class="containerPopup containerLogin">
            <span onclick="closeForm('login')" class="close CloseLogin" title="Close">&times;</span>
            <img src=<?= FILE_IMG_AVARTA ?> alt="Avatar" class="avatar">
            <h1>Đăng nhập Email</h1>
            <hr>
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Nhập Email" id="uid" name="email" required>

            <label for="psw"><b>Mật khẩu</b></label>
            <input type="password" placeholder="Nhập mật khẩu" id="pass" name="password" required>
            <div class="loginforgot">
                <label>
                    <input type="checkbox" checked="checked" id="save" name="remember" value="1"> Lưu tài khoản
                </label>
                <span class="psw forgotpass"><a href=<?= SITE_FORGOTPASS ?>>Quên mật khẩu?</a></span>
            </div>
            <button type="submit" class="btnLogin btn" id="loginbtn" name="login_name">Đăng nhập</button>
        </div>
    </form>
</div>


    <script src=<?= FILE_JS_COMMON ?>></script>
    <script src=<?= FILE_JS_LOGIN ?>></script>
</body>

</html>