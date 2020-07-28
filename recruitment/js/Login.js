function ClearError(id) {
    document.getElementById(id).style.borderColor = "#ddd";
}

$(document).ready(function () {
    $("#btnlogin").on('click', function () {
        if (IsValid()) {
            var email = $("#email").val();
            var password = $("#password").val();
            var remember = $("#remember").is(':checked') == true ? 1 : 0;

            $.ajax({
                async: false,
                url: "login_check.php",
                method: "post",
                data: {
                    email: email,
                    password: password,
                    remember: remember,
                },
                success: function (response) {
                    if (response == 1) {
                        window.location = 'index.php';
                    } else {
                        $("#error_message").text(response);
                        alert(response);
                    }
                }
            });
        }
    });

    function IsValid() {
        var email = $.trim($("#email").val());
        var password = $.trim($("#password").val());
        if (email == "") {
            $("#email").css("borderColor", "red");
            alert("Vui lòng nhập Email");
            return false;
        }

        var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (!(pattern.test(email))) {
            $("#email").css("borderColor", "red");
            alert("Định dạng Email không hợp lệ!");
            return false;
        }

        if (password == "") {
            alert("Vui lòng nhập Password");
            $("#password").css("borderColor", "red");
            return false;
        }
        return true;
    }
});