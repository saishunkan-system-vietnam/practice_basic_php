<?php
session_start();
require(SITE_CONFIG);
?>

<script src=<?= FILE_JS_CKEDITOR ?>></script>
<link rel="stylesheet" href=<?= FILE_CSS_MENUTOP ?>>
<link rel="stylesheet" href=<?= FILE_CSS_QLTHIETBIMUON ?>>
<script src=<?= LINK_JQUERY ?>></script>
<script src=<?= LINK_JQUERY_VALIDATE ?>></script>
<link rel="stylesheet" href=<?= LINK_JQUERY_AWESOM ?>>

<div class="navbar">
    <div style="float: left; margin-left: 3px;">
        <img width="60px" height="46px" src=<?= IMG_LOGO ?> alt="">
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
        unset($_SESSION['avatar']);
        unset($_SESSION['admin_flg']);
        // Xóa cookie
        setcookie(COOKIE_LOGIN, '', time() - $cookie_time);
        header("location:" . SITE_INDEX . "");
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
        $_SESSION['admin_flg'] = $dataSaveUser['admin_flg'];
        echo "<div>";
        echo "<a href='./" . SITE_QLTHIETBIMUON . "'>Thiết bị đang mượn</a>";
        echo "</div>";
        if (isset($_SESSION['admin_flg'])) {
            echo "<div class='admin_flg'>";
            echo "<button id='admin_flg' onclick=" . "location.href='./" . SITE_DANHSACHQANLYTHIETBI . "' value='ADMIN'>ADMIN</button>";
            echo "</div>";
        }
        echo "<div style='float: right;'>";
        echo "<a href='./" . SITE_INDEX . "?type=logout'>Đăng Xuất</a>";
        echo "</div>";
        echo "<div style='float: right;'>";
        echo "<a href=''>$_SESSION[txtUsername]</a>";
        echo "</div>";
    } else {
        echo "<div>";
        echo "<a href='./" . SITE_QLTHIETBIMUON . "'>Thiết bị đang mượn</a>";
        echo "</div>";
        if (isset($_SESSION['admin_flg'])) {
            echo "<div class='admin_flg'>";
            echo "<button id='admin_flg' onclick=" . "location.href='./" . SITE_DANHSACHQANLYTHIETBI . "' value='ADMIN'>ADMIN</button>";
            echo "</div>";
        }
        echo "<div style='float: right;'>";
        echo "<a href='./" . SITE_INDEX . "?type=logout'>Đăng Xuất</a>";
        echo "</div>";
        echo "<div style='float: right;'>";
        echo "<a href=''>$_SESSION[txtUsername]</a>";
        echo "</div>";
    }
    ?>
</div>