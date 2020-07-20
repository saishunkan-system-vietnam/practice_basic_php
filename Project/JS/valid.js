function validateForm()  {
    var name = document.getElementById("uname").value;
    var bday = document.getElementById("bday").value;
    var mail = document.getElementById("mail").value;
    var skill = document.getElementById("skill").value;
    const skillInt = parseInt(skill);
    var result = true;
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 


    if(name == "") {
        document.getElementById("labelUName").innerHTML ="* Xin vui lòng nhập họ tên";
        result = false;
    }
    else if(name.length< 4){
        document.getElementById("labelUName").innerHTML ="* Họ tên quá ngắn";
        result = false;
    }
    if(bday == "") {
        document.getElementById("labelBDay").innerHTML ="* Xin vui lòng nhập ngày sinh";
        result = false;
    }

    if(mail == ""){
        document.getElementById("labelMail").innerHTML ="* Xin vui lòng nhập mail";
        result = false;
    }
    else if(!filter.test(mail)){
        document.getElementById("labelMail").innerHTML ="* Định dạng mail không chính xác";
        result = false;
    }

    if(!document.getElementById("confirm").checked){
        document.getElementById("labelConfirm").innerHTML ="* Bạn chưa xác nhận thông tin";
        result = false;
    }
    
    if(1 > skillInt || skillInt > 30){
        document.getElementById("labelskill").innerHTML ="* Số năm kinh nghiệm chưa chính xác";
        result = false;
    }

    if(result){
        alert("All datas are valid!, send it to the server!");
    }
    return result;
}

function resetError(id){
    document.getElementById(id).innerHTML ="";

}

function validateLogin(){
    var username = document.getElementById("username").value;
    var passwordday = document.getElementById("password").value;

    if (username == "" || passwordday =="") {
        alert("Bạn chưa nhập tên đăng nhập hoặc mật khẩu");
        return false;
    } 
    return true;
}
