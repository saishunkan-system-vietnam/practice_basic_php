<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> -->
    <script src="./Login.js"></script>
</head>

<body>
    <form class="container" name="LogIn" method="post">
        <!-- onsubmit="return CheckLogin()"  -->
        <h2 style="padding: 110px; "></h2>
        <table style="margin: auto;width: 400px;" cellpadding='10'>
            <tr>
                <td colspan="2" align="center">
                    <h1>Đăng nhập ứng viên</h1>
                </td>
            </tr>
            <tr>
                <td>
                    Email ứng viên:
                </td>
                <td>
                    <input type='text' name='email' id='email' />
                </td>
            </tr>
            <tr>
                <td>
                    Mật khẩu:
                </td>
                <td>
                    <input type='password' name='password' id='password' />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" id="remember" name="remember" Value="remember">
                    <label for="remember">Ghi nhớ đăng nhập</label><br>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <input type='button' id="SignIn" onClick="document.location.href='./index.php'" value='Sign in' />
                </td>
                <td align="right" style=" padding-right:56px;">
                    <input type='button' id="Login" name="Login" value='Log in' />
                </td>
            </tr>
            <tr>
                <td class="error"><label id="error"></label></td>
            </tr>
        </table>
    </form>
</body>
</html>