$(document).ready(function() {
    var data = {
        id      : '',           
        page    : 1 ,          
        name    : "search"
    };
    search();

    // Khi nhập dữ liệu thì gọi ajax
    // $('#inpSearchProduct').keyup(function(){   
    //     data.ordername = $(this).val();
    //     search();
    // });

    $(document).on('click', '#btnSearchOrder', function() {
        data.id = $.trim($("#inpSearchOrder").val());
        search();
    });

    $('#order_listorder').on('click', 'a', function (){
        data.page = $(this).attr('title');
        search();
        window.scrollTo(0, 0);  
        return false;
     });

    function search()
    {
        $.ajax({
            url : './getDataOrder.php',
            data : data,
            type : 'get',
            dataType : 'json',
            success : function (result)
            {
                var 
                html = '<table class="table tableListOrder">';
                    html += '<tr>';
                    html += '<th>Id</th>';
                    html += '<th>Recipient</th>';
                    html += '<th>Phone</th>';
                    html += '<th>Address</th>';
                    html += '<th>Payments</th>';
                    html += '<th>Status</th>';
                    html += '<th>Create Datetime</th>';
                    html += '<th>Del_Flg</th>';
                    html += '<th>Edit</th>';
                    html += '<th>Delete</th>';
                html += '</tr>';

                if (result.status == 'success')
                {
                        $.each(result.data, function (index, item){
                            item.del_flg =(item.del_flg == 0)?"Off":"On";
                            switch (item.status) {
                                case "0":
                                    item.status = "Chờ xử lý";
                                    break;
                                case "1":
                                    item.status = "Đã tiếp nhận";
                                    break;
                                case "2":
                                    item.status = "Đang gửi";
                                    break;
                                case "3":
                                    item.status = "Đã nhận";
                                    break;
                                case "4":
                                    item.status = "Cancel";
                                    break;
                                };
                            html += '<tr>';
                            html += '<td>'+item.id+'</td>';
                            html += '<td>'+item.recipient+'</td>';
                            html += '<td>'+item.phone+'</td>';
                            html += '<td>'+item.address+'</td>';
                            html += '<td>'+item.payments+'</td>';
                            html += '<td>'+item.status+'</td>';
                            html += '<td>'+item.create_datetime+'</td>';
                            html += '<td>'+item.del_flg+'</td>';
                            html += '<td><input type="button" class="btnEdit btn" data-id="'+item.id+'" value="Edit"></input> </td>';
                            html += '<td><input type="button" class="btnDelete btn" data-id="'+item.id+'" value="Delete"></input></td>';
                            html += '</tr>';
                        });

                }else{
                    html += '<tr><td colspan="10" align="center">Không có sản phẩm nào trong đơn hàng!</td></tr>';
                }
                html += '</table>';
                html += result.paging;
                html += '<div class="clear-both"></div>';  
                $('#order_listorder').html(html);
            }
        });
    }

    $('#order_listorder').on('click', '.btnDelete', function() {
        var result = confirm("Bạn có chắc muốn xóa hóa đơn này?");
        if(result){
            var orderId = $(this).attr('data-id');
            $.ajax({
                url: "./delOrder.php",
                method: "POST",
                data: {orderId: orderId , name:"deleteOrder"},
                dataType: 'JSON',
                success: function(data) {
                    if (data.status == 'success') {
                        search();
                        alert("Bạn đã xóa thành công");
                    } else {
                        alert("Xảy ra lỗi vui lòng kiểm tra lại");
                    }
                }
            });
        }          
    }) 

    $('#order_listproduct').on('click', '.btnDelete', function() {
        var result = confirm("Bạn có chắc muốn xóa sản phẩm này?");
        if(result){
            var id = $(this).attr('data-id');
            var orderId = $(this).attr('order-id');
            $.ajax({
                url: "./delOrder.php",
                method: "POST",
                data: {id: id ,orderId: orderId, name:"deleteProduct"},
                dataType: 'JSON',
                success: function(data) {
                    if (data.status == 'success') {
                        getDataProductOfOrder(orderId);
                        getDataOrderDetail(orderId);
                        alert("Bạn đã xóa thành công");
                    } else {
                        alert("Xảy ra lỗi vui lòng kiểm tra lại");
                    }
                }
            });
        }          
    }) 

    $(document).on('click', '.btnEdit', function() {
            var id = $(this).attr('data-id');
            getDataProductOfOrder(id); 
            getDataOrderDetail(id);        
    }) 

    function getDataProductOfOrder(id) {
        $.ajax({
            url: "./getDataOrder.php",
            method: "POST",
            data: {id:id , name: "product"},
            dataType: 'JSON',
            success: function(result) {
                var total =0;
                var 
                    html = '<h2>Chi tiết đơn hàng '+result.id+'</h2>';
                    html += '<table class="table tableProduct">';
                        html += '<tr>';
                            html += '<th width="40%">Tên sản phẩm</th>';
                            html += '<th width="6%">Số lượng</th>';
                            html += '<th width="20%">Giá bán</th>';
                            html += '<th width="15%">Thành tiền</th>';
                            html += '<th width="5%">Action</th>';
                        html += '</tr>';
                if (result.status == 'success') {    
                    $.each(result.data, function (index, item){
                        total = total + (item.quantity * item.price);
                        html += '<tr>';
                            html += '<td>'+item.name+'</td>';
                            html += '<td>'+item.quantity+'</td>';
                            html += '<td>'+item.price+'</td>';
                            html += '<td>'+item.quantity * item.price+'</td>';
                            html += '<td><input type="button" class="btnDelete btn" data-id="'+item.id+'" order-id="'+result.id+'" value="Delete"></input></td>';
                        html += '</tr>';
                                
                    });
                    html += '<tr>';
                        html += '<td colspan="3" align="right">Tổng tiền</td>';
                        html += '<td colspan="2" align="right">'+total+'</td>';
                    html += '</tr>';
                } else {
                    html += '<tr><td colspan="5" align="center">Không có sản phẩm nào trong đơn hàng!</td></tr>';
                }
                html += '</table>'; 
                $('#order_listproduct').html(html);
            }
        });      
    }

    function getDataOrderDetail(id) {
        $.ajax({
            url: "./getDataOrder.php",
            method: "POST",
            data: {id:id , name: "order"},
            dataType: 'JSON',
            success: function(result) {
                var 
                    html = '<h2>Thông tin người nhận hàng</h2>';
                
                if (result.status == 'success') {    
                    $.each(result.data, function (index, item){
                    var status0 =(item.status == 0) ? "selected": "";
                    var status1 =(item.status == 1) ? "selected": "";
                    var status2 =(item.status == 2) ? "selected": "";
                    var status3 =(item.status == 3) ? "selected": "";
                    var status4 =(item.status == 4) ? "selected": "";
                        html += '<div class="wrap-field">';
                            html += '<input type="hidden" id="order-id" value="'+item.id+'"></input>';
                            html += '<label>Trạng thái: </label>';
                            html += '<select name="stasus" id="order-status">';
                                html += '<option value="0"  '+ status0 +'>Chờ xủ lý</option>';
                                html += '<option value="1" '+ status1 +'>Đã tiếp nhận</option>';
                                html += '<option value="2" '+ status2 +'>Đang gửi</option>';
                                html += '<option value="3" '+ status3 +'>Đã nhận</option>';
                                html += '<option value="4" '+ status4 +'>Cancel</option>';
                            html += '</select>';
                            html += '<div class="clear-both"></div>';
                        html += '</div>';
                        html += '<div class="wrap-field">';
                            html += '<label>Người nhân: </label>';
                            html += '<input type="text" name="recipient" id="order-recipient" value="'+item.recipient+'" required />';
                            html += '<div class="clear-both"></div>';
                        html += '</div>';
                        html += '<div class="wrap-field">';
                            html += '<label>Số điện thoại: </label>';
                            html += '<input type="text" name="phone" id="order-phone" value="'+item.phone+'" required  pattern="<?= PATTERN_PHONE ?>" />';
                            html += '<div class="clear-both"></div>';
                        html += '</div>';
                        html += '<div class="wrap-field">';
                            html += '<label>Địa chỉ: </label>';
                            html += '<input type="text" name="address" id="order-address" value="'+item.address+'" required />';
                            html += '<div class="clear-both"></div>';
                        html += '</div>';
                        html += '<div class="wrap-field">';
                            html += '<label>Ghi chú: </label>';
                            html += '<textarea name="note" id="order-note" cols="70" rows="7">'+item.note+'</textarea>';
                            html += '<div class="clear-both"></div>';
                        html += '</div>';
                        html += '<div>';
                            html += '<input type="submit" class="btnOder btn" name="btnOder" value="Update" />';
                        html += '</div>';
                                
                    });
                $('#order_orderDetail').html(html);
                }
            }
        });      
    }

    $('#order_orderDetail').on('click', '.btnOder', function() {
        var id          = $.trim($('#order-id').val());
        var status      = $.trim($('#order-status').val());
        var recipient   = $.trim($('#order-recipient').val());
        var phone       = $.trim($('#order-phone').val());
        var address     = $.trim($('#order-address').val());
        var note        = $.trim($('#order-note').val());
            $.ajax({
                url: "./getDataOrder.php",
                method: "POST",
                data: {
                    id              : id,
                    status          : status,
                    recipient       : recipient , 
                    phone           : phone , 
                    address         : address , 
                    note            : note , 
                    name            :"updOrder"},
                dataType: 'JSON',
                success: function(data) {
                    if (data.status == 'success') {
                        search();
                        alert("Update đơn hàng thành công");
                    } else {
                        alert("Xảy ra lỗi vui lòng kiểm tra lại");
                    }
                }
            });              
    }) 
});