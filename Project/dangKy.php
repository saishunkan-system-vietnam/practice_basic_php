<?php
require('./config/router.php');
include(SITE_MENUTOP);

if (!$connect) {
    die('Kết nối không thành công!');
} else {
    if (isset($_POST['register'])) {
        $uName = $_POST['inpUser'];
        $email = $_POST['inpEmail'];
        $pass = $_POST['inpPass'];

        $sqlInsert = "INSERT INTO t_account (user_name, password, email, create_datetime) VALUES ('$uName', '$pass', '$email', CURRENT_TIMESTAMP())";

        if (!mysqli_query($connect, $sqlInsert)) {
            echo "<script type='text/javascript'>alert('Đăng ký không thành công!');</script>";
            die;
        } else {
            $_SESSION['success'] = "Đăng ký tài khoản thành công !!!";
            header('location: dangNhap.php');
        }
    }
}
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng ký</title>
    <link rel="stylesheet" type="text/css" href=<?= FILE_CSS_REGISTER ?>>
</head>

<body>
    <form id="myForm" action='' method='POST'>
        <div class="registerbox">
            <img src=<?= IMG_LOGO ?> class="avatar">
            <h1>Create an account</h1>
            <form name="register">
                <div class="tt">
                    <p>Username</p>
                    <input id="inpUser" type="text" name="inpUser" placeholder="Enter Username" />
                    <span id="user-result"></span>
                </div>
                <div class="tt">
                    <p>Email</p>
                    <input id="inpEmail" type="text" name='inpEmail' placeholder="Enter Email">
                    <span id="mail-result"></span>
                </div>
                <div class="tt">
                    <p>Password</p>
                    <input id="inpPass" type="password" name='inpPass' placeholder="Enter Password">
                </div>
                <div class="tt">
                    <p>Confirm Password</p>
                    <input id="inpRePass" type="password" name='inpRePass' placeholder="Enter Confirm Password">
                </div>
                <div class="checktt">
                    <input style="float: left;" type="checkbox" value="1" name="check" id="check" />Tôi chấp nhận điều
                    khoản.
                </div>
                <div class="tt">
                    <input class="inpSub" id="inpSub" type="submit" name="register" value="Regist">
                </div>
            </form>
        </div>
    </form>
    <script src=<?= FILE_JS_VALIDATE ?>></script>
</body>

</html>