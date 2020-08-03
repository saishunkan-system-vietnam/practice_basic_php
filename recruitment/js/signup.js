function ClearError(id) {
    document.getElementById(id).style.borderColor = "#ddd";
    var err = "error_" + id;
    document.getElementById(err).innerHTML = "";
}
    $(document).ready(function() {
        $("#btnsignup").on('click', function(event) {
            event.preventDefault();
            if (IsValid()) {
                $.ajax({
                    async: false,
                    url: "signup_insert.php",
                    method: "post",
                    data: {
                        username: $.trim($("#username").val()),
                        email: $.trim($("#email").val()),
                        password: $.trim($("#password").val()),
                        confirm_password: $.trim($("#confirm_password").val()),
                        birthdate: $.trim($("#birthdate").val()),
                        gender: $('input[name=gender]:checked').val(),
                        address: $.trim($("#address").val()),
                        // confirm: $.trim($("#confirm").is(':checked')),
                        tel: $.trim($("#tel").val()),
                    },
                    success: function(response) {
                        if (response == 1) {
                            alert("Đăng ký thành công");
                            window.location = 'login.php';
                            // window.location = "<?php echo FILE_LOGIN ?>";                            
                        } else if (response == 2) {
                            // $("#error_message").text("Đăng ký thất bại. Lỗi: " + response);
                            // alert(response);
                            alert("Email này đã có người đăng ký. Vui lòng chọn lại!");
                        } else {
                            alert("Đăng ký thất bại. Lỗi " + response);
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
            var birthdate = $.trim($("#birthdate").val());
            var gender = $('input[name=gender]:checked').val();
            var address = $.trim($("#address").val());
            var confirm = $.trim($("#confirm").is(':checked'));
            var tel = $.trim($("#tel").val());
            var is_valid = true;

            if (username == "") {
                $("#error_username").text("Vui lòng nhập đầy đủ họ tên!");
                $("#username").css("borderColor", "red");
                is_valid = false;
            }

            if (username.length < 5 && username != "") {
                $("#error_username").text("Vui lòng nhập họ tên có ít nhất là 5 kí tự!");
                $("#username").css("borderColor", "red");
                is_valid = false;
            }

            if (email == "") {
                $("#error_email").text("Vui lòng nhập Email!");
                $("#email").css("borderColor", "red");
                is_valid = false;
            }

            var pattern_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (!(pattern_email.test(email)) && email != "") {
                $("#error_email").text("Định dạng Email không hợp lệ!");
                $("#email").css("borderColor", "red");
                is_valid = false;
            }

            if (password == "") {
                $("#error_password").text("Vui lòng nhập Password!");
                $("#password").css("borderColor", "red");
                is_valid = false;
            }

            if (confirm_password == "") {
                $("#error_confirm_password").text("Vui lòng nhập mật khẩu xác nhận!");
                $("#confirm_password").css("borderColor", "red");
                is_valid = false;
            }

            // if (password != confirm_password && confirm_password != "") {
            //     $("#error_confirm_password").text("Mật khẩu không khớp!");
            //     $("#confirm_password").css("borderColor", "red");
            //     is_valid = false;
            // }

            if (password != "" && confirm_password != "" && confirm_password != password) {
                $("#confirm_password").css("borderColor", "red");
                $("#error_confirm_password").text("Password không khớp. Vui lòng kiểm tra lại!").css("color", "red");
                is_valid = false;
            }

            if (password != "" && password.length < 5) {
                $("#password").css("borderColor", "red");
                $("#error_password").text("Password không được ít hơn 5 kí tự!").css("color", "red");
                is_valid = false;
            }

            if (confirm_password!="" && confirm_password.length < 5) {
                $("#confirm_password").css("borderColor", "red");
                $("#error_confirm_password").text("Password không khớp. Vui lòng kiểm tra lại!").css("color", "red");
                is_valid = false;
            }

            if (!isDate(birthdate)) {
                $("#error_birthdate").text("Định dạng ngày không hợp lệ!");
                $("#birthdate").css("borderColor", "red");
                is_valid = false;
            }

            if (tel == "") {
                $("#error_tel").text("Vui lòng nhập số điện thoại!");
                $("#tel").css("borderColor", "red");
                is_valid = false;
            }

            var pattern_tel = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
            if (!(pattern_tel.test(tel)) && tel != "") {
                $("#error_tel").text("Định dạng của số điện thoại không hợp lệ!");
                $("#tel").css("borderColor", "red");
                is_valid = false;
            }

            if (address == "") {
                $("#error_address").text("Vui lòng nhập địa chỉ!");
                $("#address").css("borderColor", "red");
                is_valid = false;
            }

            if (confirm == false) {
                $("#error_confirm").text("Vui lòng check vào ô Tôi xác nhận...!");
                $("#confirm").css("borderColor", "red");
                is_valid = false;
            }

            return is_valid;
        }

        function isDate(stringDate) {
            var currVal = stringDate;
            if (currVal == "") {
                return false;
            }

            var pattern = /^(\d{4})(\/|-)(\d{1,2})(\/|-)(\d{1,2})$/;
            var dtArray = currVal.match(pattern);

            if (dtArray == null) {
                return false;
            };

            dtMonth = dtArray[3];
            dtDay = dtArray[5];
            dtYear = dtArray[1];

            if (dtYear < 1000) {
                return false;
            }

            if (dtMonth < 1 || dtMonth > 12) {
                return false;
            } else if (dtDay < 1 || dtDay > 31) {
                return false;
            } else if ((dtMonth == 4 || dtMonth == 6 || dtMonth == 9 || dtMonth == 11) && dtDay == 31) {
                return false;
            } else if (dtMonth == 2) {
                var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
                if (dtDay > 29 || (dtDay == 29 && !isleap)) {
                    return false;
                }
            }
            return true;
        }
    });
