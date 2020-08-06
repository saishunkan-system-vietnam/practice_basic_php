$(document).ready(function() {
    search();


    function search(){
        $.ajax({
            url: "./listProduct.php",
            method: "GET",
            data: { page : page, content : content, name: "add"
             },
            success: function(data) {
                $('tbody').html(data);
            }
        });
    }
    
    $(document).on('click', '.btnSearch', function() {    
        var cnt = ""       
                if($.trim($(".inpSearch").val()) != "")
                {
                    cnt = "&content=" + $.trim($(".inpSearch").val());
                }
                let newhref = "./order_editing.php?page=" + 1 + cnt;
                window.location.href = newhref;
            });
    
            $('#pagination').on('click', 'a', function(e) { 
                e.preventDefault();
               
                let cnt = "";
                if(content != "")
                {
                    cnt = "&content=" + content;
                }

                let href ='./order_editing.php' + $(this).attr("href");
            
                let newhref = href + cnt;
                window.location.href = newhref;
            });


    $(document).on('click', '.btnDelete', function() {
        var result = confirm("Bạn có chắc muốn xóa tài khoản này?");
        if(result){
            var id = $(this).attr('data-id');
            $.ajax({
                url: "./delOrder.php",
                method: "POST",
                data: {id},
                dataType: 'JSON',
                success: function(data) {
                    if (data.status == 'success') {
                        location.reload(true);
                        alert("Bạn đã xóa thành công");
                    } else {
                        alert("Xảy ra lỗi vui lòng kiểm tra lại");
                    }
                }
            });
        }          
    }) 
});