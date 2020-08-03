<?php 
    session_start();
    
    require FILE_PHP_CONFIG;

    //Kiểm tra SESSION
    if(empty($_SESSION[SESSION_USERNAME])) {
        if(isset($_COOKIE[COOKIE_USERNAME])){
            $_SESSION[SESSION_USERNAME] = $_COOKIE[COOKIE_USERNAME];
        }    
    }
?>

<link rel="stylesheet" href=<?= LINK_ICON ?>>
<link rel="stylesheet" href=<?= FILE_CSS_STYLE_HEADER ?>>
<link rel="stylesheet" href=<?= FILE_CSS_STYLE_REGISTER?>>
<link rel="stylesheet" href=<?= FILE_CSS_STYLE_LOGIN?>>
<script src=<?= LINK_JQUERY ?>></script>

<nav>
    <ul>
        <li id="active"><a href=<?= SITE_URL ?>><i class="fa fa-home"></i>&nbsp;Trang chủ</a></li>
        <li><a href=<?= SITE_PRODUCT?>><i class="fa fa-th-large" aria-hidden="true"></i>&nbsp;Sản Phẩm</a></li>
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
            }else{
                $cart_count=count($saved_cart_items);
            }
            
            ?>
            
            <?php if (!isset($_SESSION['username'])): ?>
            <a class="login-window button" onclick="document.getElementById('login').style.display='block'"><i
                    class="fa fa-fw fa-user"></i>&nbsp;Đăng Nhập</a>
            <a class="registration button" onclick="document.getElementById('regist').style.display='block'"><i
                    class="fa fa-address-card" aria-hidden="true"></i></i>&nbsp;Đăng Kí</a>
            <?php else: ?>
            <a href=<?= FILE_PHP_CART?>><i class="fa fa-shopping-cart"> <?= $cart_count; ?></i></a>
            <a href=<?= SITE_LOGOUT?>>Đăng xuất &emsp;</a>
            <a href=""><?= $_SESSION['username']?></a>
            <?php endif ?>
        </li>
    </ul>

</nav>

<!-- Đăng ký tài khoản -->
<div id="regist" class="popup_regist">
    <form class="form_regist animate" id="form_register" action="" method="POST" style="border:1px solid #ccc">
        <div class="regist_container">
            <span onclick="document.getElementById('regist').style.display='none'" class="regist_close"
                title="Close">&times;</span>
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
            <input type="text" name="phone" placeholder="Nhập số đện thoại" id="phone"
                pattern=<?= PATTERN_PHONE ?>required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Nhập Email" name="email" id="email" pattern=<?= PATTERN_EMAIL ?> required>

            <label for="address"><b>Địa chỉ</b></label>
            <input type="text" placeholder="Nhập địa chỉ" name="address" id="address" required>

            <label for="psw"><b>Mật khẩu</b></label>
            <input type="password" placeholder="Nhập mật khẩu" name="password" id="password"
                pattern=<?= PATTERN_PASSWORD ?>
                title="Phải chứa ít nhất một số và một chữ hoa và chữ thường và ít nhất 8 ký tự trở lên" required>

            <label for="re_password"><b>Mật khẩu xác nhận</b></label>
            <input type="password" placeholder="Xác nhận mật khẩu" name="re_password" oninvalid="InvalidMsg(this);"
                oninput="InvalidMsg(this);" required>

            <div class="regist_clearfix">
                <button type="button" onclick="document.getElementById('regist').style.display='none'"
                    class="cancel">Cancel</button>
                <button type="submit" class="registbtn" id="registbtn" name="registbtn">Đăng Ký</button>
            </div>
        </div>
    </form>
</div>

<!-- Đăng nhập -->
<div id="login" class="modal">

    <form class="modal-content animate" id="form_login" action="" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('login').style.display='none'" class="close"
                title="Close Modal">&times;</span>
            <img src=<?= FILE_IMG_AVARTA ?> alt="Avatar" class="avatar">
            <br>
            <label for="email"><b>Đăng nhập</b></label>
        </div>

        <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Nhập Email" id="uid" name="email" required>

            <label for="psw"><b>Mật khẩu</b></label>
            <input type="password" placeholder="Nhập mật khẩu" id="pass" name="password" required>

            <label>
                <input type="checkbox" checked="checked" id="save" name="remember" value="1"> Lưu tài khoản
            </label>
            <button type="submit" id="loginbtn" name="login_name">Đăng nhập</button>

            <span class="psw"><a href=<?= SITE_FORGOTPASS?>>Quên mật khẩu?</a></span>
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