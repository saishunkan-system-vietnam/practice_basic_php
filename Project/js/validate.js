$(document).ready(function () {
    $.validator.addMethod(
        "regex",
        function (value, element, regexp) {
            return this.optional(element) || regexp.test(value);
        },
        "Vui lòng nhập đúng định dạng"
    );
    $("#myForm").validate({
        // Specify validation rules
        rules: {
            inpUser:
            {
                required: true,
                minlength: 4,
            },
            inpEmail: {
                required: true,
                regex: /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/,
            },
            inpPass: {
                required: true,
                regex: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/,
            },
            inpRePass: {
                required: true,
                equalTo: "#inpPass",
            },
            check: {
                required: true,
            }
        },
        messages: {
            inpUser:
            {
                required: "Vui lòng nhập UserName",
                minlength: "Nhập nhiều hơn 4 kí tự",
            },
            inpEmail: {
                required: "Vui lòng nhập Email",
            },
            inpPass: {
                required: "Vui lòng nhập mật khẩu",
            },
            inpRePass: {
                required: "Vui lòng nhập mật khẩu",
                equalTo: "Nhập Confirm Password giống Password"

            },
            check: "Hãy đồng ý điều khoản",
        },
        submitHandler: function (form) {
            form.submit();
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
        },
    });
});

$("#inpUser").keyup(function () {
    var username = $(this).val();
    $.post('checkExist.php', { 'inpUser': username }, function (data) {
        $("#user-result").html(data);
    });
});

$("#inpEmail").keyup(function () {
    var mail = $(this).val();
    $.post('checkExist.php', { 'inpEmail': mail }, function (data) {
        $("#mail-result").html(data);
    });
});    