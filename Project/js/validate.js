$(document).ready(function () {
    $.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            return this.optional(element) || regexp.test(value);
        },
        "Làm ơn nhập đúng định dạng"
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
                regex: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/,
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
                required: "Làm ơn UserName",
                minlength: "Nhập nhiều hơn 4 kí tự",
            },
            inpEmail: {
                required: "Làm ơn nhập Email",
            },
            inpPass: {
                required: "Làm ơn nhập mật khẩu",
            },
            inpRePass: {
                required: "Làm ơn nhập mật khẩu",
                equalTo: "Nhập Confirm Password giống Password"

            },
            check: "Làm Hãy đồng ý điều khoản",
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
            $(element.check).css('border', '1px', 'solid');
        },

    });
});

$("#inpUser").keyup(function () { 
    var username = $(this).val(); 
    $.post('checkUser.php', {'inpUser':username}, function(data) { 
    $("#user-result").html(data);
    });
 });    