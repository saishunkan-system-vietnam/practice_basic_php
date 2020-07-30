<?php
require('./config/router.php');
include(SITE_MENUTOP);

$email = isset($_GET['email']) ? $_GET['email'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if (empty($email)) {
    $_SESSION['error'] = "Không tồn tại email";
    header("location: index.php");
}

if (empty($token)) {
    $_SESSION['error'] = "Không tồn tại token";
    header("location: index.php");
}

if (empty($token) && empty($email)) {
    $_SESSION['error'] = "Không tồn tại email và token";
    header("location: index.php");
}

$sql_check = "SELECT * FROM t_account WHERE email = '$email' AND token = '$token' AND admin_flg = 0 AND del_flg = 0";
$result_check = mysqli_query($connect, $sql_check) or die("Lỗi truy vấn");

if (!mysqli_num_rows($result_check)) {
    $_SESSION['error'] = "Không tồn tại token hoặc email như trên";
    header("location: index.php");
}

$sql_check_time_token = "SELECT * FROM t_account WHERE email = '$email' AND token = '$token' AND admin_flg = 0 AND del_flg = 0 AND ADDTIME(update_datetime,'0:05:00') > CURRENT_TIMESTAMP()";
$result_time_token = mysqli_query($connect, $sql_check_time_token) or die("Lỗi truy vấn");

if (!mysqli_num_rows($result_time_token)) {
    $_SESSION['error'] = "Hết thời gian đổi mật khẩu";
    header("location: index.php");
} else {
    if (isset($_POST['changPass'])) {
        $pass = $_POST['inpPass'];
        $sqlUpdPass = "UPDATE t_account SET password = '$pass', update_datetime = CURRENT_TIMESTAMP() WHERE email = '$email' AND token = '$token' AND admin_flg = 0 AND del_flg = 0";
        $result_UpdPass = mysqli_query($connect, $sqlUpdPass) or die("Lỗi truy vấn");

        if (!$result_UpdPass) {
            $_SESSION['error'] = "Không tồn tại token hoặc email như trên";
            header("location: index.php");
        } else {
            $_SESSION['success'] = "Mật khẩu đã được đổi thành công !!!";
            header("location: index.php");
        }
    }
}

mysqli_close($connect);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" type="text/css" href=<?= FILE_CSS_CHANGEPASS ?>>
</head>

<body>
    <form id="myForm" action='' method='POST'>
        <div class="changebox">
            <img src=<?= IMG_LOGO ?> class="avatar">
            <h1>Change Password</h1>
            <form name="change">
                <div class="tt">
                    <p>Password New</p>
                    <input id="inpPass" type="password" name='inpPass' placeholder="Enter Password New">
                </div>
                <div class="tt">
                    <p>Confirm Password</p>
                    <input id="inpRePass" type="password" name='inpRePass' placeholder="Enter Confirm Password">
                </div>
                <div class="tt">
                    <input class="inpSub" id="inpSub" type="submit" name="changPass" value="Save Password">
                </div>
            </form>
        </div>
    </form>
    <script src=<?= FILE_JS_VALIDATE ?>></script>
</body>

</html>