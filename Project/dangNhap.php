<?php
require('./config/router.php');
include(SITE_MENUTOP);

if (isset($_SESSION['success'])) {
    echo "<script type='text/javascript'>alert('$_SESSION[success]');</script>";
    unset($_SESSION['success']);
}

if (isset($_POST['submit'])) {
    $username = $_POST['txtUsername'];
    $pass = $_POST['txtPassword'];
    $_check = ((isset($_POST['remember']) != 0) ? 1 : "");

    $sql_login = "SELECT * FROM t_account WHERE user_name='$username' AND password='$pass' AND del_flg = 0 AND admin_flg=0";
    $result_login = mysqli_query($connect, $sql_login);

    $sql_login_admin = "SELECT * FROM t_account WHERE user_name='$username' AND password='$pass' AND del_flg = 0 AND admin_flg=1";
    $result_login_admin = mysqli_query($connect, $sql_login_admin);

    if (!mysqli_num_rows($result_login)) {
        echo "<script type='text/javascript'>alert('Đăng nhập không thành công!');</script>";
    } else {
        $row = mysqli_fetch_assoc($result_login);
        $_SESSION['txtUsername'] = $username;
        $_SESSION['txtId'] = $row['id'];

        if ($_check == 1) {
            $dataCookie['usr'] = $username;
            $dataCookie['hash'] = $pass;
            $dataCookie['id'] = $row['id'];
            setcookie(COOKIE_LOGIN, json_encode($dataCookie), time() + $cookie_time);
        }
        
        $_SESSION['success'] = "Đăng nhập thành công";
        header("location:./" . SITE_INDEX . "");
    }

    if (!mysqli_num_rows($result_login_admin)) {
        echo "<script type='text/javascript'>alert('Đăng nhập tài khoản admin không thành công!');</script>";
    } else {
        $row = mysqli_fetch_assoc($result_login);
        $_SESSION['txtUsername'] = $username;
        $_SESSION['txtId'] = $row['id'];

        if ($_check == 1) {
            $dataCookie['usr'] = $username;
            $dataCookie['hash'] = $pass;
            $dataCookie['id'] = $row['id'];
            setcookie(COOKIE_LOGIN, json_encode($dataCookie), time() + $cookie_time);
        }
        
        $_SESSION['success'] = "Đăng nhập thành công";
        header("location:./" . SITE_INDEX . "");
    }
    mysqli_close($connect);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng nhập</title>
    <link rel="stylesheet" type="text/css" href=<?= FILE_CSS_LOGIN ?>>
</head>

<body>
    <form id="login" action='' method='POST'>
        <div class="loginbox">
            <img src=<?= IMG_LOGO ?> class="avatar">
            <h1>Login Here</h1>
            <form name="login">
                <p>Username</p>
                <input id="inpUser" type="text" name='txtUsername' placeholder="Enter Username" required oninvalid="this.setCustomValidity('Vui lòng nhập UserName')" oninput="this.setCustomValidity('')" />
                <p>Password</p>
                <input id="inpPass" type="password" name='txtPassword' placeholder="Enter Password" required oninvalid="this.setCustomValidity('Vui lòng nhập PassWord')" oninput="this.setCustomValidity('')">
                <input id="inpChk" type='checkbox' name="remember" value="1" /> Remember login
                <input id="inpSub" type="submit" name='submit' value="Login">
                <a href=<?= SITE_SENDMAIL ?>>Quên mật khẩu?</a><br>
            </form>
        </div>
    </form>
</body>

</html>