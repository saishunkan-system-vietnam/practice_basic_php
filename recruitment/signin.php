<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <?php require_once "./config/router.php"; ?>
    <link href=<?= FILE_CSS_SIGNIN ?> rel="stylesheet" />
</head>

<body>
    <?php include FILE_PHP_HEADER ?>
    <div class="wrapper_signin">
        <div class="signin_page">
            <div class="title" style="margin-top : 30px;font-size:20px">
                Đăng ký
            </div>
            <form class="form" id="myform" name="myform" method="post">
                <div class="label">
                    Họ và tên:
                </div>
                <div>
                    <input type="text" name="username" onkeypress="ClearError(id)" onchange="ClearError(id)" id="username" placeholder="Nhập họ tên đầy đủ" />
                    <div class="error_message"><label style="color:red;" name="error_username" id="error_username"> </label></div>
                </div>
                <div class="label">
                    Email:
                </div>
                <div>
                    <input type="text" name="email" id="email" placeholder="Nhập Email" onkeypress="ClearError(id)" onchange="ClearError(id)" />
                    <div class="error_message"><label style="color:red" id="error_email"></label></div>
                </div>
                <div class="label">
                    Password:
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder=" Nhập Password" onkeypress="ClearError(id)" onchange="ClearError(id)" />
                    <div class="error_message"><label style="color:red" id="error_password"></label></div>
                </div>
                <div class="label">
                    Xác nhận Password:
                </div>
                <div>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder=" Nhập lại Password" onkeypress="ClearError(id)" onchange="ClearError(id)" />
                    <div class="error_message"><label style="color:red" id="error_confirm_password"></label></div>
                </div>
                <div class="label">
                    Ngày sinh:
                </div>
                <div>
                    <input type="date" id="dob" name="dob" style="text-align:left;width:172px;margin-bottom:5px" value="<?php echo date("Y-m-d"); ?>" onkeypress="ClearError(id)" onchange="ClearError(id)" />
                    <div class="error_message"><label style="color:red" id="error_dob"></label></div>
                </div>
                <div class="label">
                    Giới tính:
                </div>
                <div style="margin-top:5px;padding-bottom:10px;">
                    <div style="float:left; padding-left:0px;"><input type="radio" id="Male" name="gender" value="Male" checked />
                        <label for="Male">Male</label><br>
                    </div>

                    <div style="float:left;padding-left:20px;">
                        <div><input type="radio" id="female" name="gender" value="Female" />
                            <label for="Female">Female</label><br>
                        </div>
                    </div>

                    <div style="float:left;padding-left:20px;">
                        <div><input type="radio" id="other" name="gender" value="Other" />
                            <label for="Other">Other</label><br>
                        </div>
                    </div>

                </div>
                <div class="label" style="clear: both; padding-top: 12px;">
                    Địa chỉ:
                </div>
                <div style="margin-top:5px;">
                    <textarea id="address" name="address" style="width:100%; text-align: left;" rows="3" onkeypress="ClearError(id)" onchange="ClearError(id)">
                    </textarea>
                    <div class="error_message"><label style="color:red; margin-bottom:5px;" id="error_address"></label></div>
                </div>
                <div style="margin-top:25px;clear:both; display:block;">
                    <input type="checkbox" id="confirm" name="confirm" value="confirm">
                    <label for="confirm" style="font-size: 12px;">
                        Tôi <span style="color:blue;font-weight:bold">xác nhận</span> các
                        <span style="color:Red;font-weight:bold">thông tin</span> trên là sự thât
                    </label>
                    <div style="float:left" class="error_message"><label style="color:red" id="error_confirm"></label></div>
                </div>
                <div style="clear: both;">
                    <input type="button" class="btnsignin" id="btnsignin" name="btnsignin" value="Đăng ký"></input>
                </div>
            </form>
        </div>
    </div>
    <?php include FILE_PHP_FOOTER ?>
    <script src="<?= FILE_JS_SIGNIN ?>"></script>
</body>
</html>