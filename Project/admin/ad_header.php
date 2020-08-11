<?php 
    require_once '../config/router.php';
    require_once FILE_PHP_CONFIG;
     if (isset($_SESSION["role"])) {
         if ($_SESSION["role"] != 1) {
            header("location: ../index.php");
         }
     }else{
        header("location: ../index.php");
     }    
?>
<link rel="stylesheet" type="text/css" href="../css/style_admin.css" >

<div class="headingPanel">
    <div class="container">
        <div class="left-panel">
            Xin chào <span>Admin</span>
        </div>
        <div class="right-panel">
            <img height="24" src="../img/home.png" />
            <a href="../index.php">Trang chủ</a>
            <img height="24" src="../img/logout.png" />
            <a href="<?= SITE_LOGOUT ?>">Đăng xuất</a>
        </div>
    </div>
</div>
<div class="content-wrapper">
    <div class="container">
        <div class="left-menu">
            <div class="menu-heading">Admin Menu</div>
            <div class="menu-items">
                <ul>
                    <li><a href="./index.php">Cấu hình</a></li>

                    <li><a href="./ad_Product.php">Sản phẩm</a></li>

                    <li><a href="ad_order.php">Đơn hàng</a></li>

                    <li><a href="./account.php">Quản lý thành viên</a></li>
                </ul>
            </div>
        </div>