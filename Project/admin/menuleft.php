<?php
if (!isset($_COOKIE[COOKIE_LOGIN]) && !isset($_SESSION['admin_flg'])) {
    $_SESSION['error'] = 'Bạn không có quyền truy cập vào trang này';
    header("location:./" . SITE_INDEX_UADMIN . "");
} ?>
<link rel="stylesheet" href=<?= FILE_CSS_MENUADMIN ?>>

<div class="sidebar">
    <div>
        <img style="float: left;" width="60px" height="46px" src=<?= IMG_ADMINLOGO ?> alt="">
        <a class="home" href="<?= SITE_INDEX_UADMIN ?>">&emsp;Home</a>
    </div>
    <a class="active" href="<?= SITE_DASHBOARD?>"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
    <a href="<?= SITE_QLDEVICE?>"><i class="fa fa-laptop" aria-hidden="true"></i> Device</a>
    <a href="<?= SITE_QLACCOUNT?>"><i class="fa fa-user-o" aria-hidden="true"></i></i> Account</a>
    <a href="<?= SITE_LOAN?>"><i class="fa fa-handshake-o" aria-hidden="true"></i> Loan</a>
</div>