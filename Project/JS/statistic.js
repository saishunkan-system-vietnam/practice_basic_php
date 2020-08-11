$(document).ready(function() {

    $.ajax({
        url : './statistic.php',
        type : 'get',
        dataType : 'json',
        success : function (result){
            var 
            html = '<div class="card">';
                html += '<h1>Tổng số đơn</h1>';
                html += '<p class="number">'+result.totalOrder+'</p>';
                html += '<p>Hóa đơn đặt hàng</p>';
            html += '</div>';
            html += '<div class="card">';
                html += '<h1>Số đơn chờ xử lý</h1>';
                html += '<p class="number">'+result.orderNotProcessed+'</p>';
                html += '<p>Hóa đơn đang chờ bạn xử lý</p>';
            html += '</div>';
            html += '<div class="card">';
                html += '<h1>Số đơn đã hủy</h1>';
                html += '<p class="number">'+result.orderCancel+'</p>';
                html += '<p>Hóa đơn đã hủy</p>';
            html += '</div> ';
            html += '<div class="card">';
                html += '<h1>Tổng tiền</h1>';
                html += '<p class="number">'+result.totalPayments+'</p>';
                html += '<p>Tổng số tiền trong các hóa đơn</p>';
            html += '</div>';

            $('#statistic').html(html);
        }
    });
});