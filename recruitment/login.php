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
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> -->
    <!-- <script src="jquery-3.5.1.min.js"></script> -->
    <?php require_once "./config/router.php"; ?>
</head>

<body>
    <?php include FILE_HEADER; ?>
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
                    <input type="checkbox" id="remember" name="remember" Value="1">
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
    <?php include FILE_FOOTER; ?>
</body>
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
            // },
            // unhighlight: function(element) {
            // $(element).css('background', '#ffffff');
        }
    });
</script>

<?php
// SESSION
if (isset($_SESSION['email-login']) && isset($_SESSION['password-login'])) {
    header("location: index.php");
}
if (isset($_COOKIE['userCookie']) && isset($_COOKIE['passCookie'])) {
    echo "User " . $_COOKIE['userCookie'] . " " . $_COOKIE['passCookie'];
} else {
    echo "chưa có cookie";
}

if (isset($_POST['btnlogin'])) {
    // if (empty($_POST['email'])) {
    //     echo "<script>document.getElementById('error').innerHTML = 'Please Enter User Name!'</script>";
    //     return false;
    // }

    // if (empty($_POST['password'])) {
    //     echo "<script>document.getElementById('error').innerHTML = 'Please Enter Password!'</script>";          
    //     return false;
    // }

    // $connect = mysqli_connect($hostName, $userName, $passWord, $databaseName);

    // if ($connect->connect_error) {
    //     die("Connect fail :" . $conn->connect_error);
    //     exit();
    // }
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
            echo "hello";
            // header("location: " + FILE_PHP_INDEX);
            header("location: index.php");
            // header("location:http://minhnn.com/index.php");
        }
    } else {
        echo $email_login;
        // echo "<script>$('#email').text('.$email_login.');</script>";
        // echo "<script>document.getElementById('email').innerHTML = '".$email_login."';</script>";
        echo "Email or password is incorrect. Please try again";
        return;
    }
    close_connect();
}
ob_end_flush();
?>

<!-- <script type="text/javascript">
 
//  $(document).ready(function() {

//      //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
//      $("#myform").validate({
//          rules: {
//             email: "required",
//             password: "required",
//          },
//          messages: {
//             email: "Vui lòng nhập họ",
//             password: "Vui lòng nhập tên"
//          }
//      });
//  });
 </script> -->
<!-- 
<script>
    $(document).ready(function() {
        $('#btnlogin').click(function() {
            var data = {
                email: $('input[name="email"]').val(),
                password: $('input[name="password"]').val(),
                remember: $('input[name="remember"]:checked').val()
            };

            var email = $('input[name="email"]').val();
            var password = $('input[name="email"]').val();
            var remember = $('input[name="remember"]:checked').val() == 1 ? 1 : 0;
            alert(remember);

            if (email == "") {
                $('#error_email').text("fsfdssa");
                return false;
            }
            document.getElementById("email").setCustomValidity('');
            // if ($('#email').val() == '') {
            //     document.getElementById("email").setCustomValidity('Required email address');
            //     return;
            // } //else if ($('#email').val().validity.typeMismatch) {
            // //     document.getElementById("email").setCustomValidity('please enter svalid email address');
            // //     return;
            // // } 
            // else if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($('#email').val())) {
            //     alert("ok");
            // } else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($('#email').val()))) {
            //     document.getElementById("email").setCustomValidity("Định dạng Email không hợp lệ!");
            //     return;
            // }


            // xóa thông báo lỗi của class=err
            // $('err').remove();
            // var result = true;
            // $.each(data, function(key, item) {
            //     if (key == 'email') {
            //         if (item == "") {
            //             var html = '<span style="color:red" class="error">Vui lòng nhập "' + item + '" </span>';
            //             $('input[name="' + key + '"]').after(html);
            //             result = false;
            //         };
            //     };

            //     if (key == 'remenber') {
            //         if (item == "" || typeof item == "undefined") {
            //             var html = '<span style="color:red" class="err">Vui lòng nhập "' + item + '" </span>';
            //             $('input[name="' + key + '"]').after(html);
            //             result = false;
            //         };
            //     }
            // });

            // if (result == false) {
            //     return false;
            // }

            // in dữ liệu,...
        });
    });
</script> -->

</html>