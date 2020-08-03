$(document).ready(function () {
  $("#btnback").on("click", function () {
    BackToPreviousPage();
  });

  $("#btnapply_close").on("click", function () {
  //  $("#apply_form").hide();
   $("#apply_form").css("visibility", "hidden");
  });

  $("#btnapply_popup").on("click", function () {
    if (IsValidTel()) {
      alert("ok");
      return;
    }
    alert("notok");
  });

  // OnClickApplyButton("#btnapply1");
  // OnClickApplyButton("#btnapply2");
  // OnClickApplyButton("#btnapply3");
  // OnClickApplyButton("#btnapply4");
  // OnClickApplyButton("#btnapply5");
  // OnClickApplyButton("#btnapply6");
  // OnClickApplyButton("#btnapply7");
  // OnClickApplyButton("#btnapply8");
  // OnClickApplyButton("#btnapply9");
  // OnClickApplyButton("#btnapply10");
  // OnClickApplyButton("#btnapply11");
  // OnClickApplyButton("#btnapply12");
});

function ShowData(tag_id) {
  // OnClickApplyButton("#btnapply1");
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
  // var url = new URLSearchParams(location.search);
  // var result = (window.location.href).search("index.php");
  // if (result != -1) {
  //     $('#recruitment_detail').show();
  //     $('#recruitment_header').hide();
  //     window.location = 'index.php';
  // }
  // else {
  //     $('#recruitment_detail').hide();
  //     $('#recruitment_header').show();
  //     $('#pagination_recuitment').show();
  //     window.location = 'recruitment.php';
  // }

  if (IsThisPage("http://minhnn.com")) {
    $("#recruitment_detail").hide();
    $("#recruitment_header").show();
  }

  if (IsThisPage("recruitment.php")) {
    // window.location = 'recruitment.php';
    $("#recruitment_detail").hide();
    $("#recruitment_header").show();
    $("#pagination_recruitment").show();
  }

  // if (IsThisPage("http://minhnn.com/#")) {
  //     // window.location = 'http://minhnn.com';
  //     // $('#btnback').hide();
  //     // $('#back).hide()');
  // }
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

// function e(){
//   // if (IsValidTel()) {
//   //   alert("ok");
//   //   return;
//   // }
//   alert("notok");
// }

// function OnClickApplyButton(button) {
  $(document).on("click",".btnapply", function () {
    // window.location = 'index.php';
    // alert($("#btnapply1").data("id"));
    var id = $(this).attr("name");
    alert(id);
    alert("id");
    // alert($('#user_name').text());
    if ($("#user_email").text() != "") {
      $.ajax({
        async: false,
        url: "applytest.php",
        method: "post",
        data: {
          recruitment_id: id,
          position: $("#position" + id).data("pos"),
          user_email: $("#user_email").text(),
        },
        success: function (response) {
          alert(response);
          // $("#data_detail").remove();
          // $("#recruitment_detail").append(response);
          // $("#recruitment_detail").show();
          // $("#recruitment_header").hide();
          $("#apply_form").css("visibility", "visible");
            $("#apply_form").append(response);
        },
      });

      //   if (IsThisPage("recruitment.php")) {
      //     $.ajax({
      //       async: false,
      //       url: "recruitment_detail.php",
      //       method: "post",
      //       data: {
      //         recruitment_id: $(button).data("id"),
      //       },
      //       success: function (response) {
      //         // alert($(button).data("id"));
      //         // alert(response);
      //         $("#data_detail").remove();
      //         $("#recruitment_detail").append(response);
      //         $("#recruitment_detail").show();
      //         $("#recruitment_header").hide();
      //         $("#pagination_recruitment").hide();
      //       },
      //     });
      //   }
    } else {
      window.location = "login.php";
    }
  });
// }
