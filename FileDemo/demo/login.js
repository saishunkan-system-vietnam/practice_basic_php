var User = document.getElementById("txtUser");
var Pass = document.getElementById("txtPass");

function CheckValidate()
{
    var errResult = 0;
    if(User.value == "")
    {
        User.style.backgroundColor = "red";
        errResult = 1 ;
    }

    if(Pass.value == "")
    {
        Pass.style.backgroundColor = "red";
        errResult = 1 ;
    }
    return errResult;
}

function autoFillInfo(usr, pass)
{
    document.getElementById("txtUser").value = usr;
    document.getElementById("txtPass").value = pass;
}

function Login()
{
    var result = CheckValidate();
    console.log(result);
     result == 1
    ?  alert ("Vui lòng nhập đầy đủ thông tin đăng nhập"): document.getElementById("formLogin").submit();
}