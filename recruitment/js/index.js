$(document).ready(function () {
  $("#btnback").on("click", function () {
    BackToPreviousPage();
  });

});

function ShowData(tag_id) {
  $.ajax({
    async: false,
    url: "recruitment_detail.php",
    method: "post",
    data: {
      recruitment_id: $(tag_id).data("id"),
    },
    success: function (response) {
      //alert(response);
      $("#data_detail").remove();
      $("#recruitment_detail").append(response);
      $("#recruitment_detail").show();
      $("#recruitment_header").hide();
      $("#btnback").hide();
      if (IsThisPage("recruitment.php")) {
        $("#pagination_recruitment").hide();
      }
    },
  });
}

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
  // alert(
  //   id + " " + $("#position" + id).data("pos") + " " + $("#user_email").text()
  // );

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
        // alert(response);
        $("#apply_form").css("visibility", "visible");
        $("#apply_form").html(response);
      },
    });
  } else {
    window.location = "login.php";
  }
});
