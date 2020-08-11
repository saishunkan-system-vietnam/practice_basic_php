$(document).ready(function () {
  $("#btnapply_popup").on("click", function () {
    if (confirm("Bạn đã chắc chắn muốn ứng tuyển?")) {
      if (IsValidTel()) {
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

  $("#btncancel").on("click", function () {
    $("#apply_form").css("visibility", "hidden");
    $("#apply_form").removeData();
  });

  $("#btnapply_close").on("click", function () {
    HideApplyForm();
  });
});

function HideApplyForm() {
  $("#apply_form").css("visibility", "hidden");
  $("#apply_form").removeData();
}

function IsValidTel() {
  var tel = $.trim($("#tel").val());

  if (tel == "") {
    $("#error_tel").text("Vui lòng nhập số điện thoại!");
    $("#tel").css("borderColor", "red");
    return false;
  }

  var pattern_tel = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
  if (!pattern_tel.test(tel) && tel != "") {
    $("#error_tel").text("Định dạng của số điện thoại không hợp lệ!");
    $("#tel").css("borderColor", "red");
    return false;
  }

  return true;
}
