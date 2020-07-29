$(document).ready(function () {
    $(document).on('submit', '#form_Muon', function () {
        $.ajax({
            async: false,
            url: "./api/apiMuonthietbi.php",
            method: "POST",
            data: {
                idThietbi: $('#thietbi option:selected').val(),
                reason: $('#inpReason').val(),
                soluong: $('#inpSoluong').val(),
            },
            success: function (data) {
                if (data == true) {
                    alert("Mượn thiết bị thành công");
                }
                else {
                    alert("Mượn thiết bị thất bại");
                }
            }
        })
    });
});

