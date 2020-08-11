$(document).ready(function () {

  // Click button ứng tuyển
  $("#btnapply_popup").on("click", function () {

    // Xác nhận
    if (confirm("Bạn đã chắc chắn muốn ứng tuyển?")) {

      // Validate
      if (IsValidTel()) {

        // Ajax insert dữ liệu
        $.ajax({
          async: false,
          url: "apply_insert.php",
          method: "post",
          data: {
            recruitment_id: $("#apply_title").data("id"),
            user_email: $("#user_email").text(),
          },
          success: function (response) {
            if (response == 1) {
              alert("Bạn đã ứng tuyển thành công");
              HideApplyForm();
            } else if (response == 2) {
              alert("Vị trí này bạn đã ứng tuyển");
            } else {
              alert("Error " + response);
            }
          },
        });
      }
    }
  });

  // Click button cancel
  $("#btncancel").on("click", function () {
    $("#apply_form").css("visibility", "hidden");
    $("#apply_form").removeData();
  });

    // Click button close
  $("#btnapply_close").on("click", function () {
    HideApplyForm();
  });
});

// Hàm ẩn form ứng tuyển
function HideApplyForm(){
  $("#apply_form").css("visibility", "hidden");
  $("#apply_form").removeData();
}

// Hàm validate số điện thoại
function IsValidTel() {
  var tel = $.trim($("#tel").val());

  // Nếu số điện thoại là rỗng
  if (tel == "") {
    $("#error_tel").text("Vui lòng nhập số điện thoại!");
    $("#tel").css("borderColor", "red");
    return false;
  }

  // check định dạng số điện thoại
  var pattern_tel = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
  if (!pattern_tel.test(tel) && tel != "") {
    $("#error_tel").text("Định dạng của số điện thoại không hợp lệ!");
    $("#tel").css("borderColor", "red");
    return false;
  }

  return true;
}
