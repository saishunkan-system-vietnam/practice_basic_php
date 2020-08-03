function isExistsEmail(email){
    var isExists;
    $.ajax({
        async: false,
        url: "./isExistsEmail.php",
        method: "GET",
        data: {email},
        success: function (data) {
            isExists = data;
        }

    });
    return isExists
}

function checkLogin(){
    if (isLogin == 0) {
        document.getElementById('login').style.display = 'block';
        return false;
    }
    return true;
}