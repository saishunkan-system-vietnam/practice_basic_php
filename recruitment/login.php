<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script type="text/javascript" src="./js/login.js"></script>
    <?php require_once "./config/router.php"; ?>
    <link href=<?php echo FILE_CSS ?> rel="stylesheet" />
</head>

<body>
    <?php include FILE_HEADER ?>
    <div class="wrapper_login">
        <div class="login_page">
            <div class="close">
                <a href="#">x</a>
                <!-- <img src="image/close4.png" /> -->
            </div>
            <div style="height:60px;width:60px; margin:auto;background:none;padding-top:20px;" class="banner">
                <img src="image/user.png" />
            </div>
            <!-- <span class="title">
          Đăng Nhập
        </span> -->
            <div class="title">
                Đăng Nhập
            </div>
            <form class="form" id="myform" name="myform" method="post">
                <div class="label">
                    Email:
                </div>
                <div>
                    <input type="text" name="email" id="email" placeholder="Nhập Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" />
                    <!-- required  
                oninvalid="this.setCustomValidity('Vui lòng nhập email')"
                oninput="this.setCustomValidity('')"  -->
                    <!-- <div class="error_message"><label id="error_email"></label></div> -->
                </div>
                <div class="label">
                    Password:
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder=" Nhập Password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" />
                    <!-- <div class="error_message"><label style="color:red" id="error_password"></label></div> -->
                </div>
                <div class="check">
                    <input type="checkbox" id="remember" name="remember" value="1">
                    <label for="remember">Nhớ mật khẩu</label><br>
                </div>
                <div class="forget">
                    <a href="#">
                        Quên mật khẩu?
                    </a>
                </div>
                <div style="float: right;">
                    <input type="submit" class="btnlogin" id="btnlogin" name="btnlogin" value="Đăng nhập"></input>
                </div>
            </form>
        </div>
    </div>
    </div>
    <?php include FILE_FOOTER ?>
    <?php
    // SESSION
    if (isset($_SESSION['email-login']) && isset($_SESSION['password-login'])) {
        header("location: " . FILE_PHP_INDEX);
    }
    if (isset($_COOKIE['userCookie']) && isset($_COOKIE['passCookie'])) {
        echo "User " . $_COOKIE['userCookie'] . " " . $_COOKIE['passCookie'];
        header("location: " . FILE_PHP_INDEX);
    } else {
        echo "chưa có cookie";
    }

    if (isset($_POST['btnlogin'])) {
        require_once "./config/config.php";
        $email_login = $_POST['email'];
        $password_login = $_POST['password'];
        echo $email_login . $password_login;
        $sqlSelectUser = "SELECT * FROM usertbl where email='$email_login' and password='$password_login' and del_flag=0";
        $result = $connect->query($sqlSelectUser);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "The email: " . $row["email"] . $row["password"] . " is exist" . ". Login successfully!" . "<br>";

                $_SESSION['email-login'] = $_POST['email'];
                $_SESSION['password-login'] = $_POST['password'];

                if (isset($_POST['remember'])) {
                    setcookie('userCookie', $_POST['userName'], time() + 180); // 86400 = 1day
                    setcookie('passCookie', $_POST['password'], time() + 180);
                }

                header("location: " . FILE_PHP_INDEX);
            }
        } else {
            //echo "<script>alert('Email or password is incorrect. Please try again')</script>";

            if (isset($_POST['remember'])) {
                echo "<script> document.getElementById('remember').checked = true;</script>";
            }
            echo "Email or password is incorrect. Please try again";
            return false;
        }
        close_connect();
    }
    ob_end_flush();
    ?>
    <script>
        $.validator.addMethod(
            "regex",
            function(value, element, regexp) {
                return this.optional(element) || regexp.test(value);
            },
            "Please check your input."
        );

        $("#myform").validate({
            rules: {
                email: {
                    required: true,
                    regex: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
                },
                password: "required",
                // remember: {
                //     required: true
                // }
            },
            messages: {
                email: {
                    required: "Vui lòng Nhập Email",
                    regex: "Định dạng email không hợp lệ",
                },
                password: "Vui lòng Nhập Password",
            },
            submitHandler: function(form) {
                form.submit();
            },
            //     // unhighlight: function(element) {
            //     // $(element).css('background', '#ffffff');
            // }
        });

        $('#btnlogin').click(function() {

        });
    </script>
</body>

</html>