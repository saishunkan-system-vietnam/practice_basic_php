<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đăng ký tài khoản</title>
    <link rel="stylesheet" href="./css/regist.css?<?time()?>">
    <!-- <script src="https://code.jquery.com/jquery-latest.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="./js/regist.js?<?time()?>"></script>
</head>

<body>

   <?

   ?>
    <?include("./menu.php")?>
    <div class="warpper fl">
        <div class="main">
            <h1>✍ Đăng ký tài khoản</h1>
            <form action="" method="post" id = "frm_Regist">
                <!-- input Họ -->
                <p>
                    <input type="text" name="fname" placeholder="☞ Họ*" class="intpt" id="fname">
                    <span class="error_form" id="fname_err"></span>
                </p>

                <!-- input tên -->
                <p>
                    <input type="text" name="lname" placeholder="☞ Tên*" class="intpt" id="lname">
                    <span class="error_form" id="lname_err"></span>
                </p>

                <!-- input Email -->
                <p>
                    <input type="email" name="uid" placeholder="✉ Email*" class="intpt" id="uid">
                    <span class="error_form" id="uid_err"></span>
                </p>

                <!-- input Xác nhận email -->
                <p>
                    <input type="email" name="ruid" placeholder="✉ Xác nhận Email*" class="intpt" id="ruid">
                    <span class="error_form" id="ruid_err"></span>
                </p>

                <!-- input Mật khẩu -->
                <p>
                    <input type="password" name="pass" placeholder="⌨ Mật khẩu*" class="intpt" id="pass">
                    <span class="error_form" id="pass_err"></span>
                </p>

                <!-- input Xác nhận mật khẩu -->
                <p>
                    <input type="password" name="rpass" placeholder="⌨ Xác nhận mật khẩu*" class="intpt" id="rpass">
                    <span class="error_form" id="rpass_err"></span>
                </p>

                <!-- input Số điện thoại -->
                <p>
                    <input type="tel" name="tel" placeholder="☎ Số điện thoại*" class="intpt" id="tel">
                    <span class="error_form" id="tel_err"></span>
                </p>
                <div class="bott">
                    <p><input type="button" id="btnregist"  value="Đăng ký" class="btn fl sub"></p>
                    <p><input type="button"  value="Hủy" class="btn fr res"></p>
                </div>
            </form>
        </div>
    </div>
    <br>

    <!-- <script type="text/javascript">
      $(function() {

         $("#fname_err").hide();
         $("#lname_err").hide();
         $("#uid_err").hide();
         $("#ruid_err").hide();
         $("#pass_err").hide();
         $("#rpass_err").hide();
         $("#tel_err").hide();

         var fname_err = false;
         var lname_err = false;
         var uid_err = false;
         var ruid_err = false;
         var pass_err = false;
         var rpass_err = false;
         var tel_err = false;

         $("#fname").focusout(function(){
            check_fname();
         });
         $("#form_sname").focusout(function() {
            check_sname();
         });
         $("#form_email").focusout(function() {
            check_email();
         });
         $("#form_password").focusout(function() {
            check_password();
         });
         $("#form_retype_password").focusout(function() {
            check_retype_password();
         });

         function check_fname() {
            var pattern = /^[a-zA-Z]*$/;
            var fname = $("#fnamme").val();
            if (pattern.test(fname) && fname !== '') {
               $("#fname_error_message").hide();
               $("#form_fname").css("border-bottom","2px solid #34F458");
            } else {
               $("#fname_error_message").html("Should contain only Characters");
               $("#fname_error_message").show();
               $("#form_fname").css("border-bottom","2px solid #F90A0A");
               error_fname = true;
            }
         }

         function check_sname() {
            var pattern = /^[a-zA-Z]*$/;
            var sname = $("#form_sname").val()
            if (pattern.test(sname) && sname !== '') {
               $("#sname_error_message").hide();
               $("#form_sname").css("border-bottom","2px solid #34F458");
            } else {
               $("#sname_error_message").html("Should contain only Characters");
               $("#sname_error_message").show();
               $("#form_sname").css("border-bottom","2px solid #F90A0A");
               error_fname = true;
            }
         }

         function check_password() {
            var password_length = $("#form_password").val().length;
            if (password_length < 8) {
               $("#password_error_message").html("Atleast 8 Characters");
               $("#password_error_message").show();
               $("#form_password").css("border-bottom","2px solid #F90A0A");
               error_password = true;
            } else {
               $("#password_error_message").hide();
               $("#form_password").css("border-bottom","2px solid #34F458");
            }
         }

         function check_retype_password() {
            var password = $("#form_password").val();
            var retype_password = $("#form_retype_password").val();
            if (password !== retype_password) {
               $("#retype_password_error_message").html("Passwords Did not Matched");
               $("#retype_password_error_message").show();
               $("#form_retype_password").css("border-bottom","2px solid #F90A0A");
               error_retype_password = true;
            } else {
               $("#retype_password_error_message").hide();
               $("#form_retype_password").css("border-bottom","2px solid #34F458");
            }
         }

         function check_email() {
            var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var email = $("#form_email").val();
            if (pattern.test(email) && email !== '') {
               $("#email_error_message").hide();
               $("#form_email").css("border-bottom","2px solid #34F458");
            } else {
               $("#email_error_message").html("Invalid Email");
               $("#email_error_message").show();
               $("#form_email").css("border-bottom","2px solid #F90A0A");
               error_email = true;
            }
         }

         $("#registration_form").submit(function() {
            error_fname = false;
            error_sname = false;
            error_email = false;
            error_password = false;
            error_retype_password = false;

            check_fname();
            check_sname();
            check_email();
            check_password();
            check_retype_password();

            if (error_fname === false && error_sname === false && error_email === false && error_password === false && error_retype_password === false) {
               alert("Registration Successfull");
               return true;
            } else {
               alert("Please Fill the form Correctly");
               return false;
            }


         });
      });
   </script> -->

</body>

</html>