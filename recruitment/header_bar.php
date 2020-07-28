<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>header</title> -->
    <?php require_once "./config/router.php";?>
    <link href=<?php echo FILE_CSS_INDEX ?> rel="stylesheet"/>
</head>

<body>
    <div class="header">
        <ul>
            <li class="item-home">
                <a style="padding-left:0px;padding-right:0px;" href="<?php echo SITE_URL?>" class="active">
                    <img src="image/logo10.png" style="width: 80px;Height:40px;"></a>
            </li>
            <li class="item-home">
                <a href="<?= FILE_PHP_INDEX ?>" class="active">Trang chủ</a>
            </li>
            <li class="item-jobs">
                <a href="<?= FILE_PHP_RECRUITMENT ?>">Tuyển dụng</a>
            </li>
            <li class="item-introduce">
                <a href="https://gioithieu">Giới thiệu</a>
            </li>
            <li class="item-contact">
                <a href="https://lienhe">Liên hệ</a>
            </li>
            <li style="float:right" class="logout">
                <a href="">Đăng xuất</a>
            </li>
            <li style="float:right" class="login">
                <a href="<?= FILE_PHP_LOGIN ?>">Đăng Nhập</a>
            </li>
            <li style="float:right" class="signin">
                <a href="<?= FILE_PHP_SIGNIN ?>">Đăng ký</a>
            </li>
        </ul>
    </div>
</body>
</html>