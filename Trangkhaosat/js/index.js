$(document).ready(function() {
    $.ajax({
        async: false,
        type: "post",
        url: "./lib/home_ajax.php",
        data: {
            uid: '',
        },
        success: function(data) {
            var element = "";
            data.forEach(function(item) {
                element = element + (
                    (item.row_num == '1' ?
                        '<div class="col">' +
                        '<div class="col-r1">' +
                        '<div class="title"><b>' + item.category + '</b></div>' :
                        "\n") +
                    ' <div class="detail">' +
                    ' <span class="date"> <i class="fa fa-clock-o" aria-hidden="true" style = "margin-right: 5px"></i>' + item.create_datetime + '</span>' +
                    ' <span class="text-nd-ksn">' + item.content + '</span>' +
                    '  <button name = "' + infoLogin + '" id = "' + item.id + '" class="btn-reply"> Trả lời ngay' +
                    '</button></div>' +
                    (item.row_num == '3' ?
                        ' </div></div></div>' : "\n"));
            });
            $("#content").append(element);
        }
    });
});