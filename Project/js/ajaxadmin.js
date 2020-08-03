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
                    inpimg: $('#inpimg').val(),
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
                    inpimg: $('#inpimg').val(),
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
});

