// Khi load trang xong thì tìm kiếm dữ liệu và hiển thị
$(document).ready(function () {
  Search();
});

// Click button search
$("#btnsearch").on("click", function () {
  var key = $.trim($("#txtsearch").val());

  window.location = "./admin.php?page=1" + "&key=" + key;
});

// Click button delete
$(document).on("click", "#btndel", function () {
  var id = $(this).attr("name");
  var stt = $(this).attr("stt");
  var val = $(this).attr("val");
  var result = null;
 
  // Check giá trị, nếu khác 0 thì return
  if (val != 0) {
    return;
  }

  // Xác nhận xóa tài khoản
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

    // Trường hợp kết quả thành công thì hiển thị dữ liệu
    if (result == 1) {
      $("#stt" + stt).html("<label style='color:red'>banned</label");
      $(this).val("Active");
      $(this).attr("id", "btnactive");
      $(this).attr("val", 1);
    } 
    // Trường hợp thất bại thì thông báo lỗi
    else {
      alert("Error " + result);
    }
  }
});

// Click button active
$(document).on("click", "#btnactive", function () {
  var id = $(this).attr("name");
  var stt = $(this).attr("stt");
  var val = $(this).attr("val");
  var result = null;

  // Check giá trị, nếu khác 1 thì return
  if (val != 1) {
    return;
  }

  // Xác nhận kích hoạt
  if (confirm("Bạn đã chắc chắn muốn kích hoạt tài khoản " + id + " ?")) {

    // Ajax update account
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

    // Trường hợp kết quả thành công thì hiển thị dữ liệu
    if (result == 1) {
      $("#stt" + stt).html("active");
      $(this).val("Delete");
      $(this).attr("id", "btndel");
      $(this).attr("val", 0);
    } 
    // Trường hợp thất bại thì thông báo lỗi
    else {
      alert("Error " + result);
    }
  }
});

// Click button role
$(document).on("click", ".btnrole", function () {
  var id = $(this).attr("id");

  // Xác nhận update
  if (confirm("Bạn đã chắc chắn muốn thay đổi quyền admin của " + id)) {
    var admin_flg = $(this).val() == 3 ? 1 : 0;

    // Ajax update account
    $.ajax({
      async: false,
      url: "update_account.php",
      method: "post",
      data: {
        id: id,
        admin_flg: admin_flg,
      },
      success: function (response) {

        // Trường hợp kết quả thành công thì thông báo thành công
        if (response == 1) {
           alert("Thay đổi quyền admin thành công");
        } 
        // Trường hợp thất bại thì thông báo lỗi
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

// Click button edit
$(document).on("click", "#btnedit", function () {
  var id = $(this).attr("email");

  // Ajax edit account
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

// Click button add
$("#btnadd").on("click", function () {
  window.location = "./signup.php";
});

// Hàm tìm kiếm dữ liệu (user)
function Search() {
  $("#txtsearch").val(key);

  // Ajax search
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
      } else {
        alert("Error " + response);
      }
    },
  });
}
