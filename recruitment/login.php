<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script type="text/javascript" src="./js/login.js"  ></script>
      <!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> -->
      <!-- <script src="jquery-3.5.1.min.js"></script> -->
    <?php require_once "./config/router.php"; ?>
</head>

<body>
    <?php include FILE_HEADER; ?>

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
                <input type="text" name="email" id="email" placeholder="Nhập Email" />
                                
                <!-- required  
                oninvalid="this.setCustomValidity('Vui lòng nhập email')"
                oninput="this.setCustomValidity('')"  -->
                <div class="error_message"><label id="error_email"></label></div>
            </div>
            <div class="label">
                Password:
            </div>
            <div>
                <input type="password" name="password" id="password" placeholder=" Nhập Password" />
                <div class="error_message"><label style="color:red" id="error_password"></label></div>
            </div>


            <div class="check">
                <input type="checkbox" id="remember" name="remember" Value="remember">
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

    <?php include FILE_FOOTER; ?>
</body>
<!-- <script>
    $("#myform").validate();
</script> -->


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

</html>