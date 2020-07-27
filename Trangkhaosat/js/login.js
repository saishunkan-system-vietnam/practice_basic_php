$(document).ready(function() {
    var form = $(".warpper_login");
    $(document).on('keydown', function(e) {
        if (e.keyCode === 27) {
            form.css("visibility", "hidden");
        }
    });

    $("#btn_menu_login").click(function(e) {
        e.preventDefault();
        OpenForm();
    });

    function OpenForm() {
        form.css("visibility", "visible");

        $.ajax({
            async: false,
            type: "post",
            url: "./lib/getcookie_ajax.php",
            success: function(data) {
                $("#uid_login").val(data.uid);
                $("#pass_login").val(data.pass);
                $("#chksave").prop("checked", data.pass == "" ? false : true);
            }
        });
    }

    $("#btnlogin").click(function(e) {
        e.preventDefault();

        if (Validate()) {
            $.ajax({
                async: false,
                type: "post",
                url: "./lib/login_ajax.php",
                data: {
                    uid: $.trim($("#uid_login").val()),
                    pass: $.trim($("#pass_login").val()),
                    save: $("#chksave").prop("checked"),
                },
                success: function(data) {
                    if (data == true) {
                        form.css("visibility", "hidden");
                        location.reload();
                    } else if (data == false) {
                        alert("Tài khoản đăng nhập hoặc mật khẩu không chính xác");
                    } else {
                        alert("Connection failed: Không thể kết nối đến máy chủ!");
                    }
                }
            });
        } else {
            alert("Vui lòng nhập đầy đủ thông tin và chính xác")
        }
    });

    function Validate() {
        var uid = $.trim($("#uid_login").val());
        var pass = $.trim($("#pass_login").val());

        var flag = true;

        if (!isEmail(uid)) {
            $("#uid_login").css("border-bottom", "2px solid #F90A0A");
            flag = false;
        } else {
            $("#uid_login").css("border-bottom", "0px");
        }

        if (pass.length <= 0) {
            $("#pass_login").css("border-bottom", "2px solid #F90A0A");
            flag = false;
        } else {
            $("#pass_login").css("border-bottom", "0px");
        }

        return flag;
    }
});