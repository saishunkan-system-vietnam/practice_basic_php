 $(document).ready(function() {
    $(".btncart").on('click',function(){

        if (isLogin == 0) {
            document.getElementById('login').style.display='block';
        }
        else{
            var productId    = $.trim($('#productId').val());
            var productName  = $.trim($('#productName').val());
            var productPrice = $.trim($('#productPrice').val());
            $.ajax({
                url: "./register.php",
                method: "POST",
                data: {
                    productId,
                    productName,
                    productPrice
                },
                success: function (data) {
                    console.log(data);
                    if (data) {
                        document.getElementById('regist').style.display = 'none';
                        alert("Bạn đã đăng kí thành công")
                    }
                    else {
                        alert("Bạn chưa đăng kí thành công!!!!!")
                    }
                }
            });
        }
        
    });
});