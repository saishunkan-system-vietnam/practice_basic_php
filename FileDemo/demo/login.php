<?session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <? $isLogin = false?>
    <?include('./menu.php');?>
    <?require('./query.php');?>
    <br>
    <div id="Main" style="margin-top: 150px;">
    <?
    //================================================================
            $cookie_name = 'lieu';
            $cookie_time = (3600 * 24 * 30);
            $username = '';
            $pass = '';
            $save = false;
         if(!empty($_POST))
         {
            $username = $_POST['row1'];
            $pass = $_POST['row2'];
            $query = "Select username, name from t_account where username = '{$username}' && pass = '{$pass}'";
            
            $ischeck = Quyery($query, 'select');
            if(!empty($ischeck))
            {
                $_SESSION['dataLogin'] = $ischeck['name'];
                //set session
                if( $_POST["saveinfo"] == 'on')
                {
                    setcookie($cookie_name,'usr='.$username."&pass=".$pass."&flg=login",time() + $cookie_time);                  
                }
                else
                {
                        setcookie( $cookie_name, "", time()- 60);
                }
                
                echo "<script type='text/javascript'>alert('Đăng nhập thành công');window.location.href = 'https://lieu.com';</script>";
                
            }
            else
            {
                echo "<script type='text/javascript'>alert('Tài khoản hoặc mật khẩu không chính xác');window.location.href = 'https://lieu.com/login.php';</script>";
            }
         }
         else
         {
            if(isset($_COOKIE[$cookie_name]))
            { 
                //======
                parse_str($_COOKIE[$cookie_name]);
                $username = $usr;                
                $pass = $pass;
                $save = true;
            }
         }
    //================================================================
    ?>
        <form action="" method="post"  name="formLogin" id="formLogin">
            <table border="0" cellpadding="5">
                <tr class="titleLogin">
                    <td colspan="2"><b>Đăng Nhập</b></td>
                </tr>
                <tr>
                    <td>Tên đăng nhập</td>
                    <td><input type="text" name="row1" id="txtUser" value="<?=$username?>"></td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td><input type="password" name="row2" id="txtPass" value="<?=$pass?>"></td>
                </tr>
                <tr class="titleLogin">
                    <td colspan="2" style="background-color: white;">
                    <button type="button" style="align-items: center;" onclick="Login()">Đăng Nhập</button>
                    <input type="checkbox" name="saveinfo" id="saveinfo" <?=$save?'checked':''?>>
                    <label for="saveinfo">Lưu mật khẩu</label>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <script src="./login.js?<?echo time()?>"></script>
</body>

</html>