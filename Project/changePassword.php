<?php
    require './config/router.php';
    require FILE_PHP_MENUTOP;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" href=<?= FILE_CSS_STYLE_CHANGEPASS?>>
</head>

<body>
    <div class="changePass">
        <form action="" id="form_changePass">
            <h2>Đổi mật khẩu</h2>
            <div class="input-container">
                <input class="input-field" type="hidden" placeholder="Email" name="email" id="email_changePass"
                    value="<?= $_REQUEST['email']?>">
            </div>
            <div class="input-container">
                <input class="input-field" type="hidden" placeholder="token" name="token" id="token_changePass"
                    value="<?= $_REQUEST['token']?>">
            </div>
            <div class="input-container">
                <i class="fa fa-key icon"></i>
                <input class="input-field" type="password" placeholder="Mật khẩu mới" name="new_password"
                    id="new_password" pattern=<?= PATTERN_PASSWORD ?>
                    title="Phải chứa ít nhất một số và một chữ hoa và chữ thường và ít nhất 8 ký tự trở lên" required>
            </div>

            <div class="input-container">
                <i class="fa fa-key icon"></i>
                <input class="input-field" type="password" placeholder="Xác nhận mật khẩu mới" name="re_new_password"
                    id="re_new_password" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required>
            </div>

            <button type="submit" name="submit" class="btn">Lưu</button>
        </form>
    </div>

    <script src=<?= FILE_JS_CHANGEPASS ?>></script>

    <!-- include footer -->
    <?php include FILE_PHP_FOOTER ?>
</body>

</html>