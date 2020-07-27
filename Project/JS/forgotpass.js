$(document).ready(function () {
    $('#form_forgotPass').on('submit', function (event) {
        var email = $.trim($('#email_confirm').val());
        if (isExistsEmail(email) !=1) {
            alert("Email của bạn không tồn tại!!!!")
        }
        else{
            $.ajax({
                url: "./sentMail.php",
                method: "POST",
                data: {
                    email
                },
                success: function (data) {
                    alert(data);
                }
            });
        }
    });
});