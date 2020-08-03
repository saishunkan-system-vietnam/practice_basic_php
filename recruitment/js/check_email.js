function ClearError(id) {
    document.getElementById(id).style.borderColor = "#ddd";
    var err = "error_" + id;
    document.getElementById(err).innerHTML = "";
}

// function Processing()
// {
//     $("#error_email_check").text("Đang xử lý gửi Email...");
//     $("#error_email_check").css("color", "blue");
//     document.getElementsByName('error_email_check').innerHTML = "fsdgsfs";
// }

$(document).ready(function () {
    $("#btnsend").on('click', function () {
        // document.getElementById('error_email_check').innerHTML = "fsdgsfs";
        // $("#error_email_check").text("Đang xử lý gửi Email...");
        // $("#email_check").val("Đang xử lý gửi Email...");
        // $("#error_email_check").html("<p>Đang xử lý gửi Email...</p>");
        // $("#error_email_check").css("color", "blue");
        if (IsValid("email_page")) {
            $.ajax({
                async: false,
                url: "check_email.php",
                method: "post",
                dateType: 'text',
                data: {
                    email: $("#email_check").val(),
                },
                success: function (response) {
                    if (response == 1) {
                        $("#email_check").val("");
                        $("#error_email_check").text("Email đã được gửi. Vui lòng kiểm tra hộp thư.");
                        $("#error_email_check").css("color", "blue");
                    }
                    else {
                        $("#error_email_check").text("Email không tồn tại. Vui lòng kiểm tra lại email!");
                        $("#error_email_check").css("color", "red");
                    }
                }
            });
        }
    });

    $("#btnchange").on('click', function () {
        if (IsValid("password_page")) {
            // window.$_GET = new URLSearchParams(location.search);
            // var value1 = $_GET.get('param1');
            var url = new URLSearchParams(location.search);
            var email = url.get('email');
            var token = url.get('token');
            $.ajax({
                async: false,
                url: "insert_new_password.php",
                method: "post",
                dateType: 'text',
                data: {
                    email: email,
                    password: $("#password").val(),
                    token: token,
                },
                success: function (response) {
                    if (response == 1) {
                        $("#password").val("");
                        $("#confirm_password").val("");
                        $("#error_message").text("Đổi mật khẩu thành công.");
                        $("#error_message").css("color", "blue");

                        if (window.confirm("Đổi mật khẩu thành công.Bạn có muốn chuyển đến trang login không ?")) {
                            window.location = 'login.php';
                        }
                    }
                    else {
                        $("#error_message").text("Đã xảy ra lỗi. Không thể đổi mật khẩu!");
                        $("#error_message").css("color", "blue");
                        alert("lỗi" + response);
                    }
                }
            });
        }
    });

    function IsValid($form_id) {
        if ($form_id == "email_page") {
            // $("#error_email_check").text("Đang xử lý gửi Email...");
            // $("#error_email_check").css("color", "blue");
            // document.getElementById('error_email_check').innerHTML = "fsdgsfs";
            var email = $.trim($("#email_check").val());

            if (email == "") {
                $("#email_check").css("borderColor", "red");
                $("#error_email_check").text("Vui lòng nhập tên email đăng nhập!").css("color", "red");
                return false;
            }

            var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (!(pattern.test(email))) {
                $("#email_check").css("borderColor", "red");
                $("#error_email_check").text("Định dạng Email không hợp lệ!").css("color", "red");
                return false;
            }

            return true;
        }
        else if ($form_id == "password_page") {
            var password = $.trim($("#password").val());
            var confirm_password = $.trim($("#confirm_password").val());
            var result = true;

            if (password == "") {
                $("#password").css("borderColor", "red");
                $("#error_password").text("Vui lòng nhập password mới!").css("color", "red");
                result = false;
            }

            if (confirm_password == "") {
                $("#confirm_password").css("borderColor", "red");
                $("#error_confirm_password").text(" Vui lòng nhập lại mật khẩu xác nhận").css("color", "red");
                result = false;
            }

            if (password != "" && confirm_password != "" && confirm_password != password) {
                $("#confirm_password").css("borderColor", "red");
                $("#error_confirm_password").text("Password không khớp. Vui lòng kiểm tra lại!").css("color", "red");
                result = false;
            }

            if (password != "" && password.length < 5) {
                $("#password").css("borderColor", "red");
                $("#error_password").text("Password không được ít hơn 5 kí tự!").css("color", "red");
                result = false;
            }

            if (confirm_password != "" && confirm_password.length < 5) {
                $("#confirm_password").css("borderColor", "red");
                $("#error_confirm_password").text("Password không khớp. Vui lòng kiểm tra lại!").css("color", "red");
                result = false;
            }

            return result;
        }
    }
});