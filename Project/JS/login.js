$(document).ready(function () {
    $("#loginbtn").click(function () {
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
                }
                else {
                    alert("Tài khoản hoặc mật khẩu chưa chính xác")
                }
            }
        });
    });
});