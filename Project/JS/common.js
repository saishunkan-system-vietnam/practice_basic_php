function isExistsEmail(email){
    var isExists;
    $.ajax({
        async: false,
        url: "../isExistsEmail.php",
        method: "GET",
        data: {email},
        dataType: 'JSON',
        success: function (data) {
            if (data.status == 'exists') {
                isExists = true;
            } else {
                isExists = false;
            }
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

function openForm(id) {
    document.getElementById(id).style.display = "block";
  }
  
  function closeForm(id) {
    document.getElementById(id).style.display = "none";
  }