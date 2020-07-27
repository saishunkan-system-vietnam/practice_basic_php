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

    return result;

}