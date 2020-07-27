$(document).ready(function () {
    $('#form_changePass').on('submit', function (event) {
        var email = $.trim($('#email_changePass').val());
        var password = $.trim($('#new_password').val());
        var re_password = $.trim($('#re_new_password').val());
        
        $.ajax({
            url: "./changePasswordSubmit.php",
            method: "POST",
            data: {
                email,
                password
            },
            success: function (data) {
                alert(data);
                window.location="http://sinh.com/";
            }
        });
    });
});