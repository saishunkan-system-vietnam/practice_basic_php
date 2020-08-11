$(document).ready(function()
{
    var data = {
        productname : '', 
        page : 1 
    };
    search();
     
    // Khi nhập dữ liệu thì gọi ajax
    // $('#inpSearchProduct').keyup(function(){   
    //     data.productname = $(this).val();
    //     search();
    // });

    $(document).on('click', '#btnSearchProduct', function() {
        data.productname = $.trim($("#inpSearchProduct").val());
        search();
    });
     
    $('#listProct_search').on('click', 'a', function (){
       data.page = $(this).attr('title');
       search();
       return false;
    });

    function search()
    {
        $.ajax({
            url : './getProduct.php',
            data : data,
            type : 'get',
            dataType : 'json',
            success : function (result)
            {
                if (result.hasOwnProperty('data') && result.hasOwnProperty('paging'))
                {
                    var 
                        html = '<li class="listing-item-heading">';
                        html += '<div class="listing-prop listing-name">Tên sản phẩm</div>';
                        html += '<div class="listing-prop listing-image">Ảnh</div>';
                        html += '<div class="listing-prop listing-quantity">Số lượng</div>';
                        html += '<div class="listing-prop listing-price">Giá</div>';
                        html += '<div class="listing-prop listing-button">Action</div>';
                        html += '<div class="clear-both"></div>';
                        html += '</li>';
                          
                        $.each(result['data'], function (index, item){
                            html += '<form action="" method="POST">';
                            html += '<li>';
                            html += '<div class="listing-prop listing-name">'+item.name+'</div>';
                            html += '<div class="listing-prop listing-image"><img style="width: 150px; height: 150px;" src="'+item.image+'"></div>';
                            html += '<div class="listing-prop listing-quantity"><input type="number" name="quantity" value="1" min="1"  style="width: 50px; height: 30px; margin-top: 20px;"></div>';
                            html += '<div class="listing-prop listing-price">'+item.price+'</div>';
                            html += '<div class="listing-prop listing-button"><button type="submit" name="btnAddProduct" class="btnAddProduct btn"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</button></div>';
                            html += '<input type="hidden" name="productId" value="'+item.id+'">';
                            html += '<input type="hidden" name="productName" value="'+item.name+'">';
                            html += '<input type="hidden" name="productPrice" value="'+item.price+'">';
                            html += '<div class="clear-both"></div>';
                            html += '</li>';
                            html += '</form>';  
                            html += '<div class="clear-both"></div>';  
                        });
                    html += result['paging'];
                    html += '<div class="clear-both"></div>';  

                    $('#listProct_search').html(html);
                }
            }
        });
    }
});