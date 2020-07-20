$(document).ready(function () {

    $("#btnregist").click(function () {
        if (Validate())
        {
            // alert("Đăng ký thành công");
            if( CheckExist() == 0)
            { 
                if(Regist())
                {
                     alert("Đăng ký thành công");
                     $("#frm_Regist").submit();
                }
                else
                {
                    alert("Đăng ký thất bại");
                }
            }
            else
            {
                 alert("Không thể đăng ký vì email này đã tồn tại - Vui lòng kiểm tra lại");
            }
        }
        else 
        {
            alert("Vui lòng điền vào mẫu chính xác");
        }
    });

    function Regist()
    {
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
            success: function (data) {
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
            success: function (data) {
            result =  data[0].result;
         
                // for (var i=0; i<msg.length; i++)
                // {
                //     console.log(msg[0].result);
                // }
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

        // Nếu chưa nhập Họ
        if (fname.length <= 0) {
            $("#fname").css("border-bottom", "2px solid #F90A0A");
            flag = false;
        } else {
            $("#fname").css("border-bottom", "0px");
        }

        // Nếu chưa nhập Tên
        if (lname.length <= 0) {
            $("#lname").css("border-bottom", "2px solid #F90A0A");
            flag = false;
        } else {
            $("#lname").css("border-bottom", "0px");
        }

        // Email
        if (!isEmail(uid)) {
            $("#uid").css("border-bottom", "2px solid #F90A0A");
            flag = false;
        } else {
            $("#uid").css("border-bottom", "0px");
        }

        // Xác nhận Email
        if (uid != ruid) {
            $("#ruid").css("border-bottom", "2px solid #F90A0A");
            flag = false;
        } else {
            $("#ruid").css("border-bottom", "0px");
        }

        // Nếu chưa nhập Pass
        if (pass.length <= 0) {
            $("#pass").css("border-bottom", "2px solid #F90A0A");
            flag = false;
        } else {
            $("#pass").css("border-bottom", "0px");
        }

        // Xác nhận Mật khẩu
        if (pass != rpass) {
            $("#rpass").css("border-bottom", "2px solid #F90A0A");
            flag = false;
        } else {
            $("#rpass").css("border-bottom", "0px");
        }

        // Nếu chưa nhập tell
        if (tel.length <= 0) {
            $("#tel").css("border-bottom", "2px solid #F90A0A");
            flag = false;
        } else {
            $("#tel").css("border-bottom", "0px");
        }

        return flag;
    }

    function isEmail(emailStr) {
        var emailPat = /^(.+)@(.+)$/;
        var specialChars = '\\(\\)<>@,;:\\\\\\"\\.\\[\\]';
        var validChars = "[^\\s" + specialChars + "]";
        var quotedUser = '("[^"]*")';
        var ipDomainPat = /^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/;
        var atom = validChars + "+";
        var word = "(" + atom + "|" + quotedUser + ")";
        var userPat = new RegExp("^" + word + "(\\." + word + ")*$");
        var domainPat = new RegExp("^" + atom + "(\\." + atom + ")*$");
        var matchArray = emailStr.match(emailPat);
        if (matchArray == null) {
            return false;
        }
        var user = matchArray[1];
        var domain = matchArray[2];

        // See if "user" is valid
        if (user.match(userPat) == null) {
            return false;
        }
        var IPArray = domain.match(ipDomainPat);
        if (IPArray != null) {
            // this is an IP address
            for (var i = 1; i <= 4; i++) {
                if (IPArray[i] > 255) {
                    return false;
                }
            }
            return true;
        }
        var domainArray = domain.match(domainPat);
        if (domainArray == null) {
            return false;
        }

        var atomPat = new RegExp(atom, "g");
        var domArr = domain.match(atomPat);
        var len = domArr.length;

        if (
            domArr[domArr.length - 1].length < 2 ||
            domArr[domArr.length - 1].length > 3
        ) {
            return false;
        }

        if (len < 2) {
            return false;
        }

        return true;
    }
});
