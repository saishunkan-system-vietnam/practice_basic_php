$(document).ready(function () {
    $.validator.addMethod(
        "regex",
        function (value, element, regexp) {
            return this.optional(element) || regexp.test(value);
        },
        "Vui lòng nhập đúng định dạng"
    );

    $('#inpSub').on('click', function () {
        var inp_value_mail = $('#inpMail').val();
        var err_value_mail = $('.error').text();
        if (inp_value_mail == '' || err_value_mail != '') {
            $("#frm_send_mail").validate({
                // Specify validation rules
                rules: {
                    inpMail: {
                        required: true,
                        regex: /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/,
                    },
                },
                messages: {
                    inpMail: {
                        required: "Vui lòng nhập Email",
                    },
                },

                errorPlacement: function (error, element) {
                    element.css('background', '#ffc107');
                    error.insertAfter(element);
                },
                focusElement: function (validator) {
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                        validator.errorList[0].element.focus();
                    }
                },
                unhighlight: function (element) {
                    $(element).css('background', '#000000');
                    $(element).css('opacity', '85%');
                    $(element).css('color', '#fff');
                    $(element.check).css('border', '1px', 'solid');
                },
            });
        }
        else {
            $.ajax({
                async: false,
                url: "./api/apiSendMail.php",
                method: "POST",
                data: {
                    mail: $('#inpMail').val(),
                },
                success: function (data) {
                    if (data == true) {
                        alert("Thành công! Link lấy lại mật khẩu đã được gửi vào mail bạn");
                    }
                    else {
                        alert("Email khôi phục không chính xác vui lòng nhập lại");
                    }
                }
            })
        }
    });
});

