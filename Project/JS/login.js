$(document).ready(function () {
    $('#form_login').on('submit', function (event) {
        event.preventDefault();
        $.ajax({
            url: "./login_logout.php",
            method: "POST",
            data: {
                uid: $.trim($("#uid").val()),
                pass: $.trim($("#pass").val()),
                save: $.trim($("#save").val()),
            },
            dataType: 'JSON',
            success: function (data) {
                if (data.status == 'success') {
                    closeForm('login');
                    location.reload(true);
                } else {
                    alert("Tài khoản hoặc mật khẩu chưa chính xác")
                }
            }
        });
    });
});