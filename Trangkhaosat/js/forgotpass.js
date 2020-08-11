$(document).ready(function() {
    
    $(document).ajaxStart(function(){
        $("#wait").css("display", "block");
      });
      $(document).ajaxComplete(function(){
        $("#wait").css("display", "none");
      });
      $("button").click(function(){
        $("#txt").load("demo_ajax_load.asp");
      });

    $(document).on("click", "#btn_run", function() {
        $("#kq_fg").css("display","none");
        $(".sp_fg").html(""); 
        $(".sp_fg").css("color","rgb(24, 103, 192)");
        $("#txt_email").css("border-bottom", "1.4px solid rgb(24, 103, 192)");

        if($.trim($("#txt_email").val()) == "")
        {
            $("#txt_email").css("border-bottom", "2px solid #F90A0A");
            $(".sp_fg").html("Vui lòng nhập emmail của bạn vào đây");
            $(".sp_fg").css("color","red");
            $("#kq_fg").css("display","block");
            return;
        }

        $.ajax({
            type: "post",
            url: "./lib/sendmail.php",
            data: {
                email: $.trim($("#txt_email").val()),
            },
            success: function(errCD) {
                if(errCD == 0)
                {
                    $("#txt_email").css("border-bottom", "2px solid #F90A0A");
                    $(".sp_fg").html("Email này chưa được sử dụng để đăng ký tài khoản - Vui lòng kiểm tra lại");
                    $(".sp_fg").css("color","red");
                }
                else
                {
                    $(".sp_fg").html("Chúng tôi đã gửi mail xác nhận đến email của bạn, vui lòng vào kiểm tra mail để thực hiện thay đổi mật khẩu - Lưu ý request này chi có hiệu lực 5 phút");
                }

                $("#kq_fg").css("display","block");
            }
        });
    });
});