<?php 
    session_start();
    require FILE_PHP_CONNECT;
    require FILE_PHP_CONFIG;

    // Kiểm tra SESSION
    if(empty($_SESSION[SESSION_USERNAME])) {
        if(isset($_COOKIE[COOKIE_USERNAME])){
            $_SESSION[SESSION_USERNAME] = $_COOKIE[COOKIE_USERNAME];
        }    
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngô Tá Sinh</title>

    <link rel="stylesheet" href=<?= LINK_ICON ?>>
    <link rel="stylesheet" href=<?= FILE_CSS_STYLE_HEADER ?>>
    <link rel="stylesheet" href=<?= FILE_CSS_STYLE_LOGIN ?>>
    <link rel="stylesheet" href=<?= FILE_CSS_STYLE_FOOTER ?>>
</head>

<body>
    <nav>
        <ul>
            <li id="active"><a href=<?= SITE_URL ?>><i class="fa fa-home"></i>&nbsp;Trang chủ</a></li>
            <li><a href=""><i class="fa fa-th-large" aria-hidden="true"></i>&nbsp;Sản Phẩm</a></li>
            <li><a href=""><i class="fa fa-share-alt" aria-hidden="true"></i>&nbsp;Giới thiệu</a></li>
            <li><a href=""><i class="fa fa-fw fa-envelope"></i>&nbsp;Liên hệ</a></li>
            <li style="float: right;">
                <?php if (!isset($_SESSION[SESSION_USERNAME])): ?>
                <a class="login-window button" href="#login-box"><i class="fa fa-fw fa-user"></i>&nbsp;Đăng Nhập</a>
                <a class="registration button" href=<?= FILE_PHP_REGISTER ?>><i class="fa fa-address-card"
                        aria-hidden="true"></i></i>&nbsp;Đăng Kí</a>
                <?php else: ?>
                <a href="login.php?type=logout">Đăng xuất &emsp;</a>
                <a href=""><?= $_SESSION[SESSION_USERNAME]?> "</a>
                <?php endif ?>
            </li>
        </ul>
    </nav>

    <!-- Đăng nhập -->
    <div class="login" id="login-box">Đăng nhập

        <a class="close" href="#"><img class="img-close" title="Close Window" alt="Close" src="close.png" /></a>
        <form class="login-content" action="#" method="post"><label class="username">
                <span>Tên đăng nhập</span>
                <input id="username" type="text" autocomplete="on" name="username" placeholder="Username" value="" />
            </label>
            <label class="password">
                <span>Mật khẩu</span>
                <input id="password" type="password" name="password" placeholder="Password" value="" />
            </label>
            <button class="button submit-button" type="button">Đăng nhập</button>

            <a class="forgot" href="#">Quên mật khẩu?</a></form>
    </div>