<?session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="https://www.w3schools.com/tags/demo_icon.gif" type="image/gif" sizes="16x16">
    <title>Demo</title>
    <link rel="stylesheet" href="./style.css?<?echo time()?>">
</head>

<body>
    <style>
    input {
        color: green;
    }
    </style>
    <? 
    require("./query.php");
    $cookie_name = 'lieu';
    if(empty($_SESSION))
    {
        
        if(isset($_COOKIE[$cookie_name]))
        { 
            //======
            parse_str($_COOKIE[$cookie_name]);
            $username = $usr;                
            $pass = $pass;

            $query = "Select username, name from t_account where username = '{$username}' && pass = '{$pass}'";
            
            $ischeck = Quyery($query, 'select');
            if($flg != "logout")
            {
                if(!empty($ischeck))
                {
                    $_SESSION['dataLogin'] = $ischeck['name'];
                        //set session
                    echo "<script type='text/javascript'>alert('Đăng nhập thành công');window.location.href = 'https://lieu.com';</script>";            
                }
                else
                {
                    echo "<script type='text/javascript'>alert('Tài khoản hoặc mật khẩu không chính xác');window.location.href = 'https://lieu.com/login.php';</script>";
                }
            }
        }
    }
//----
      $isLogin = false;
     if(!empty($_SESSION['dataLogin'])){
        $isLogin = true;
     }
     ?>
    <? include('./menu.php');?>
    <br>
    <h4>Đây là trang chủ</h4>
    <div>
        <script src="./javascript.js"></script>
    </div>
</body>

</html>