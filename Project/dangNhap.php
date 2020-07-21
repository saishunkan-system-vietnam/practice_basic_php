<?php
require('./config/router.php'); 
include(SITE_MENUTOP);
?>
<body>
    <form action='' method='POST'>
        <table style="margin: 0 auto; font-size: 20px;" cellpadding='10' cellspacing='0' border='0'>
            <tr>
                <td colspan="2" align="center">
                    <h2>LOGIN IN</h2>
                </td>

            </tr>
            <tr>
                <td>
                    Tên đăng nhập :
                </td>
                <td>
                    <input type='text' name='txtUsername' />
                </td>
            </tr>
            <tr>
                <td>
                    Mật khẩu :
                </td>
                <td>
                    <input type='password' name='txtPassword' />
                </td>
            </tr>
            <tr>

                <td colspan="2" align="center">
                    <input type='checkbox' name="remember" value="1" /> Remember login
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input class="btnfrmDN" type='submit' name='submit' value='Đăng nhập' />
                </td>
            </tr>
        </table>
    </form>
</body>
<?php

if (isset($_POST['submit'])) {
    $username= $_POST['txtUsername'];
    $pass= $_POST['txtPassword'];
    $_check=((isset($_POST['remember'])!=0)?1:"");

    if ($username=="" || $pass=="") {
        echo "vui long dien day du thong tin";
        exit;
    }
    else{
        $sql_login = "SELECT * FROM taikhoan WHERE UserName='$username' AND Password='$pass'";
        echo $sql_login;
        $result_login = mysqli_query($connect, $sql_login);
        
        if (!$result_login) {
            echo "<script type='text/javascript'>alert('Đăng nhập không thành công!');</script>";
            exit;
        }
        else{
        $_SESSION['txtUsername'] = $username;
        if ($_check == 1) {
            $dataCookie['usr'] = $username;
            $dataCookie['hash'] = $pass;
            setcookie(COOKIE_LOGIN, json_encode($dataCookie), time() + $cookie_time);
        }
        // Kiểm tra tài khoản
        header("location:./Index.php");
        }
    }
}

?>
