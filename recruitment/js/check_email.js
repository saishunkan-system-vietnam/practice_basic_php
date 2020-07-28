function ClearError(id) {
    document.getElementById(id).style.borderColor = "#ddd";
    var err = "error_" + id;
    document.getElementById(err).innerHTML = "";
}

$(document).ready(function () {
    $("#btnsend").on('click', function () {
        if (IsValid()) {
            $.ajax({
                async: false,
                url: "check_email.php",
                method: "post",
                dateType: 'text',
                data: {
                    email: $("#email_check").val(),
                },
                success: function (response) {
                    console.log(response);
                    // if (response == 1) {
                    //     window.location = 'index.php';
                    // } else {
                    //     $("#error_email_check").text(response);
                    //     alert(response);
                    // }
                    if(response == 1){
                        $("#error_email_check").text("Email đã được gửi. Vui lòng kiểm tra hộp thư.");                   
                        alert("ok");
                    }
                    else
                    {
                        $("#error_email_check").text("Email không tồn tại. Vui lòng kiểm tra lại email!");
                        alert("lỗi");
                    }
                }
            });
        }

        
    });

    function IsValid() {
        var email = $.trim($("#email_check").val());   
        if (email == "") {
            $("#email_check").css("borderColor", "red");
            $("#error_email_check").text("Vui lòng nhập tên email đăng nhập!");
            return false;
        }

        var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (!(pattern.test(email))) {
            $("#email_check").css("borderColor", "red");    
            $("#error_email_check").text("Định dạng Email không hợp lệ!");
            return false;
        }

        return true;
    }
});