// Xóa thông báo lỗi
function ClearError(id) {
  document.getElementById(id).style.borderColor = "#ddd";
}

$(document).ready(function () {
  // Clcik button login
  $("#btnlogin").on("click", function () {
    // Validate dữ liệu
    if (IsValid()) {
      var email = $("#email").val();
      var password = $("#password").val();
      var remember = $("#remember").is(":checked") == true ? 1 : 0;

      // Ajax check login
      $.ajax({
        async: false,
        url: "login_check.php",
        method: "post",
        data: {
          email: email,
          password: password,
          remember: remember,
        },
        success: function (response) {

          // Trường hợp thành công thì chuyển đến trang chủ
          if (response == 1) {
            window.location = "index.php";
          } 
          // Trường hợp thất bại thì thông báo lỗi
          else {
            $("#error_message").text(response);
            alert(response);
          }
        },
      });
    }
  });

  // Hàm validate
  function IsValid() {
    var email = $.trim($("#email").val());
    var password = $.trim($("#password").val());

    // Trường hợp email rỗng
    if (email == "") {

      // Hiển thị thông báo
      $("#email").css("borderColor", "red");
      alert("Vui lòng nhập Email");

      return false;
    }

    // Trường hợp định dạng email không hợp lệ thì hiển thị thông báo
    var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!pattern.test(email)) {
      $("#email").css("borderColor", "red");
      alert("Định dạng Email không hợp lệ!");

      return false;
    }

    // Trường hợp password rỗng thì hiển thị thông báo
    if (password == "") {
      alert("Vui lòng nhập Password");
      $("#password").css("borderColor", "red");

      return false;
    }
    
    return true;
  }
});
