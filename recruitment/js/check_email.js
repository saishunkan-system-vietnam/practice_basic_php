function ClearError(id) {
    document.getElementById(id).style.borderColor = "#ddd";
    var err = "error_" + id;
    document.getElementById(err).innerHTML = "";
}

$(document).ready(function () {
    $("#btnsend").on('click', function () {
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
            alert("ok");
            $.ajax({
                async: false,
                url: "insert_new_password.php",
                method: "post",
                dateType: 'text',
                data: {
                    password: $("#password").val(),
                },
                success: function (response) {
                    if (response == 1) {
                        $("#error_message").text("Đổi mật khẩu thành công.");
                        $("#error_message").css("color", "blue");
                        alert("Đổi mật khẩu thành công");
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

            if (password.length < 5) {
                $("#password").css("borderColor", "red");
                $("#error_password").text("Password không được ít hơn 5 kí tự!").css("color", "red");
                result = false;
            }

            if (confirm_password.length < 5) {
                $("#confirm_password").css("borderColor", "red");
                $("#error_confirm_password").text("Password không khớp. Vui lòng kiểm tra lại!").css("color", "red");
                result = false;
            }

            return result;
        }
    }
});