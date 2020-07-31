    <?php require_once "./config/router.php"; ?>
    <link href=<?php echo FILE_CSS_INDEX ?> rel="stylesheet" />

    <div class="header">
        <ul>
            <li class="item-home">
                <a style="padding-left:0px;padding-right:0px;" href="<?php echo SITE_URL ?>" class="active">
                    <img src="img/logo10.png" style="width: 80px;Height:40px;"></a>
            </li>
            <li class="item-home">
                <a href="<?= FILE_PHP_INDEX ?>" class="active">Trang chủ</a>
            </li>
            <li class="item-jobs">
                <a href="<?= FILE_PHP_RECRUITMENT ?>">Tuyển dụng</a>
            </li>
            <li class="item-introduce" style="display:none">
                <a href="">Giới thiệu</a>
            </li>
            <li class="item-contact" style="display:none">
                <a href="">Liên hệ</a>
            </li>

            <?php if (isset($_SESSION['flg_login'])  == true) {
                $user_email = isset($_SESSION['email-login']) ? $_SESSION['email-login'] : "";
                echo ('
                        <li style="float:right;" class="logout" id="logout">
                        <a href=' . FILE_PHP_LOGOUT . '>Đăng xuất</a>
                        </li>
                        <li style="float:right;" id="user">
                        <a id=user_name>' . $user_email . '</a>
                        </li>
                    ');
            }
            ?>

            <?php
            if (isset($_SESSION['flg_login']) == false) {
                echo ('<li style="float:right;" class="login" id="login">
                       <a href=' . FILE_PHP_LOGIN . '>Đăng Nhập</a>
                       </li>
                       <li style="float:right" class="signin" id="signin">
                       <a href=' . FILE_PHP_SIGNUP . '>Đăng ký</a>
                       </li>');
            }
            ?>
        </ul>
    </div>