$(document).ready(function () {

  // Click button back
  $("#btnback").on("click", function () {
    BackToPreviousPage();
  });

});

// Hàm check url
function IsThisPage(str_search) {
  var url = new URLSearchParams(location.search);
  var result = window.location.href.search(str_search);

  // Trường hợp check đúng thì return true
  if (result != -1) {
    return true;
  }

  // Trả về false
  return false;
}

function BackToPreviousPage() {

  //  Trường hợp là trang chủ
  if (IsThisPage("http://minhnn.com")) {
    $("#recruitment_detail").hide();
    $("#recruitment_header").show();
  }

  //  Trường hợp là tuyển dụng
  if (IsThisPage("recruitment.php")) {
    $("#recruitment_detail").hide();
    $("#recruitment_header").show();
    $("#pagination_recruitment").show();
  }
}

// Click button ứng tuyển
$(document).on("click", ".btnapply", function () {
  var id = $(this).attr("name");

  // Trường hợp user_email khác rỗng
  if ($("#user_email").text() != "") {

    // Ajax apply
    $.ajax({
      async: false,
      url: "apply.php",
      method: "post",
      data: {
        recruitment_id: id,
        position: $("#position" + id).data("pos"),
        user_email: $("#user_email").text(),
      },
      success: function (response) {
        $("#apply_form").css("visibility", "visible");
        $("#apply_form").html(response);
      },
    });
  } else {

    // Chuyển đến trang login
    window.location = "login.php";
  }
});
