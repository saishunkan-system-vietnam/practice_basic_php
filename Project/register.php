
<?php 
    require './config/router.php';
    require FILE_PHP_HEADER;
?>

    <div class="tieude">
        <p>Đăng kí nhân viên</p>
    </div>

    <div class="myform">
        <form method="POST" action=<?=FILE_PHP_REGISTER_SUBMIT ?> id="form_register">
            <div class="row">
                <div class="span">
                    <span>Họ Tên:</span>
                </div>
                <div class="input">
                    <input class="input" type="text" placeholder="Nhập họ và tên" id="name" name="name"
                        onclick="resetError('name_error')">
                </div>
                <div class="error">
                    <label id="name_error"></label>
                </div>
            </div>
            <div class="row">
                <div class="span">
                    <span>Giới tính:</span>
                </div>
                <div>
                    <input name="sex" type="radio" value="1" checked />Nam
                    <input name="sex" type="radio" value="0" />Nữ
                </div>
            </div>
            <div class="row">
                <div class="span">
                    <span>Ngày Sinh:</span>
                </div>
                <div>
                    <input type="date" id="bday" name="bday" onclick="resetError('labelBDay')">
                </div>
                <div class="error">
                    <label id="bday_error"></label>
                </div>
            </div>
            <div class="row">
                <div class="span">
                    <span>Số điện thoại:</span>
                </div>
                <div class="input">
                    <input type="text" id="phone" name="phone" value="0" onclick="resetError('labelskill')">
                </div>
                <div class="error">
                    <label id="phone_error"></label>
                </div>
            </div>
            <div class="row">
                <div class="span">
                    <span>EMail:</span>
                </div>
                <div class="input">
                    <input type="text" placeholder="Nhập Mail" id="mail" name="mail" onclick="resetError('labelMail')">
                </div>
                <div class="error">
                    <label id="email_error"></label>
                </div>
            </div>
            <div class="row">
                <div class="span">
                    <span>Địa Chỉ:</span>
                </div>
                <div class="input">
                    <textarea id="address" name="address" rows="3" placeholder="Nhập địa chỉ"></textarea>
                </div>
                <div class="error">
                    <label id="address_error"></label>
                </div>
            </div>
            <div class="row">
                <div class="span">
                    <span>Mật khẩu:</span>
                </div>
                <div class="input">
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu">
                </div>
                <div class="error">
                    <label id="password_error"></label>
                </div>
            </div>
            <div class="row">
                <div class="span">
                    <span>Xác nhận mật khẩu:</span>
                </div>
                <div class="input">
                    <input type="password" id="re_password" name="re_password" placeholder="Nhập mật khẩu">
                </div>
                <div class="error">
                    <label id="re_password_error"></label>
                </div>
            </div>
            <button type="submit" name="register" id="register">Save</button>
        </form>
    </div>
</body>
<link rel="stylesheet" href=<?= FILE_CSS_STYLE_REGISTER?>>
<script src=<?= LINK_JQUERY ?>></script>
<script src=<?= FILE_JS_VALIDATE ?>></script>
<?php require FILE_PHP_FOOTER ?>