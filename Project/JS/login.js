$(document).ready(function () {
    var isExists;
    $("#btnlogin").click(function () {

        $.ajax({
            url: "./login_submit.php",
            method: "post",
            data: {
                uid: $.trim($("#uid").val()),
                pass: $.trim($("#pass").val()),
                save: $.trim($("#save").val()),
            },
            success: function (data) {
                isExists = data;
                if (isExists) {
                    // document.getElementById('login').style.display='none';
                    alert("Đăng nhập thành công");
                }
                else{
                    alert("Tài khoản hoặc mật khẩu chưa chính xác")
                }
            }
        });
    });


});