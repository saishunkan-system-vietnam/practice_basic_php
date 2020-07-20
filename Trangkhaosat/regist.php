<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đăng ký tài khoản</title>
    <link rel="stylesheet" href="./css/regist.css?<?time()?>">
    <!-- <script src="https://code.jquery.com/jquery-latest.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="./js/regist.js?<?time()?>"></script>
</head>

<body>

   <?

   ?>
    <?include("./menu.php")?>
    <div class="warpper fl">
        <div class="main">
            <h1>✍ Đăng ký tài khoản</h1>
            <form action="" method="post" id = "frm_Regist">
                <!-- input Họ -->
                <p>
                    <input type="text" name="fname" placeholder="☞ Họ*" class="intpt" id="fname">
                    <span class="error_form" id="fname_err"></span>
                </p>

                <!-- input tên -->
                <p>
                    <input type="text" name="lname" placeholder="☞ Tên*" class="intpt" id="lname">
                    <span class="error_form" id="lname_err"></span>
                </p>

                <!-- input Email -->
                <p>
                    <input type="email" name="uid" placeholder="✉ Email*" class="intpt" id="uid">
                    <span class="error_form" id="uid_err"></span>
                </p>

                <!-- input Xác nhận email -->
                <p>
                    <input type="email" name="ruid" placeholder="✉ Xác nhận Email*" class="intpt" id="ruid">
                    <span class="error_form" id="ruid_err"></span>
                </p>

                <!-- input Mật khẩu -->
                <p>
                    <input type="password" name="pass" placeholder="⌨ Mật khẩu*" class="intpt" id="pass">
                    <span class="error_form" id="pass_err"></span>
                </p>

                <!-- input Xác nhận mật khẩu -->
                <p>
                    <input type="password" name="rpass" placeholder="⌨ Xác nhận mật khẩu*" class="intpt" id="rpass">
                    <span class="error_form" id="rpass_err"></span>
                </p>

                <!-- input Số điện thoại -->
                <p>
                    <input type="tel" name="tel" placeholder="☎ Số điện thoại*" class="intpt" id="tel">
                    <span class="error_form" id="tel_err"></span>
                </p>
                <div class="bott">
                    <p><input type="button" id="btnregist"  value="Đăng ký" class="btn fl sub"></p>
                    <p><input type="button"  value="Hủy" class="btn fr res"></p>
                </div>
            </form>
        </div>
    </div>
    <br>

</body>

</html>