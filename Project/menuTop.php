<?php
session_start();

require FILE_PHP_CONFIG;

//Kiểm tra SESSION
if (empty($_SESSION[SESSION_USERNAME])) {
    if (isset($_COOKIE[COOKIE_USERNAME])) {
        $_SESSION[SESSION_USERNAME] = $_COOKIE[COOKIE_USERNAME];
    }
}
?>

<link rel="stylesheet" href=<?= LINK_ICON ?>>
<link rel="stylesheet" href=<?= FILE_CSS_STYLE_HEADER ?>>
<script src=<?= LINK_JQUERY ?>></script>

<nav class="nav menu">
    <ul>
        <li id="active"><a href=<?= SITE_URL ?>><i class="fa fa-home"></i>&nbsp;Trang chủ</a></li>
        <li><a href=<?= SITE_PRODUCT ?>><i class="fa fa-th-large" aria-hidden="true"></i>&nbsp;Sản Phẩm</a></li>
        <li><a href=""><i class="fa fa-share-alt" aria-hidden="true"></i>&nbsp;Giới thiệu</a></li>
        <li><a href="./admin/index.php"><i class="fa fa-fw fa-envelope"></i>&nbsp;Liên hệ</a></li>
        <li style="float: right;">
            <?php
            // count items in the cart
            $cookie = isset($_COOKIE['shopping_cart']) ? $_COOKIE['shopping_cart'] : "";
            $cookie = stripslashes($cookie);
            $saved_cart_items = json_decode($cookie, true);
            if ($saved_cart_items == null) {
                $cart_count = 0;
            } else {
                $cart_count = count($saved_cart_items);
            }

            ?>

            <?php if (!isset($_SESSION['username'])) : ?>
                <a class="login-window button" onclick="openForm('login')"><i class="fa fa-fw fa-user"></i>&nbsp;Đăng Nhập</a>
                <a class="registration button" onclick="openForm('regist')"><i class="fa fa-address-card" aria-hidden="true"></i></i>&nbsp;Đăng Kí</a>
            <?php else : ?>
                <a href=<?= FILE_PHP_CART ?>><i class="fa fa-shopping-cart"> <?= $cart_count; ?></i></a>
                <a href=<?= SITE_LOGOUT ?>>Đăng xuất &emsp;</a>
                <a href=""><?= $_SESSION['username'] ?></a>
            <?php endif ?>
        </li>
    </ul>

</nav>

<!-- Đăng ký tài khoản -->
<div id="regist" class="popup popupRegist">
    <form class="form_regist formPopup" id="form_register" action="" method="POST">
        <div class="containerPopup containerRegist">
            <span onclick="closeForm('regist')" class="Close CloseRegist" title="Close">&times;</span>
            <h1>Đăng ký tài khoản</h1>
            <p>Xin vui lòng điện đầy đủ thông tin bên dưới.</p>
            <hr>
            <label for="fullname"><b>Họ và Tên</b></label>
            <input type="text" placeholder="Nhập Họ và Tên" name="fullname" id="fullname" required>

            <label for="sex"><b>Giới tính</b></label>
            <input type="radio" name="sex" value="1" checked />Nam
            <input type="radio" name="sex" value="0" />Nữ <br>

            <label for="bday"><b>Ngày sinh</b></label>
            <input type="date" name="bday" id="bday" required>

            <label for="phone"><b>Số điện thoại</b></label>
            <input type="text" name="phone" placeholder="Nhập số đện thoại" id="phone" pattern=<?= PATTERN_PHONE ?>required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Nhập Email" name="email" id="email" pattern=<?= PATTERN_EMAIL ?> required>

            <label for="address"><b>Địa chỉ</b></label>
            <input type="text" placeholder="Nhập địa chỉ" name="address" id="address" required>

            <label for="psw"><b>Mật khẩu</b></label>
            <input type="password" placeholder="Nhập mật khẩu" name="password" id="password" pattern=<?= PATTERN_PASSWORD ?> title="Phải chứa ít nhất một số và một chữ hoa và chữ thường và ít nhất 8 ký tự trở lên" required>

            <label for="re_password"><b>Mật khẩu xác nhận</b></label>
            <input type="password" placeholder="Xác nhận mật khẩu" name="re_password" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required>

            <button type="submit" class="registbtn btn" id="registbtn" name="registbtn">Đăng Ký</button>
        </div>
    </form>
</div>

<!-- Đăng nhập -->
<div id="login" class="popup popupLogin">
    <form class="form_login formPopup" id="form_login" action="" method="post">
        <div class="containerPopup containerLogin">
            <span onclick="closeForm('login')" class="Close CloseLogin" title="Close">&times;</span>
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
<br>

<script src=<?= FILE_JS_COMMON ?>></script>
<script src=<?= FILE_JS_LOGIN ?>></script>
<script src=<?= FILE_JS_REGISTER ?>></script>
<script>
    var isLogin = <?= (empty($_SESSION[SESSION_USERNAME]) == true) ? 0 : 1 ?>
</script>