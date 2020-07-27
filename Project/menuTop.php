<?php
session_start();
require(SITE_CONFIG); ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="./js/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href=<?= FILE_CSS_MENUTOP ?>>
    <link rel="stylesheet" href=<?= FILE_CSS_QLTHIETBI ?>>
    <script src=<?= LINK_JQUERY ?>></script>
    <script src=<?= LINK_JQUERY_VALIDATE?>></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="navbar">
        <div style="float: left; margin-left: 3px;">
            <img width="60px" height="46px" src="./img/logo.png" alt="">
        </div>
        <div><a href=<?= SITE_INDEX ?>>Trang chủ</a></div>
        <div><a href=<?= SITE_DANHSACHTHIETBI ?>>Thiết bị</a></div>
        <div><a href="#">Giới thiệu</a></div>
        <div><a href="#">Liên hệ</a></div>

        <?php
        if (isset($_REQUEST['type']) && $_REQUEST['type'] == 'logout') {
            // xóa session
            unset($_SESSION['txtUsername']);
            unset($_SESSION['txtId']);
            // Xóa cookie
            setcookie(COOKIE_LOGIN, '', time() - $cookie_time);
            echo "<div style='float: right;'>";
            echo "<a href='" . SITE_DANGNHAP . "'>Đăng Nhập</a>";
            echo "</div>";
            echo "<div style='float: right;'>";
            echo "<a href='" . SITE_DANGKY . "'>Đăng Ký</a>";
            echo "</div>";
        } else if (!isset($_COOKIE[COOKIE_LOGIN]) && !isset($_SESSION['txtUsername'])) {
            echo "<div style='float: right;'>";
            echo "<a href='" . SITE_DANGNHAP . "'>Đăng Nhập</a>";
            echo "</div>";
            echo "<div style='float: right;'>";
            echo "<a href='" . SITE_DANGKY . "'>Đăng Ký</a>";
            echo "</div>";
        } else if (!isset($_SESSION['txtUsername'])) {
            $dataSaveUser = json_decode($_COOKIE[COOKIE_LOGIN], true);
            $_SESSION['txtUsername'] =  $dataSaveUser['usr'];
            echo "<div>";
            echo "<a href='./qlthietbimuon.php'>Thiết bị đang mượn</a>";
            echo "</div>";
            echo "<div style='float: right;'>";
            echo "<a href='./Index.php?type=logout'>Đăng Xuất</a>";
            echo "</div>";
            echo "<div style='float: right;'>";
            echo "<a href=''>$_SESSION[txtUsername]</a>";
            echo "</div>";
        } else {
            echo "<div>";
            echo "<a href='./qlthietbimuon.php'>Thiết bị đang mượn</a>";
            echo "</div>";
            echo "<div style='float: right;'>";
            echo "<a href='./Index.php?type=logout'>Đăng Xuất</a>";
            echo "</div>";
            echo "<div style='float: right;'>";
            echo "<a href=''>$_SESSION[txtUsername]</a>";
            echo "</div>";
        }
        ?>
    </div>
</head>