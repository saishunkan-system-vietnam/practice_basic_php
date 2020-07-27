$(document).ready(function() {

    $("#btnregist").click(function() {
        if (Validate()) {
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

    function Validate() {
        var fname = $.trim($("#fname").val());
        var lname = $.trim($("#lname").val());
        var uid = $.trim($("#uid").val());
        var ruid = $.trim($("#ruid").val());
        var pass = $.trim($("#pass").val());
        var rpass = $.trim($("#rpass").val());
        var tel = $.trim($("#tel").val());

        var flag = true;

        if (fname.length <= 0) {
            $("#fname").css("border-bottom", "2px solid #F90A0A");
            flag = false;
        } else {
            $("#fname").css("border-bottom", "0px");
        }

        if (lname.length <= 0) {
            $("#lname").css("border-bottom", "2px solid #F90A0A");
            flag = false;
        } else {
            $("#lname").css("border-bottom", "0px");
        }

        if (!isEmail(uid)) {
            $("#uid").css("border-bottom", "2px solid #F90A0A");
            flag = false;
        } else {
            $("#uid").css("border-bottom", "0px");
        }

        if (uid != ruid) {
            $("#ruid").css("border-bottom", "2px solid #F90A0A");
            flag = false;
        } else {
            $("#ruid").css("border-bottom", "0px");
        }

        if (pass.length <= 0) {
            $("#pass").css("border-bottom", "2px solid #F90A0A");
            flag = false;
        } else {
            $("#pass").css("border-bottom", "0px");
        }

        if (pass != rpass) {
            $("#rpass").css("border-bottom", "2px solid #F90A0A");
            flag = false;
        } else {
            $("#rpass").css("border-bottom", "0px");
        }

        if (!isTel(tel)) {
            $("#tel").css("border-bottom", "2px solid #F90A0A");
            flag = false;
        } else {
            $("#tel").css("border-bottom", "0px");
        }

        return flag;
    }

    var form = $(".warpper");
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
    }

    $(document).on('keydown', function(e) {
        if (e.keyCode === 27) {
            form.css("visibility", "hidden");
            CloseForm();
        }
    });
});