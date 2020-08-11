$(document).ready(function () {

  $("#btnback").on("click", function () {
    BackToPreviousPage();
  });

});

function IsThisPage(str_search) {
  var url = new URLSearchParams(location.search);
  var result = window.location.href.search(str_search);

  if (result != -1) {
    return true;
  }

  return false;
}

function BackToPreviousPage() {
  if (IsThisPage("http://minhnn.com")) {
    $("#recruitment_detail").hide();
    $("#recruitment_header").show();
  }

  if (IsThisPage("recruitment.php")) {
    $("#recruitment_detail").hide();
    $("#recruitment_header").show();
    $("#pagination_recruitment").show();
  }
}

$(document).on("click", ".btnapply", function () {
  var id = $(this).attr("name");

  if ($("#user_email").text() != "") {
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
    window.location = "login.php";
  }
});
