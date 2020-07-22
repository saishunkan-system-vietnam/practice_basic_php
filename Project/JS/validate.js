$(document).ready(function()
{
    $('#form_register').submit(function(){
 
        // BƯỚC 1: Lấy dữ liệu từ form
        var fullname    = $.trim($('#fullname').val());
        var sex         = $.trim($('.sex:checked').val());
        var phone       = $.trim($('#phone').val());
        var bday        = $.trim($('#bday').val());
        var email       = $.trim($('#email').val());
        var address     = $.trim($('#address').val());
        var password    = $.trim($('#password').val());
        var re_password = $.trim($('#re_password').val());

 
        // BƯỚC 2: Validate dữ liệu
        // Biến cờ hiệu
        var flag = true;
 
        // Username
        if (name == '' || name.length < 4){
            $('#name_error').text('Tên đăng nhập phải lớn hơn 4 ký tự');
            flag = false;
        }
        else{
            $('#name_error').text('');
        }
 
        // Password
        if (password.length <= 0){
            $('#password_error').text('Bạn phải nhập mật khẩu');
            flag = false;
        }
        else{
            $('#password_error').text('');
        }
 
        // Re password
        if (password != re_password){
            $('#re_password_error').text('Mật khẩu nhập lại không đúng');
            flag = false;
        }
        else{
            $('#re_password_error').text('');
        }

        // Bday
        if (bday == '') {
            $('#bday_error').text('Bạn phải nhập ngày sinh');
            flag = false;
        }

        // Email
        if (!isEmail(email)){
            $('#email_error').text('Email không được để trống và phải đúng định dạng');
            flag = false;
        }

        // phone
        if(phone !==''){
            if (vnf_regex.test(phone) == false) 
            {
                $('#phone_error').text('Số điện thoại của bạn không đúng định dạng');
                flag = false;
            }
        }
        else{
            $('#phone_error').text('Bạn phải nhập số điện thoại');
                flag = false;
        }
       
        if (address == '') {
            $('#address_error').text('Bạn phải nhập đại chỉ');
            flag = false;
        }
 
        return flag;
    });

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
});