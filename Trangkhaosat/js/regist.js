$(document).ready(function() {

    $("#btnregist").click(function() {
        if (Validate_regist(true)) {
            let isExist = CheckExist();
            if (isExist == 0) {
                if (Regist()) {
                    alert("Đăng ký thành công");
                    $("#frm_Regist").submit();
                } else {
                    alert("Đăng ký thất bại");
                }
            } else if (isExist > 0) {
                alert("Không thể đăng ký vì email này đã tồn tại - Vui lòng kiểm tra lại");
            } else {
                alert("Connection failed: Không thể kết nối đến máy chủ!");
            }
        } else {
            alert("Vui lòng điền vào mẫu chính xác");
        }
    });

    function Regist() {
        var result = false;

        $.ajax({
            async: false,
            type: "post",
            url: "./lib/regist_ajax.php",
            data: {
                uid: $.trim($("#uid").val()),
                fname: $.trim($("#fname").val()),
                lname: $.trim($("#lname").val()),
                pass: $.trim($("#pass").val()),
                tel: $.trim($("#tel").val()),
                gender: $("input[name='gender']:checked").val(),
                admin_flg: 0,
                proc: "Regist",
            },
            success: function(data) {

                result = data;
            }
        });
        return result;
    }

    function CheckExist() {
        var result;

        $.ajax({
            async: false,
            type: "post",
            url: "./lib/regist_ajax.php",
            data: {
                uid: $.trim($("#uid").val()),
                proc: "CheckExistAccount",
            },
            datatype: "JSON",
            success: function(data) {
                result = data[0].result;
            },
        });

        return result;
    }

    var form = $(".warpper_regist");
    $("#btn_menu_regist").click(function(e) {
        e.preventDefault();

        form.css("visibility", "visible");
        status = true;
    });

    $("#CloseRegist").click(function(e) {
        e.preventDefault();
        form.css("visibility", "hidden");
        CloseForm();
    });

    function CloseForm() {
        $("#fname").val("");
        $("#lname").val("");
        $("#uid").val("");
        $("#ruid").val("");
        $("#pass").val("");
        $("#rpass").val("");
        $("#tel").val("");

        $("#fname").css("border-bottom", "0px");
        $("#lname").css("border-bottom", "0px");
        $("#uid").css("border-bottom", "0px");
        $("#ruid").css("border-bottom", "0px");
        $("#pass").css("border-bottom", "0px");
        $("#rpass").css("border-bottom", "0px");
        $("#tel").css("border-bottom", "0px");
    }

    $(document).on('keydown', function(e) {
        if (e.keyCode === 27) {
            form.css("visibility", "hidden");
            CloseForm();
        }
    });
});