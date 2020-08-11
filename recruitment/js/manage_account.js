$(document).ready(function () {
  Search();
});

$("#btnsearch").on("click", function () {
  var key = $.trim($("#txtsearch").val());

  window.location = "./manage_account.php?page=1" + "&key=" + key;
});

$(document).on("click", "#btndel", function () {
  var id = $(this).attr("name");
  var stt = $(this).attr("stt");
  var val = $(this).attr("val");
  var result = null;

  if (val != 0) {
    return;
  }

  if (confirm("Bạn đã chắc chắn muốn xóa tài khoản " + id + " ?")) {
    $.ajax({
      async: false,
      url: "update_account.php",
      method: "post",
      data: {
        del_id: id,
      },
      success: function (response) {
        result = response;
      },
    });

    if (result == 1) {
      $("#stt" + stt).html("<label style='color:red'>banned</label");
      $(this).val("Active");
      $(this).attr("id", "btnactive");
      $(this).attr("val", 1);
    }
    else {
      alert("Error " + result);
    }
  }
});

$(document).on("click", "#btnactive", function () {
  var id = $(this).attr("name");
  var stt = $(this).attr("stt");
  var val = $(this).attr("val");
  var result = null;

  if (val != 1) {
    return;
  }

  if (confirm("Bạn đã chắc chắn muốn kích hoạt tài khoản " + id + " ?")) {
    $.ajax({
      async: false,
      url: "update_account.php",
      method: "post",
      data: {
        active_id: id,
      },
      success: function (response) {
        result = response;
      },
    });

    if (result == 1) {
      $("#stt" + stt).html("active");
      $(this).val("Delete");
      $(this).attr("id", "btndel");
      $(this).attr("val", 0);
    }
    else {
      alert("Error " + result);
    }
  }
});

$(document).on("click", ".btnrole", function () {
  var id = $(this).attr("id");

  if (confirm("Bạn đã chắc chắn muốn thay đổi quyền admin của " + id)) {
    var admin_flg = $(this).val() == 3 ? 1 : 0;

    $.ajax({
      async: false,
      url: "update_account.php",
      method: "post",
      data: {
        id: id,
        admin_flg: admin_flg,
      },
      success: function (response) {
        if (response == 1) {
          alert("Thay đổi quyền admin thành công");
        }
        else {
          alert("Error " + response);
        }
      },
    });
  } else {
    $(this).val($(this).data("old"));
  }

  $(this).data("old", $(this).val());
});

$(document).on("click", "#btnedit", function () {
  var id = $(this).attr("email");

  $.ajax({
    async: false,
    url: "edit_account.php",
    method: "post",
    data: {
      id: id,
    },
    success: function (response) {
      if (response != 0) {
        $("#wrapper_account").css("visibility", "hidden");
        $("#wrapper_edit").html(response);
      } else {
        alert("Error " + response);
      }
    },
  });
});

$("#btnadd").on("click", function () {
  window.location = "./signup.php";
});

function Search() {
  $("#txtsearch").val(key);

  $.ajax({
    async: false,
    url: "manage_account_search.php",
    method: "get",
    data: {
      current_page: page,
      key: $.trim($("#txtsearch").val()),
    },
    success: function (response) {
      if (response != 0) {
        $("tbody").html(response);
      } 
    },
  });
}
