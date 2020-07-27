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