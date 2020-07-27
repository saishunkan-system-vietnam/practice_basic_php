$(document).ready(function () {
    $('#form_login').on('submit', function (event) {
        event.preventDefault();
        $.ajax({
            url: "./login.php",
            method: "post",
            data: {
                uid: $.trim($("#uid").val()),
                pass: $.trim($("#pass").val()),
                save: $.trim($("#save").val()),
            },
            success: function (data) {
                if (data) {
                    document.getElementById('login').style.display = 'none';
                    location.reload();
                }
                else {
                    alert("Tài khoản hoặc mật khẩu chưa chính xác")
                }
            }
        });
    });
});