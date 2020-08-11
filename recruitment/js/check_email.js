// Hàm xóa message lỗi
function ClearError(id) {
  document.getElementById(id).style.borderColor = "#ddd";
  var err = "error_" + id;
  document.getElementById(err).innerHTML = "";
}

$(document).ready(function () {
  // Click button send
  $("#btnsend").on("click", function () {
    // Validate email
    if (IsValid("email_page")) {
      // Ajax check email
      $.ajax({
        async: false,
        url: "check_email.php",
        method: "post",
        dateType: "text",
        data: {
          email: $("#email_check").val(),
        },
        success: function (response) {
          if (response == 1) {
            $("#email_check").val("");
            $("#error_email_check").text(
              "Email đã được gửi. Vui lòng kiểm tra hộp thư."
            );
            $("#error_email_check").css("color", "blue");
          } else {
            $("#error_email_check").text(
              "Email không tồn tại. Vui lòng kiểm tra lại email!"
            );
            $("#error_email_check").css("color", "red");
          }
        },
      });
    }
  });

  // Click button change để đổi mật khẩu
  $("#btnchange").on("click", function () {
    // Validate passwword
    if (IsValid("password_page")) {
      var url = new URLSearchParams(location.search);
      var email = url.get("email");
      var token = url.get("token");

      // Ajax lưu mật khẩu mới
      $.ajax({
        async: false,
        url: "insert_new_password.php",
        method: "post",
        dateType: "text",
        data: {
          email: email,
          password: $("#password").val(),
          token: token,
        },
        success: function (response) {
          // Nếu thành công
          if (response == 1) {
            $("#password").val("");
            $("#confirm_password").val("");
            $("#error_message").text("Đổi mật khẩu thành công.");
            $("#error_message").css("color", "blue");

            // Xác nhận chuyển đến trang login
            if (
              window.confirm(
                "Đổi mật khẩu thành công.Bạn có muốn chuyển đến trang login không ?"
              )
            ) {
              window.location = "login.php";
            }
          } // Nếu thất bại
          else {
            // Hiển thị và thông báo lỗi
            $("#error_message").text("Đã xảy ra lỗi. Không thể đổi mật khẩu!");
            $("#error_message").css("color", "blue");
            alert("lỗi" + response);
          }
        },
      });
    }
  });

  // Hàm validate dữ liệu
  function IsValid($form_id) {
    // Nếu là email_page
    if ($form_id == "email_page") {
      var email = $.trim($("#email_check").val());

      // Trường hợp email rỗng thì thông báo lỗi
      if (email == "") {
        $("#email_check").css("borderColor", "red");
        $("#error_email_check")
          .text("Vui lòng nhập tên email đăng nhập!")
          .css("color", "red");

        return false;
      }

      // Trường hợp định dạng email không hợp lệ thì thông báo lỗi
      var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      if (!pattern.test(email)) {
        $("#email_check").css("borderColor", "red");
        $("#error_email_check")
          .text("Định dạng Email không hợp lệ!")
          .css("color", "red");

        return false;
      }

      return true;
    }
    // Nếu là password_page
    else if ($form_id == "password_page") {
      var password = $.trim($("#password").val());
      var confirm_password = $.trim($("#confirm_password").val());
      var result = true;

      // Trường hợp password rỗng thì thông báo lỗi
      if (password == "") {
        $("#password").css("borderColor", "red");
        $("#error_password")
          .text("Vui lòng nhập password mới!")
          .css("color", "red");

        result = false;
      }

      // Trường hợp confirm_password rỗng thì thông báo lỗi
      if (confirm_password == "") {
        $("#confirm_password").css("borderColor", "red");
        $("#error_confirm_password")
          .text(" Vui lòng nhập lại mật khẩu xác nhận")
          .css("color", "red");

        result = false;
      }

      // Trường hợp password không khớp thì thông báo lỗi
      if (
        password != "" &&
        confirm_password != "" &&
        confirm_password != password
      ) {
        $("#confirm_password").css("borderColor", "red");
        $("#error_confirm_password")
          .text("Password không khớp. Vui lòng kiểm tra lại!")
          .css("color", "red");

        result = false;
      }

      // Trường hợp password dưới 5 kí tự thì thông báo lỗi
      if (password != "" && password.length < 5) {
        $("#password").css("borderColor", "red");
        $("#error_password")
          .text("Password không được ít hơn 5 kí tự!")
          .css("color", "red");

        result = false;
      }

      // Trường hợp confirm_password dưới 5 kí tự thì thông báo lỗi
      if (confirm_password != "" && confirm_password.length < 5) {
        $("#confirm_password").css("borderColor", "red");
        $("#error_confirm_password")
          .text("Password không khớp. Vui lòng kiểm tra lại!")
          .css("color", "red");

        result = false;
      }

      return result;
    }
  }
});
