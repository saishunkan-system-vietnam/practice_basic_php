$(document).ready(function () {
    $(document).on('submit', '#form_device', function () {
        if ($(".title_popup").text() == "Add thiết bị") {
            $.ajax({
                async: false,
                url: "../api/apiqlthietbi.php",
                method: "POST",
                data: {
                    name: 'insert',
                    devicename: $('#inp_devicename').val(),
                    idcategory: $('#category option:selected').val(),
                    idsupplier: $('#supplier option:selected').val(),
                    inpimg: $('#image').val(),
                    info: CKEDITOR.instances['inpinfo'].getData(),
                },
                success: function (data) {
                    if (data == true) {
                        alert("Thêm thiết bị thành công");
                    }
                    else {
                        alert("Thêm thiết bị thất bại");
                    }
                }
            });
        }

        if ($(".title_popup").text() == "Edit thiết bị") {
           
            $.ajax({
                async: false,
                url: "../api/apiqlthietbi.php",
                method: "POST",
                data: {
                    name: 'update',
                    deviceId: $('#deviceId').text(),
                    devicename: $('#inp_devicename').val(),
                    idcategory: $('#category option:selected').val(),
                    idsupplier: $('#supplier option:selected').val(),
                    inpimg: $('#image').val(),
                    info: CKEDITOR.instances['inpinfo'].getData(),
                },
                success: function (data) {
                    if (data == true) {
                        alert("Update thiết bị thành công");
                    }
                    else {
                        alert("Update thiết bị thất bại");
                    }
                }
            });
        }
    });

    $(document).on('submit', '#form_account', function () {
        if ($(".title_popup").text() == "Đăng ký tài khoản") {
            $.ajax({
                async: false,
                url: "../api/apiqlaccount.php",
                method: "POST",
                data: {
                    name: 'insert',
                    user_name: $('#inpUser').val(),
                    pass: $('#inpPass').val(),
                    email: $('#inpEmail').val(),
                    address: $('#inpaddress').val(),
                    inpimg: $('#image').val(),
                },
                success: function (data) {
                    if (data == true) {
                        alert("Thêm tài khoản thành công");
                    }
                    else {
                        alert("Thêm tài khoản thất bại");
                    }
                }
            });
        }

        if ($(".title_popup").text() == "Edit tài khoản") {

            $.ajax({
                async: false,
                url: "../api/apiqlaccount.php",
                method: "POST",
                data: {
                    name: 'update',
                    id_account: $('#id_account').text(),
                    pass: $('#inpPass').val(),
                    address: $('#inpaddress').val(),
                    inpimg: $('#image').val(),
                },
                success: function (data) {
                    if (data == true) {
                        alert("Edit tài khoản thành công");
                    }
                    else {
                        alert("Edit tài khoản thất bại");
                    }
                }
            });
        }

    });

});

function InvalidMsg(textbox) {
    if (textbox.value != $.trim($('#inpPass').val())) {
        textbox.setCustomValidity('Mật khẩu không trùng khớp');
    }
    else {
        textbox.setCustomValidity('');
    }
    return true;
}

function checkUsername() {
    $.ajax({
        async: false,
        url: "../api/apiqlaccount.php",
        method: "POST",
        data: {
            name: 'check',
            user_name: $('#inpUser').val(),

        },
        success: function (data) {
            if (data == true) {
                $("#inpUser")[0].setCustomValidity("User name đã tồn tại");
            }
            else {
                $("#inpUser")[0].setCustomValidity("");
            }
        }
    });

}

function checkEmail() {
    $.ajax({
        async: false,
        url: "../api/apiqlaccount.php",
        method: "POST",
        data: {
            name: 'check',
            email: $('#inpEmail').val(),

        },
        success: function (data) {
            if (data == true) {
                $("#inpEmail")[0].setCustomValidity("Email đã tồn tại");
            }
            else {
                $("#inpEmail")[0].setCustomValidity("");
            }
        }
    });

}