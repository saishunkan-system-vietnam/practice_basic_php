
function validateForm()
{
    if(document.forms["formRegist"]["chkConfrm"].checked == true)
    {
        Check() == 1 ? alert('Thông tin đăng ký chưa đầy đủ - Vui lòng kiểm tra lại') : document.forms["formRegist"]["btnRegist"].disabled = false;
    }
    else
    {
        document.forms["formRegist"]["btnRegist"].disabled = true;
    }
}

function Check()
{
    var result = 0;
    
        document.forms["formRegist"]["btnRegist"].disabled = false;
        var opjectRow;
        for(var i = 1; i<11; i++)
        {
            opjectRow = document.forms["formRegist"]["row"+i];
            if(opjectRow.value == "")
            {
                console.log("row"+i);
                document.getElementById("chkConfrm").checked = false;
                opjectRow.style.backgroundColor = "red";
                document.forms["formRegist"]["btnRegist"].disabled = true;
                result = 1 ;
            }
        }

    return result;
}

function validateObject(opject)
{
    if(document.forms["formRegist"]["chkConfrm"].checked == true)
    {
        if(opject.value == "")
        {
            document.getElementById("chkConfrm").checked = false;
            document.forms["formRegist"]["btnRegist"].disabled = true;
        }
    }
}

function Regist()
{
    checkPass() == false ? errPassConfrm() : (CheckValidateEmailOrPhone() == 1 ? alert('Thông tin nhập vào không chính xác - Vui lòng kiểm tra lại'): document.getElementById('formRegist').submit());
}

function SetWhenExistAccount()
{
    let dulieu = JSON.parse(document.getElementById('inputHidden').value);;
    console.log(dulieu);
    for(var i = 2; i <10; i++)
    {
        document.forms["formRegist"]["row" + i].value = dulieu["row" + i];
    }
}
function checkPass()
{
   var pass = document.getElementById("txtPass").value ;
   var passConfrm = document.getElementById("txtPassConfrm").value ;
   return pass != passConfrm ? false : true;
}

function errPassConfrm()
{
    alert ('Mật khẩu xác nhận không chính xác - Vui lòng kiểm tra lại');
    document.getElementById("txtPassConfrm").focus();
    document.getElementById("txtPassConfrm").style.backgroundColor = "red";
}

function clearErrColor(opject)
{
    if(opject.value != "" && opject.style.backgroundColor == "red")
        opject.style.backgroundColor = "white"
}

function CheckValidateEmailOrPhone()
{
    var result = 0;
    var pattern = /@.*?(.*\.)/gm;
    var opject = document.getElementById("txtEmail");
    
    if( pattern.test(opject.value) == false )
    {
        opject.style.backgroundColor = "red";
        result = 1;
    }

    pattern = /((09|03|07|08|05)+([0-9]{8})\b)/g;
    opject = document.getElementById("txtPhone");

    if( pattern.test(opject.value) == false )
    {
        opject.style.backgroundColor = "red";
        result = 1;
    }

    return  result;
}

function preview(obj)
{
	if (FileReader)
	{
		var reader = new FileReader();
		reader.readAsDataURL(obj.files[0]);
		reader.onload = function (e) {
		var image=new Image();
		image.src=e.target.result;
		image.onload = function () {
			document.getElementById("imgAvatar").src=image.src;
		};
		}
	}
}
function GetPage(page)
{
document.getElementById("bodyPage").src = page;
}