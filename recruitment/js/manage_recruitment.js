$(document).ready(function () {
    Search();
  });

 
  function Search() {
    $("#txtsearch").val(key);
    $.ajax({
      async: false,
      url: "manage_recruitment_search.php",
      method: "get",
      data: {
        current_page: page,
        key: $.trim($("#txtsearch").val()),
      },
      success: function (response) {
        if (response != 0) {
          $("tbody").html(response);
        } else {
          alert("Error " + response);
        }
      },
    });
  }

  $("#btnsearch").on("click", function () {
    var key = $.trim($("#txtsearch").val());
    if (key != "") {
      window.location = "./manage_recruitment.php?page=1" + "&key=" + key;
    }
    window.location = "./manage_recruitment.php?page=1" + "&key=" + key;
  });