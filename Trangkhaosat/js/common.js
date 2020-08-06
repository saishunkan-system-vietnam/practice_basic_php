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

    if (user.match(userPat) == null) {
        return false;
    }
    var IPArray = domain.match(ipDomainPat);
    if (IPArray != null) {
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

function isTel(tel) {
    pattern = /((09|03|07|08|05)+([0-9]{8})\b)/g;

    return pattern.test(tel);
}

function Validate_regist(isRegist) {
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

    if(isRegist)
    {
        if (uid != ruid) {
            $("#ruid").css("border-bottom", "2px solid #F90A0A");
            flag = false;
        } else {
            $("#ruid").css("border-bottom", "0px");
        }

        if (pass != rpass) {
            $("#rpass").css("border-bottom", "2px solid #F90A0A");
            flag = false;
        } else {
            $("#rpass").css("border-bottom", "0px");
        }
    }

    if (pass.length <= 0) {
        $("#pass").css("border-bottom", "2px solid #F90A0A");
        flag = false;
    } else {
        $("#pass").css("border-bottom", "0px");
    }

    if (!isTel(tel)) {
        $("#tel").css("border-bottom", "2px solid #F90A0A");
        flag = false;
    } else {
        $("#tel").css("border-bottom", "0px");
    }

    return flag;
}

function OpenForm_Login() {
    $(".warpper_login").css("visibility", "visible");

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

    function ShowFormSurvey(id)
    {
        var data = GetInfoSurvey(id);
            var element = "";
            var qs = "";
            index = 0;
            data.forEach(function(item) {

                if(qs != item.content)
                {
                    qs = item.content ;
                    index ++;
                    if (element == "") {
                        element += '<div id ="btn_close"><button class="btn_close"><i class ="fa fa-close"></i></button></div><div class="question"><p class = "qs'+index+'">' + item.content + '</p></div><div class="answer"><ul>';
                    }
                    else
                    {
                        element += '</ul></div>' +
                                    '<div class="question"><p class = "qs'+index+'">' + item.content + '</p></div><div class="answer"><ul>';
                    }
                }
                
                element += '<li><input type="radio" name="asw'+index+'" ';

                if (item.sl_asw == "1") {
                    element += ' checked ';
                }
                element += ' value="' + item.id_dtl + '" hdr = "'+item.id_hdr+'"><label for="asw">' + item.answer + '</label></li>';
            });

            element += '</ul></div>' +
                ' <div class="kq">' +
                '<button class="btn-reply-survey" multi = "' + data[0].id_multi + '">Trả lời</button></div>';

                return element;
    }

    function GetInfoSurvey(id) {
        var result;
        $.ajax({
            async: false,
            type: "post",
            url: "./lib/survey_ajax.php",
            data: {
                id: id,
                getInfoSurvey: true,
            },
            success: function(data) {
            result = data;
            }
        });

        return result;
    }

    function CreateReply(id_hdr, id_dtl) {
        let d = new Date();
        var id = Math.floor((Math.random() * 1000) + 1) + "/" + d.getTime();
        var result;
        $.ajax({
            async: false,
            type: "post",
            url: "./lib/survey_ajax.php",
            data: {
                id_hdr: id_hdr,
                id_dtl: id_dtl,
                id : id,
                createSurvey: true,
            },
            success: function(data) {
                result = data;
            }
        });

        return result;
    }

    function GetIndexSvMulti(id_multi)
    {
        let result = 0;
        $.ajax({
            async: false,
            type: "post",
            url: "./lib/survey_ajax.php",
            data: {
                GetIndexSvMulti: true,
                id_multi: id_multi,
            },
            success: function(data) {
                console.log(data);
                result = data;
            }
        });

        return result;
    }
