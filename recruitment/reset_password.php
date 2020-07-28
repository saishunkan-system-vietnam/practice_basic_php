<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <?php require "./config/router.php"; ?>
    <link href=<?php echo FILE_CSS_CHANGE_PASSWORD ?> rel="stylesheet" />
</head>

<body>
    <?php include FILE_PHP_HEADER ?>
    <div class="wrapper_change_password">
        <div class="email_page"  >
            <!-- <div class="close">
                <a href="#">x</a>
            </div> -->
            <div class="title">
                Nhập tên email đăng nhập
            </div>
            <form class="form" id="myform" name="myform" method="post">
                <!-- <div class="label">
                    Email:
                </div> -->
                <div>
                    <input type="text" name="email_check" id="email_check" placeholder="Email" onkeypress="ClearError(id)" onchange="ClearError(id)" />
                </div>
                <div style="text-align:center;">
                    <input type="button" class="btnsend" id="btnsend" name="btnsend" value="Gửi"></input>
                </div>
                <div style="clear: both;padding-top:10px;font-size: 14px;">
                    <label style="color:red" id="error_email_check" name="error_email_check"></label>
                </div>
            </form>
        </div>

        <div class="password_page" style="display:none" >
            <!-- <div class="close">
                <a href="#">x</a>
            </div> -->
            <div class="title">
                Thay đổi mật khẩu
            </div>

            <form class="form" id="myform" name="myform" method="post">
                <!-- <div class="label">
                    Email:
                </div> -->
                <div class="label">
                    Nhập mật khẩu mới:
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder=" Nhập Password" onkeypress="ClearError(id)" onchange="ClearError(id)" />
                    <div class="error_message"><label style="color:red" id="error_password"></label></div>
                </div>
                <div class="label">
                    Xác nhận mật khẩu mới:
                </div>
                <div>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder=" Nhập lại Password" onkeypress="ClearError(id)" onchange="ClearError(id)" />
                    <div class="error_message"><label style="color:red" id="error_confirm_password"></label></div>
                </div>
                <div style="text-align:center;">
                    <input type="button" class="btnchange" id="btnchange" name="btnchange" value="Đổi mật khẩu"></input>
                </div>
                <div style="clear: both;padding-top:10px;font-size: 14px;">
                    <label style="color:red" id="error_message" name="error_message"></label>
                </div>
            </form>
        </div>
    </div>
    <?php include FILE_PHP_FOOTER ?>
</body>
<script src="<?= FILE_JS_CHECK_EMAIL ?>"></script>
</html>