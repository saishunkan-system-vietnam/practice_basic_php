$(document).ready(function () {

    CheckTimeout();

    $(document).on("click", "#btn_changepass", function () {
        var check = ValidatePass();
        if (!check) {
            alert("Đổi mật khẩu thất bại, vui lòng kiểm tra lại");
        }
        else {
            CheckTimeout();

            $.ajax({
                async: false,
                type: "post",
                url: "./lib/sendmail.php",
                data: {
                    uid: uid,
                    pass: $.trim($("#txt_pass").val()),
                    changepass:1,
                },
                success: function (response) {
                    if(response == true)
                    {
                        alert("Đổi mật khẩu thành công");
                        window.location.href = './index.php';
                    }
                    else
                    {
                        alert("Đổi mật khẩu thất bại");
                    }
                }
            });
        }
    });

    function CheckTimeout()
    {
        $.ajax({
            async: false,
            type: "post",
            url: "./lib/sendmail.php",
            data: {
                uid: uid,
                token: token,
                checktimeout: 1,
            },
            success: function (response) {
                if(response == true)
                {
                    return;    
                }
                else
                {
                    alert("Yêu cầu hết đã hết hạn");
                    window.location.href = './index.php';
                }
            }
        });
    }

    function ValidatePass() {
        var pass = $.trim($("#txt_pass").val());
        var rpass = $.trim($("#txt_rpass").val());
        var flag = true;

        if (pass != rpass) {
            $("#txt_rpass").css("border-bottom", "2px solid #F90A0A");
            flag = false;
        } else {
            $("#txt_rpass").css("border-bottom", "1.4px solid rgb(24, 103, 192)");
        }

        if (pass.length <= 0) {
            $("#txt_pass").css("border-bottom", "2px solid #F90A0A");
            flag = false;
        } else {
            $("#txt_pass").css("border-bottom", "1.4px solid rgb(24, 103, 192)");
        }
        return flag;
    }
});