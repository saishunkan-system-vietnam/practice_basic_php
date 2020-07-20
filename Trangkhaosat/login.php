<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
</head>

<body>
    <?include("./menu.php")?>
    <div class="main">
        <h1>Đăng nhập</h1>
        <form action="index.php" method="post" id="frm_login">
            <!-- input Email -->
            <p>
                <input type="email" name="uid" placeholder="✉ Email*" class="intpt" id="uid">
            </p>
            <!-- input Mật khẩu -->
            <p>
                <input type="password" name="pass" placeholder="⌨ Mật khẩu*" class="intpt" id="pass">
            </p>
            <div class="bott">
                <p><input type="button" id="btnlogin" value="Đăng nhập" class="btn fl sub"></p>
            </div>
        </form>

    </div>
</body>

</html>