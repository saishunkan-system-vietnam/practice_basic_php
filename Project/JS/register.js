$(document).ready(function () {
    var isExists;
    $('#form_register').on('submit', function (event) {

        var fullname    = $.trim($('#fullname').val());
        var sex         = $.trim($('input[name="sex"]:checked').val());
        var phone       = $.trim($('#phone').val());
        var bday        = $.trim($('#bday').val());
        var email       = $.trim($('#email').val());
        var address     = $.trim($('#address').val());
        var password    = $.trim($('#password').val());

        if (isExistsEmail(email) ==1) {
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

function InvalidMsg(textbox) {
    if (textbox.value != $.trim($('#password').val())) {
        textbox.setCustomValidity('Mật khẩu không trùng khớp');
    }
    else {
        textbox.setCustomValidity('');
    }
    return true;
}

function isEmail(emailStr)
    {
        var emailPat=/^(.+)@(.+)$/
        var specialChars="\\(\\)<>@,;:\\\\\\\"\\.\\[\\]"
        var validChars="\[^\\s" + specialChars + "\]"
        var quotedUser="(\"[^\"]*\")"
        var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/
        var atom=validChars + '+'
        var word="(" + atom + "|" + quotedUser + ")"
        var userPat=new RegExp("^" + word + "(\\." + word + ")*$")
        var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$")
        var matchArray=emailStr.match(emailPat)
        if (matchArray==null) {
                return false
        }
        var user=matchArray[1]
        var domain=matchArray[2]
 
        // See if "user" is valid
        if (user.match(userPat)==null) {
            return false
        }
        var IPArray=domain.match(ipDomainPat)
        if (IPArray!=null) {
            // this is an IP address
                  for (var i=1;i<=4;i++) {
                    if (IPArray[i]>255) {
                        return false
                    }
            }
            return true
        }
        var domainArray=domain.match(domainPat)
        if (domainArray==null) {
            return false
        }
 
        var atomPat=new RegExp(atom,"g")
        var domArr=domain.match(atomPat)
        var len=domArr.length
 
        if (domArr[domArr.length-1].length<2 ||
            domArr[domArr.length-1].length>3) {
           return false
        }
 
        if (len<2)
        {
           return false
        }
 
        return true;
    }