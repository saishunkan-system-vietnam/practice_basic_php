<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <?php require_once "./config/router.php"; ?>
    <style>
        .wrapper_signin {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
        }

        .signin_page {
            /* z-index: 1; */
            background-color: lemonchiffon;
            margin: auto;
            box-sizing: border-box;
            /* opacity      : 0.8; */
            /* z-index      : 999; */
            /* text-align   : center; */
            border: 1px solid #ccc;
            max-width: 400px;
            margin-top: 25px;
            margin-bottom: 25px;
            height: 780px;
            padding: 14px;
            border-radius: 12px;
            box-shadow: 0 6px 9px 0 #ccc;
            width: 40%;
        }

        .signin_page div {
            display: block;
        }

        .signin_page .title {
            /* margin-top     : 10px; */
            /* padding     : 50px; */
            width: 100%;
            color: green;
            /* rgb(40, 40, 179); */
            font-weight: bold;
            font-family: sans-serif;
            padding-bottom: 10px;
            text-align: center;
            /* padding-left: 0px; */
            clear: both;
            font-weight: bold;
        }

        .signin_page .close {
            float: right;
            margin-right: 2px;
        }

        .signin_page .label {
            /* margin-top: 20px; */
            margin-left: 0px;
            padding-left: 0px;
            padding-top: 5px;
        }

        .signin_page input[type=text],
        input[type=password],
        input[type=date] {
            border: 1px solid #ddd;
            margin-top: 10px;
            width: 100%;
            height: 30px;
            padding-left: 7 px;
        }

        .signin_page .btnsignin {
            margin-top: 15px;
            /* float: right; */
            /* border-color: green; */
            border: 1px solid lightskyblue;
            background: white;
            padding: 4px 4px;
            border-radius: 4px;
            color: blue;
            width: 100%;
        }

        .error_message {
            height: 10px
        }
    </style>
</head>

<body>
    <?php include FILE_HEADER ?>
    <div class="wrapper_signin">
        <div class="signin_page">
            <!-- <div class="close">
                <a href="#">x</a>
            </div> -->
            <div style="height:60px;width:60px; margin:auto;background:none;padding-top:20px;" class="banner">
                <img src="image/user.png" />
            </div>
            <div class="title" style="margin-top : 30px;">
                Đăng ký
            </div>
            <form class="form" id="myform" name="myform" method="post">
                <div class="label">
                    Họ và tên:
                </div>
                <div>
                    <input type="text" name="username" id="username" placeholder="Nhập họ tên đầy đủ" />
                    <div class="error_message"><label style="color:red;" name="error_username" id="error_username"> </label></div>
                </div>
                <div class="label">
                    Email:
                </div>
                <div>
                    <input type="text" name="email" id="email" placeholder="Nhập Email" />
                    <div class="error_message"><label style="color:red" id="error_email"></label></div>
                </div>
                <div class="label">
                    Password:
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder=" Nhập Password" />
                    <div class="error_message"><label style="color:red" id="error_password"></label></div>
                </div>
                <div class="label">
                    Xác nhận Password:
                </div>
                <div>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder=" Nhập lại Password" />
                    <div class="error_message"><label style="color:red" id="error_confirm_password"></label></div>
                </div>
                <div class="label">
                    Ngày sinh:
                </div>
                <div>
                    <input type="date" id="dob" name="dob" style="text-align:left;width:172px;margin-bottom:5px" value="<?php echo date("Y-m-d"); ?>">
                    <div class="error_message"><label style="color:red" id="error_dob"></label></div>
                </div>
                <div class="label">
                    Giới tính:
                </div>
                <div style="margin-top:5px;padding-bottom:10px;">
                    <div style="float:left; padding-left:0px;"><input type="radio" id="male" name="gender" value="Male" checked>
                        <label for="Male">Male</label><br>
                    </div>

                    <div style="float:left;padding-left:20px;">
                        <div><input type="radio" id="female" name="gender" value="Female">
                            <label for="Female">Female</label><br>
                        </div>
                    </div>

                    <div style="float:left;padding-left:20px;">
                        <div><input type="radio" id="other" name="gender" value="Other">
                            <label for="Other">Other</label><br>
                        </div>
                    </div>

                </div>
                <div class="label" style="clear: both; padding-top: 12px;">
                    Địa chỉ:
                </div>
                <div>
                    <textarea id="address" name="address" style="width:100%;" rows="3">
                </textarea>
                    <div class="error_message"><label style="color:red; margin-bottom:5px;" id="error_address"></label></div>
                </div style="margin-top:30px;">
                <div style="margin-top:10px">
                    <input type="checkbox" id="confirm" name="confirm" value="confirm">
                    <lable style="font-size: 12px;" for="Confirm">
                        Tôi <span style="color:blue;font-weight:bold">đồng ý</span> với các
                        <span style="color:Red;font-weight:bold">điều khoản</span> của trang web
                    </lable>
                    <div style="float:left" class="error_message"><label style="color:red" id="error_confirm"></label></div>
                </div>
                <div style="clear: both;">
                    <input type="button" class="btnsignin" id="btnsignin" name="btnsignin" value="Đăng ký"></input>
                </div>
            </form>
        </div>
    </div>
    </div>
    <?php include FILE_FOOTER;
    ob_end_flush();
    ?>
</body>
<script type="text/javascript">
    $(document).ready(function() {

        $("#btnsignin").on('click', function() {
            // if (IsValid()) {
            //     var email = $("#email").val();
            //     var email = $("#email").val();
            //     var password = $("#password").val();
            //     // var remember = $("#remember").val();
            //     var remember = $("#remember").is(':checked') == true ? 1 : 0;

            //     $.ajax({
            //         async: false,
            //         url: "check.php",
            //         method: "post",
            //         data: {
            //             email: email,
            //             password: password,
            //             remember: remember,
            //         },
            //         success: function(response) {
            //             if (response == 1) {
            //                 window.location = "";
            //             } else {
            //                 $("#error_message").text(response);
            //                 alert(response);
            //             }
            //         }
            //     });
            // }
            // alert($("input[name='gender']:checked").val(););
            // var username = $.trim($("#username").val());
            // alert(username);
            // document.getElementById('error_username').innerHTML ="lịnnh";
            // $("#error_username").text("111");  
            // alert($.trim($("#username").val()));
            // $("#error_username").text("Vui lòng nhập đẩy đủ họ tên");
            // if ($.trim($("#username").val()) == "") {
            //     $("#error_username").text("Vui lòng nhập đẩy đủ họ tên");
            // }

            if (IsValid()) {
                $.ajax({
                    async: false,
                    url: "signin_insert.php",
                    method: "post",
                    data: {
                        username: $.trim($("#username").val()),
                        email: $.trim($("#email").val()),
                        password: $.trim($("#password").val()),
                        confirm_password: $.trim($("#confirm_password").val()),
                        dob: $.trim($("#dob").val()),
                        gender: $('input[name=gender]:checked').val(),
                        address: $.trim($("#address").val()),
                        confirm: $.trim($("#confirm").is(':checked')),
                    },
                    success: function(response) {
                        if (response == 1) {
                            window.location = "";
                        } else {
                            $("#error_message").text( "Đăng ký thất bại. Lỗi: " + response);
                            alert(response);
                        }
                    }
                });
            }
        });

        function IsValid() {
            var username = $.trim($("#username").val());
            var email = $.trim($("#email").val());
            var password = $.trim($("#password").val());
            var confirm_password = $.trim($("#confirm_password").val());
            var dob = $.trim($("#dob").val());
            var gender = $('input[name=gender]:checked').val();
            var address = $.trim($("#address").val());
            var confirm = $.trim($("#confirm").is(':checked'));

            if (username == "") {
                $("#error_username").text("Vui lòng nhập đầy đủ họ tên");
                // return false;
            }

            if (username.length < 5 && username != "") {
                $("#error_username").text("Vui lòng nhập họ tên có ít nhất là 5 kí tự");
                //  return false;
            }

            if (email == "") {
                // $("#email").css("borderColor", "red");
                $("#error_email").text("Vui lòng nhập Email");
                //alert("Vui lòng nhập Email");
                // return false;
            }

            var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (!(pattern.test(email)) && email != "") {
                // $("#email").css("borderColor", "red");
                $("#error_email").text("Định dạng Email không hợp lệ!");
                //alert("Định dạng Email không hợp lệ!");
                //   return false;
            }

            if (password == "") {
                $("#error_password").text("Vui lòng nhập Password!");
                //alert("Vui lòng nhập Password");
                // $("#password").css("borderColor", "red");
                // return false;
            }

            if (confirm_password == "") {
                $("#error_confirm_password").text("Vui lòng nhập mật khẩu xác nhận!");
                //alert("Vui lòng nhập mật khẩu xác nhận");
                // $("#confirm_password").css("borderColor", "red");
                // return false;
            }

            if (password != confirm_password && confirm_password != "") {
                $("#error_confirm_password").text("Mật khẩu không khớp!");
                //  return false;
            }

            if (!isDate(dob)) {
                $("#error_dob").text("Định dạng ngày không hợp lệ!");
                // return false;
            }

            if (address == "") {
                $("#error_address").text("Vui lòng nhập địa chỉ!");
                //  return false;
            }

            if (confirm == false) {
                $("#error_confirm").text("Vui lòng check vào ô Tôi xác nhận...!");
                // return false;
            }
            return true;
        }

        function isDate(stringDate) {
            var currVal = stringDate;
            if (currVal == '')
                return false;

            // var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
            var rxDatePattern = /^(\d{4})(\/|-)(\d{1,2})(\/|-)(\d{1,2})$/; //yyyy-mm-dd
            var dtArray = currVal.match(rxDatePattern);

            if (dtArray == null) {
                return false;
            };

            //Checks for mm/dd/yyyy format.
            // dtMonth = dtArray[1];
            // dtDay = dtArray[3];
            // dtYear = dtArray[5];
            dtMonth = dtArray[3];
            dtDay = dtArray[5];
            dtYear = dtArray[1];
            if (dtYear < 1000) {
                return false;
            }
            if (dtMonth < 1 || dtMonth > 12)
                return false;
            else if (dtDay < 1 || dtDay > 31)
                return false;
            else if ((dtMonth == 4 || dtMonth == 6 || dtMonth == 9 || dtMonth == 11) && dtDay == 31)
                return false;
            else if (dtMonth == 2) {
                var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
                if (dtDay > 29 || (dtDay == 29 && !isleap))
                    return false;
            }
            return true;
        }
    });
</script>

</html>