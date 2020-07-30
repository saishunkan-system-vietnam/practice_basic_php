<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <?php require_once "./config/router.php"; ?>    
    <link href=<?= FILE_CSS_LOGIN ?> rel="stylesheet" />
</head>

<body>
    <?php include FILE_PHP_HEADER ?>
    <div class="wrapper_login">
        <div class="login_page">
            <!-- <div class="close">
                <a href="#">x</a>
            </div> -->
            <div style="height:60px;width:60px; margin:auto;background:none;padding-top:20px;" class="banner">
                <img src="image/user.png" />
            </div>
            <div class="title">
                Đăng Nhập
            </div>
            <form class="form" id="myform" name="myform" method="post">
                <div class="label">
                    Email:
                </div>
                <div>
                    <input type="text" name="email" id="email" placeholder="Nhập Email" onkeypress="ClearError(id)" onchange="ClearError(id)" />
                </div>
                <div class="label">
                    Password:
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder=" Nhập Password" onkeypress="ClearError(id)" onchange="ClearError(id)" />
                </div>
                <div class="check">
                    <input type="checkbox" id="remember" name="remember" value="0">
                    <label for="remember">Nhớ mật khẩu</label><br>
                </div>
                <div class="forget">
                    <a href="reset_password.php">
                        Quên mật khẩu?
                    </a>
                </div>
                <div style="float: right;">
                    <input type="button" class="btnlogin" id="btnlogin" name="btnlogin" value="Đăng nhập"></input>
                </div>
                <div style="clear: both;padding-top:10px;font-size: 14px;">
                    <label style="color:red" id="error_message" name="error_message"></label>
                </div>
            </form>
        </div>
    </div>
    <?php include FILE_PHP_FOOTER ?>
    <script src="<?= FILE_JS_LOGIN ?>"></script>
</body>
</html>