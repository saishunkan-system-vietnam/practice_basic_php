$(document).ready(function () {
    $(document).on('submit', '#form_Muon', function () {
        $.ajax({
            async: false,
            url: "./api.php",
            method: "POST",
            data: {
                idThietbi: $('#thietbi option:selected').val(),
                reason: $('#inpReason').val(),
                soluong: $('#inpSoluong').val(),
            },
            success: function (data) {
                if (data) {
                    alert("Mượn thiết bị thành công");
                }
                else
                {
                    alert("Mượn thiết bị thất bại");
                }
            }
        })
    });
});