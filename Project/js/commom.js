$(document).keydown(function (event) {
    if (event.keyCode == 27) {
        $("#modal-wrapper").css("display", "none");
        $("body").css("overflow", "auto");
        $("#modal-wrapper").find('form').trigger('reset');
        if ($('#inpinfo').length != 0) {
            CKEDITOR.instances['inpinfo'].setData('');
        }
    }
});

$(".btn").click(function () {

    if ($(this).attr("name") == 'Close') {
        $("#modal-wrapper").css("display", "none");
        $("body").css("overflow", "auto");
        $("#modal-wrapper").find('form').trigger('reset');
        if ($('#inpinfo').length != 0) {
            CKEDITOR.instances['inpinfo'].setData('');
        }
    }

    if ($(this).attr("name") == 'btnAdd') {
        $("#modal-wrapper").css("display", "block");
        $("body").css("overflow", "hidden");
        $(".title_popup").text("Add thiết bị");
        $(".display_img img").attr("src", "../img/img_null.jpg");
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
                    if (item.img != '') {
                        $(".display_img img").attr("src", "../img/" + item.img);
                    } else {
                        $(".display_img img").attr("src", "../img/img_null.jpg");
                    }
                    CKEDITOR.instances['inpinfo'].setData(item.info);
                });
            }
        })
    }

    if ($(this).attr("name") == 'btnDel') {
        if (confirm('Are you sure you want to delete this item?')) {
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
        var sessName = $(this).attr("data-sess");
        if (sessName != '') {
            $("#modal-wrapper").css("display", "block");
            $("body").css("overflow", "hidden");

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
                        $('#device').css('pointer-events', 'none');

                    });
                }
            })
        }
        else {
            var flg = confirm("Bạn sẽ được chuyển tới trang đăng nhập để được sử dụng chức năng này!!");
            if (flg == true) {
                window.location.href = "./dangnhap.php";
            } else {
                location.reload(true);
            }
        }
    }

    if ($(this).attr("name") == 'btnDetail') {
        var device_id = $(this).attr("data-id");
        window.location.href = "./detail.php?id=" + device_id;
    }
});

function preview() {
    var pathimg = $('#inpimg')[0].files[0]['name'];
    $(".display_img img").attr("src", "../img/" + pathimg);
}

$('.checkbox').click(function () {
    $.ajax({
        url: "../api/apiqlaccount.php",
        method: "POST",
        data: {
            name: "upd_admin",
            admin_flg: $(this).is(':checked'),
            id_account: $(this).attr("data-id")
        },
    })
    if ($(this).is(':checked')) {
        alert("Tài khoản " + $(this).attr("data-name") + " đã được cấp quyền Admin!");
    } else {
        alert("Tài khoản " + $(this).attr("data-name") + " đã bị hủy quyền Admin!");
    }
});


$(".btn_admin").click(function () {

    if ($(this).attr("name") == 'btnAdd') {
        $("#modal-wrapper").css("display", "block");
        $("body").css("overflow", "hidden");
        $(".title_popup").text("Đăng ký tài khoản");
        $(".display_img img").attr("src", "../img/img_null.jpg");
    }

    if ($(this).attr("name") == 'btnEdit') {
        $("#modal-wrapper").css("display", "block");
        $("body").css("overflow", "hidden");
        $(".title_popup").text("Edit tài khoản");

        $.ajax({
            url: "../api/apiqlaccount.php",
            method: "POST",
            data: {
                name: "select",
                id_account: $(this).attr("data-id")
            },

            success: function (data) {
                data.forEach(function (item) {
                    $('#deviceId').text(item.id);
                    $('#inpUser').val(item.user_name);
                    $('#inpPass').val(item.password);
                    $('#inpEmail').text(item.email);
                    $('#inpaddress').val(item.address);
                    if (item.img != '') {
                        $(".display_img img").attr("src", "../img/" + item.avatar);
                    } else {
                        $(".display_img img").attr("src", "../img/img_null.jpg");
                    }
                });
            }
        })
    }


    if ($(this).attr("name") == 'btnDel') {
        if (confirm('Are you sure you want to delete this item?')) {
            $.ajax({
                url: "../api/apiqlaccount.php",
                method: "POST",
                data: {
                    name: "delete",
                    id_account: $(this).attr("data-id")
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
});
