<?php
include("./theme.php");
if(isset($_REQUEST['type']) && $_REQUEST['type'] == 'logout'){
    // xóa session
    unset($_SESSION['txtUsername']);
    // Xóa cookie
    setcookie(cookie_login, '', time() - $cookie_time);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="./style.css" />
</head>

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
                <td align="center">
                    <input class="btnfrmDN" type='submit' name='submit' value='Đăng nhập' />
                </td>
                <td align="center">
                    <input class="btnfrmDN" type="button" onClick="document.location.href='./Dangky.php'" title='Đăng ký'
                        value="Đăng ký" />
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
        $sql_login = "SELECT * FROM dangky WHERE UserName='$username' AND Password='$pass'";
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
            setcookie(cookie_login, json_encode($dataCookie), time() + $cookie_time);
        }
        header("location:./DanhSach.php");
        }
    }
}

?>

</html>