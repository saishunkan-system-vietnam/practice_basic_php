$(document).ready(function () {
  Search();
});

function Search() {
  $("#txtsearch").val(key);

  $.ajax({
    async: false,
    url: "./manage_recruitment_search.php",
    method: "get",
    data: {
      current_page: page,
      // key: $.trim($("#txtsearch").val()),
        key : $.trim($("#txtsearch").val()),
    },
    success: function (response) {
      if (response != 0) {
        $("#tbody-rcm").html(response);
      }
    },
  });
}

$("#btnsearch").on("click", function () {
  var key = $.trim($("#txtsearch").val());
  window.location = "./manage_recruitment.php?page=1" + "&key=" + key;
});

$("#btnadd").on("click", function () {
  $.ajax({
    async: false,
    url: "recruitment_gen_form.php",
    method: "post",
    data: {
      title: "Đăng ký",
      button: "btnsignup",
      value: "Đăng ký",
    },
    success: function (response) {
      if (response != 0) {
        $("#wrapper-mng-rcm").css("visibility", "hidden");
        $("#wrapper_signup_rcm").html(response);
      } else {
        alert("Error " + response);
      }
    },
  });
});

$(document).on("click", "#btnedit", function () {
  var id = $(this).attr("data");

  $.ajax({
    async: false,
    url: "recruitment_gen_form.php",
    method: "post",
    data: {
      title: "Recruitment",
      button: "btnupdate",
      value: "Update",
      id: id,
    },
    success: function (response) {
      if (response != 0) {
        $("#wrapper-mng-rcm").css("visibility", "hidden");
        $("#wrapper_edit_rcm").html(response);
      } else {
        alert("Error " + response);
      }
    },
  });
});

$(document).on("click", "#btndel", function () {
  var id = $(this).attr("name");
  var stt = $(this).attr("stt");

  if ($.trim($("#stt" + stt).text()) == "banned") {
    alert("Tin tuyển dụng này đang ở trạng thái vô hiệu!");
    return;
  }

  if (confirm("Bạn đã chắc chắn muốn xóa tin tuyển dụng id = " + id + " ?")) {
    $.ajax({
      async: false,
      url: "recruitment_update.php",
      method: "post",
      data: {
        del_id: id,
      },
      success: function (response) {
        if (response == 1) {
          $("#stt" + stt).html("<label style='color:red'>banned</label");
        } else {
          alert("Error " + response);
        }
      },
    });
  }
});

$(document).on("click", "#btnview", function () {
  var id = $(this).attr("data");
  var current_page = 1;
  PaginateListView(id, current_page);
});

$(document).on("click", "#btnclose", function () {
  $("#wrapper-view").remove();
});

$(document).on("click", ".pgn_view_number", function () {
  var id = $(this).attr("id_rcm");
  var current_page = $(this).attr("id");

  PaginateListView(id, current_page);
});

function PaginateListView(id, current_page) {
  $.ajax({
    async: false,
    url: "listview.php",

    method: "post",
    data: {
      id: id,
      current_page: current_page,
    },
    success: function (response) {
      $("#wrapper_view_rcm").html(response);
    },
  });
}