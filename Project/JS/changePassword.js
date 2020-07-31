$(document).ready(function () {
    $('#form_changePass').on('submit', function (event) {
        var email = $.trim($('#email_changePass').val());
        var token = $.trim($('#token_changePass').val());
        var password = $.trim($('#new_password').val());
        
        $.ajax({
            url: "./changePasswordSubmit.php",
            method: "POST",
            data: {
                email,
                token,
                password
            },
            success: function (data) {
                alert(data);
                window.location="http://sinh.com/";
            }
        });
    });   
});

function InvalidMsg(textbox) {
    if (textbox.value != $.trim($('#new_password').val())) {
        textbox.setCustomValidity('Mật khẩu không trùng khớp');
    }
    else {
        textbox.setCustomValidity('');
    }
    return true;
}

