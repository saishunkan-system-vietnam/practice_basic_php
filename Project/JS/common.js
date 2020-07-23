function isExistsEmail(email){
    $.ajax({
        async: false,
        url: "./isExistsEmail.php",
        method: "GET",
        data: {email},
        success: function (data) {
            return data;
        }
    });
}