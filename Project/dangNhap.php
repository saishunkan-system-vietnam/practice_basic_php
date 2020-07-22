<?php
require('./config/router.php');
include(SITE_MENUTOP);
?>
<title>Login Form</title>
<link rel="stylesheet" type="text/css" href=<?= FILE_CSS_LOGIN?>>
<body>
    <form id="login" action='' method='POST'>
        <div class="loginbox">
            <img src=<?= IMG_AVATAR?> class="avatar">
            <h1>Login Here</h1>
            <form name="login">
                <p>Username</p>
                <input id="inpUser" type="text" name='txtUsername' placeholder="Enter Username" required oninvalid="this.setCustomValidity('Làm ơn nhập UserName')" oninput="this.setCustomValidity('')"/>                
                <p>Password</p>
                <input id="inpPass" type="password" name='txtPassword' placeholder="Enter Password" required oninvalid="this.setCustomValidity('Làm ơn nhập PassWord')" oninput="this.setCustomValidity('')">
                <input id="inpChk" type='checkbox' name="remember" value="1" /> Remember login
                <input id="inpSub" type="submit" name='submit' value="Login">
            </form>
        </div>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $username = $_POST['txtUsername'];
        $pass = $_POST['txtPassword'];
        $_check = ((isset($_POST['remember']) != 0) ? 1 : "");

        $sql_login = "SELECT * FROM taikhoan WHERE UserName='$username' AND Password='$pass'";
        $result_login = mysqli_query($connect, $sql_login);

        if (!mysqli_num_rows($result_login)) {
            echo "<script type='text/javascript'>alert('Đăng nhập không thành công!');</script>";
            die;
        } else {
            //var_dump($result_login ); 
            $_SESSION['txtUsername'] = $username;
            if ($_check == 1) {
                $dataCookie['usr'] = $username;
                $dataCookie['hash'] = $pass;
                setcookie(COOKIE_LOGIN, json_encode($dataCookie), time() + $cookie_time);
            }
            // Kiểm tra tài khoản
            header("location:./".SITE_INDEX."");
        }
    }
    ?>
</body>