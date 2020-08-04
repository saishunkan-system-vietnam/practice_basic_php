$(document).ready(function() {
    search();

    function search(){
        $.ajax({
            url: "./listProduct.php",
            method: "GET",
            data: { page : page, content : content
             },
            success: function(data) {
                console.log(data);
                $('tbody').html(data);
            }
        });
    }
    
    $(document).on('click', '#btnSearch', function() {           
               var cnt = "";
                if($.trim($("#inpSearch").val()) != "")
                {
                    cnt = "&content=" + $.trim($("#inpSearch").val());
                }
                var newhref = "./ad_Product.php?page=" + 1 + cnt;
                window.location.href = newhref;
            })
});