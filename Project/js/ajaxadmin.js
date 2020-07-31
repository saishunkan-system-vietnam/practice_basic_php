$(document).ready(function () {
    $(document).on('submit', '#form_add_device', function () {
        $.ajax({
            async: false,
            url: "../api/apiqlthietbi.php",
            method: "POST",
            data: {
                name: "insert",
                devicename: $('#inpdevice').val(),
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
        })
    });
});

