$(document).ready(function () {
    $(document).on('submit', '#form_Muon', function () {
        var b = $('#inp_intend').val();
        $.ajax({
            async: false,
            url: "./api/apiMuonthietbi.php",
            method: "POST",
            data: {
                name: 'insert',
                idThietbi: $('#device option:selected').val(),
                intend_date: $('#inp_intend').val(),
                reason: $('#inpReason').val(),
                soluong: $('#inpamount').val(),
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

