$(document).ready(function () {
    $('#form_register').on('submit', function (event) {

        var fullname    = $.trim($('#fullname').val());
        var sex         = $.trim($('input[name="sex"]:checked').val());
        var phone       = $.trim($('#phone').val());
        var bday        = $.trim($('#bday').val());
        var email       = $.trim($('#email').val());
        var address     = $.trim($('#address').val());
        var password    = $.trim($('#password').val());

        if (isExistsEmail(email) ==1) {
            alert("Email của bạn đã được đăng ký!!!!")
        }
        else{
            $.ajax({
                async: false,
                url: "../register.php",
                method: "POST",
                data: {
                    fullname,
                    sex,
                    phone,
                    bday,
                    email,
                    address,
                    password
                },
                dataType: 'JSON',
                success: function (data) {
                    console.log(data);
                    if (data.status == 'success') {
                        document.getElementById('regist').style.display = 'none';
                        alert("Bạn đã đăng kí thành công")
                    } else {
                        lert("Bạn chưa đăng kí thành công!!!!!")
                    }
                }
            });
        }   
    });
});

function InvalidMsg(textbox) {
    if (textbox.value != $.trim($('#password').val())) {
        textbox.setCustomValidity('Mật khẩu không trùng khớp');
    }
    else {
        textbox.setCustomValidity('');
    }
    return true;
}

