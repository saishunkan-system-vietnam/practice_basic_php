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

function CreateReply(id_hdr, id_dtl) {
    var form = $(".warpper-survey");
    var result;
    $.ajax({
        async: false,
        type: "post",
        url: "./lib/survey_ajax.php",
        data: {
            id_hdr: id_hdr,
            id_dtl: id_dtl,
            createSurvey: true,
        },
        success: function(data) {
            result = data;
        }
    });

    if (result == true) {
        form.css("visibility", "hidden");
        alert("Trả lời thành công");
    } else {
        alert("Trả lời thất bại");
    }

    return result;

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
            data.forEach(function(item) {

                if (element == "") {
                    element += '<div class="question"><p>' + item.content + '</p></div><div class="answer"><ul>';
                }
                element += '<li><input type="radio" name="asw" ';

                if (item.sl_asw == "1") {
                    element += ' checked ';
                }
                element += ' value="' + item.id_dtl + '"><label for="asw">' + item.answer + '</label></li>';
            });

            element += '</ul></div>' +
                ' <div class="kq">' +
                '<button class="btn-reply-survey" id = "' + data[0].id_hdr + '">Trả lời</button></div>';

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
