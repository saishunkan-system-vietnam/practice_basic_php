$(document).ready(function(){
    outputData();
    
    function outputData(){
        $.ajax({
            url: "output.php",
            success:function(data){
                $('tbody').html(data);               
            }
        });
    }
    $('#api_form').on('submit', function(event) {
        event.preventDefault();
        var result = true;
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
        if ($('#uname').val() == '') {
            document.getElementById("labelUName").innerHTML ="* Xin vui lòng nhập họ tên";
            result = false;
        } 

        if ($('#bday').val() == '') {
            document.getElementById("labelBDay").innerHTML ="* Xin vui lòng nhập ngày sinh";
            result = false;
        }
        if($('#mail').val() == ''){
            document.getElementById("labelMail").innerHTML ="* Xin vui lòng nhập mail";
            result = false;
        }
        else if(!filter.test($('#mail').val())){
            document.getElementById("labelMail").innerHTML ="* Định dạng mail không chính xác";
            result = false;
        }

        if(!document.getElementById("confirm").checked){
            document.getElementById("labelConfirm").innerHTML ="* Bạn chưa xác nhận thông tin";
            result = false;
        }

        if(1 > $('#skill').val() || $('#skill').val() > 30){
            document.getElementById("labelskill").innerHTML ="* Số năm kinh nghiệm chưa chính xác";
            result = false;
        }
        if(result){
            var formData = $(this).serialize();
            $.ajax({
                url: "controller.php",
                method: "POST",
                data: formData,
                success: function(data) {
                    outputData();
                    $('#api_form')[0].reset();
                    alert("All datas are valid!, send it to the server!");
                }
            });
        }
    });
    
});

function resetError(id){
    document.getElementById(id).innerHTML ="";

};

function validateLogin(){
    var username = document.getElementById("username").value;
    var passwordday = document.getElementById("password").value;

    if (username == "" || passwordday =="") {
        alert("Bạn chưa nhập tên đăng nhập hoặc mật khẩu");
        return false;
    } 
    return true;
};