$(document).ready(function () {
    $("#registbtn").click(function () {
        var fullname    = $.trim($('#fullname').val());
        var sex         = $.trim($('.sex:checked').val());
        var phone       = $.trim($('#phone').val());
        var bday        = $.trim($('#bday').val());
        var email       = $.trim($('#email').val());
        var address     = $.trim($('#address').val());
        var password    = $.trim($('#password').val());
        var re_password = $.trim($('#re_password').val());
        var isExists;

        $.ajax({
            url: "./register.php",
            method: "GET",
            data: email,
            success: function (data) {
                console.log(data);
                isExists = data;               
            }
        });

        if (isExists) {
            alert("Email của bạn đã được đăng ký!!!!")
        }
        else{
            $.ajax({
                url: "./register.php",
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
                success: function (data) {
                    console.log(data);
                    if (data) {
                        document.getElementById('regist').style.display = 'none';
                        alert("Bạn đã đăng kí thành công")
                    }
                    else {
                        alert("Bạn chưa đăng kí thành công!!!!!")
                    }
                }
            });
        }
        
    });
});