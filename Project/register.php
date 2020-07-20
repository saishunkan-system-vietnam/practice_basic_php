<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí tài khoản</title>
    <link rel="stylesheet" href="./CSS/style_register.css">
</head>

<body>
    <form method="post" action="" id="form_register">
        <table>
            <tr>
                <td id="title_register" colspan="2">Đăng kí tài khoản</td>
            </tr>
            <tr>
                <td>Họ và tên: </td>
                <td>
                    <input type="text" name="fullname" id="fullname" value="" />
                    <span id="username_error"></span>
                </td>
            </tr>
            <tr>
                <td>Mật khẩu:</td>
                <td>
                    <input type="password" name="password" id="password" value="" />
                    <span id="password_error"></span>
                </td>
            </tr>
            <tr>
                <td>Nhập lại mật khẩu:</td>
                <td>
                    <input type="password" name="re_password" id="re_password" value="" />
                    <span id="re_password_error"></span>
                </td>
            </tr>
            <tr>
                <td>Giới tính</td>
                <td>
                    <input type="radio" name="sex" value="1" checked />Nam
                    <input type="radio" name="sex" value="0" />Nữ
                    <span id="sex_error"></span>
                </td>
            </tr>
            <tr>
                <td>Nhập ngày sinh:</td>
                <td>
                    <input type="date" name="bday" id="bday" value="" />
                    <span id="bday_error"></span>
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>
                    <input type="text" name="email" id="email" value="" />
                    <span id="email_error"></span>
                </td>
            </tr>
            <tr>
                <td>Điện thoại:</td>
                <td>
                    <input type="text" name="phone" id="phone" value="" />
                    <span id="phone_error"></span>
                </td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td>
                    <input type="text" name="address" id="address" value="" />
                    <span id="address_error"></span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="register" id="register" value="Đăng ký" /></td>
            </tr>
        </table>
    </form>
</body>

</html>