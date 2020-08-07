<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once "./config/router.php"; ?>
    <link href=<?php echo FILE_CSS_SIGNUP ?> rel="stylesheet" />
</head>
<body>
<div class="wrapper_signup" style="height:auto">
    <div class="signup_page">
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
                <input type="date" id="birthdate" name="birthdate" style="text-align:left;width:172px;margin-bottom:5px" value="<?php echo date("Y-m-d"); ?>" onkeypress="ClearError(id)" onchange="ClearError(id)" />
                <div class="error_message"><label style="color:red" id="error_birthdate"></label></div>
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
            <div class="label">
                Số điện thoại:
            </div>
            <div>
                <input type="number" placeholder="Nhập số điện thoại" id="tel" name="tel" style="text-align:left;width:169px;" onkeypress="ClearError(id)" onchange="ClearError(id)">
                <div class="error_message"><label style="color:red" id="error_tel"></label></div>
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
                <input type="button" class="btnsignup" id="btnsignup" name="btnsignup" value="Đăng ký"></input>
            </div>
        </form>
    </div>
</div>
</body>
</html>