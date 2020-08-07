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

  $("#btnadd").on("click", function () {
    $.ajax({
      async: false,
      url: "test4.php",
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
   // window.location = "./signup.php";
      // var form = '<?php GenRegistUpdateForm("Đăng ký", "btnsignup", "Đăng ký")?>';
   // $("#wrapper-mng-rcm").css("visibility", "hidden");        
    //$("#wrapper_signup_rcm").html("<?php GenRegistUpdateForm('Đăng ký', 'btnsignup', 'Đăng ký');?>");
  });

  $(document).on("click", "#btnedit", function () {
    var id = $(this).attr("data");

    $.ajax({
      async: false,
      url: "test4.php",
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

    // var id = $(this).attr("id");
    // var old = $(this).data("old")
    // alert(name);
    // alert(old);
    // alert($(this).val());
    // alert($(this).data("old"));
    // var admin_flg = $(this).val() == 3 ? 1 : 0;
    // window.location.href = "./edit_account.php?id=" + id;    
  });

  