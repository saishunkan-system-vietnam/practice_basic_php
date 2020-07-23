<?php
require('./config/router.php');
include(SITE_MENUTOP);
?>
<title>Create an account</title>
<link rel="stylesheet" type="text/css" href=<?= FILE_CSS_REGISTER ?>>

<body>
    <form id="myForm" action='' method='POST'>
        <div class="loginbox">
            <img src=<?= IMG_AVATAR ?> class="avatar">
            <h1>Create an account</h1>
            <form name="login">
                <div class="tt">
                    <p>Username</p>
                    <input id="inpUser" type="text" name="inpUser" placeholder="Enter Username" />
                    <span id="user-result"></span>
                </div>
                <div class="tt">
                    <p>Email</p>
                    <input id="inpEmail" type="text" name='inpEmail' placeholder="Enter Email">
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
                    <input class="inpSub" id="inpSub" type="submit" name="register" value="Đăng ký">
                </div>
            </form>
        </div>
    </form>
</body>
<script src="./js/validate.js"></script>
<?php
if (!$connect) {
    die('Kết nối không thành công!');
} else {
    if (isset($_POST['register'])) {
        $uName = $_POST['inpUser'];
        $email = $_POST['inpEmail'];
        $pass = $_POST['inpPass'];
        

        $sqlInsert = "INSERT INTO taikhoan (UserName, Password, Email) VALUES ('$uName', '$pass', '$email')";

        if (!mysqli_query($connect, $sqlInsert)) {
            echo "<script type='text/javascript'>alert('Đăng ký không thành công!');</script>";
            die;
        } else {
            echo "<script type='text/javascript'>alert('Chúc mừng bạn đã đăng ký thành công ');</script>";
        }
    }
}
mysqli_close($connect);
?>