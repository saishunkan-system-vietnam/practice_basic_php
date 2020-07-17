function resetForm() {
    document.getElementById("fullName").style.background = "white";
    document.getElementById("userName").style.background = "white";
    document.getElementById("passWorrd").style.background = "white";
    document.getElementById("passWorrd2").style.background = "white";
    document.getElementById("errFnlb").innerHTML = "";
    document.getElementById("errUnlb").innerHTML = "";
    document.getElementById("errPwlb1").innerHTML = "";
    document.getElementById("errPwlb2").innerHTML = "";
    document.getElementById("errXacNhan").innerHTML = "";
  }

function validateForm() {
    var fullName = document.getElementById("fullName").value;
    var userName = document.getElementById("userName").value;
    var passWord = document.getElementById("passWorrd").value;
    var passWord2 = document.getElementById("passWorrd2").value;
    var check = document.getElementById("xacnhan_dieukhoan");
    // var fname = document.getElementById("fnlb").innerHTML;
    if (fullName == "" ) {
        document.getElementById("errFnlb").innerHTML = "Mời nhập FullName";
        document.getElementById("fullName").style.background = "red";
    }
    if ( userName == "") {
        document.getElementById("errUnlb").innerHTML = "Mời nhập username";
        document.getElementById("userName").style.background = "red";
    }
    if ( passWord == "") {
        document.getElementById("errPwlb1").innerHTML = "Mời nhập Password";
        document.getElementById("passWorrd").style.background = "red";
    }
    if ( passWord2 == "") {
        document.getElementById("errPwlb2").innerHTML = "Mời xác nhận mật khẩu";
        document.getElementById("passWorrd2").style.background = "red";
    } 
    if ( passWord2 != passWord ) {
        document.getElementById("errPwlb2").innerHTML = "Mật khẩu không khớp. Mời nhập lại";
        document.getElementById("passWorrd2").style.background = "red";
        
    }
    if(check.checked == false)
    {
        document.getElementById("errXacNhan").innerHTML = "Hãy đồng ý điều khoản";
        document.getElementById("xacnhan_dieukhoan").style.border = "3px red solid" ;
        check.focus();
        return false;
    }

}

function resetError(id) {
    document.getElementById(id).innerHTML = "";
    document.getElementById("fullName").style.background = "white";
    document.getElementById("userName").style.background = "white";
    document.getElementById("passWorrd").style.background = "white";
    document.getElementById("passWorrd2").style.background = "white";

}

