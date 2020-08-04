$(document).keydown(function (event) {
    if (event.keyCode == 27) {
        $("#modal-wrapper").css("display", "none");
        $("body").css("overflow", "auto");
        $("#modal-wrapper").find('form').trigger('reset');
    }
});

$(".btn").click(function () {

    if ($(this).attr("name") == 'Close') {
        $("#modal-wrapper").css("display", "none");
        $("body").css("overflow", "auto");
        $("#modal-wrapper").find('form').trigger('reset')
    }

    if ($(this).attr("name") == 'btnAdd') {
        $("#modal-wrapper").css("display", "block");
        $("body").css("overflow", "hidden");
        $(".title_popup").text("Add thiết bị");
    }

    if ($(this).attr("name") == 'btnEdit') {
        $("#modal-wrapper").css("display", "block");
        $("body").css("overflow", "hidden");
        $(".title_popup").text("Edit thiết bị");

        $.ajax({
            url: "../api/apiqlthietbi.php",
            method: "POST",
            data: {
                name: "select",
                id_device: $(this).attr("data-id")
            },
            success: function (data) {
                data.forEach(function (item) {
                    $('#deviceId').text(item.id);
                    $('#inp_devicename').val(item.device_name);
                    $('#opt_category').val(item.id_category);
                    $('#opt_category').text(item.category_name);
                    $('#opt_supplier').val(item.id_supplier);
                    $('#opt_supplier').text(item.supplier_name);
                    $('#inpimg').val(item.img);
                });
            }
        })
    }

    if ($(this).attr("name") == 'btnDel') {
        if (confirm('Are you sure you want to delete this item?')){
            $.ajax({
                url: "../api/apiqlthietbi.php",
                method: "POST",
                data: {
                    name: "delete",
                    id_device: $(this).attr("data-id")
                },
                success: function (data) {
                    if (data == true) {
                        alert("Delete thiết bị thành công");
                        location.reload(true);
                    }
                    else {
                        alert("Delete thiết bị thất bại");
                    }
                }
            })
        }
    }

    if ($(this).attr("name") == 'btnMuon') {
        $("#modal-wrapper").css("display", "block");
        $("body").css("overflow", "hidden");
        var a = $(this).attr("data-id");
        $.ajax({
            url: "../api/apiMuonthietbi.php",
            method: "POST",
            data: {
                name: "select",
                id_device: $(this).attr("data-id")
            },
            success: function (data) {
                data.forEach(function (item) {
                    $('#opt_device').val(item.id);
                    $('#opt_device').text(item.device_name);
                    // $('#thietbi').prop('disabled', 'disabled');
                });
            }
        })
    }
});