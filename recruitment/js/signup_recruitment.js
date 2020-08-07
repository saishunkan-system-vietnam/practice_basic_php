$("#btnsignup").on("click", function () {
  // event.preventDefault();
  //alert(CKEDITOR.instances.detail.getData());
  if (
    confirm(
      "Bạn đã chắc chắn muốn " + $("#btnsignup").val() + " tài khoản này?"
    )
  ) {
    if (IsValidRecruitmentData()) {
      alert("ok");
    }
  }
});

function IsValidRecruitmentData() {
  var company = $.trim($("#company").val());
  var pos_title = $.trim($("#pos_title").val());
  var address = $.trim($("#address").val());
  var salary = $.trim($("#salary").val());
  var deadline = $.trim($("#deadline").val());
  var detail = $.trim($("#detail").val());

  var is_valid = true;

  if (company == "") {
    $("#error_company").text("Vui lòng nhập đầy đủ tên company!");
    $("#company").css("borderColor", "red");
    is_valid = false;
  }

  if (company.length < 5 && company != "") {
    $("#error_company").text(
      "Vui lòng nhập tên company có ít nhất là 5 kí tự!"
    );
    $("#company").css("borderColor", "red");
    is_valid = false;
  }

  if (pos_title == "") {
    $("#error_pos_title").text("Vui lòng nhập position title!");
    $("#pos_title").css("borderColor", "red");
    is_valid = false;
  }

  if (address == "") {
    $("#error_address").text("Vui lòng nhập địa chỉ!");
    $("#address").css("borderColor", "red");
    is_valid = false;
  }

  if (salary == "") {
    $("#error_salary").text("Vui lòng nhập salary!");
    $("#salary").css("borderColor", "red");
    is_valid = false;
  }
  alert(deadline);
  if (!isDate(deadline)) {
    $("#error_deadline").text("Định dạng ngày deadline không hợp lệ!");
    $("#deadline").css("borderColor", "red");
    is_valid = false;
  }

  if (detail == "") {
    $("#error_detail").text("Vui lòng nhập detail!");
    $("#detail").css("borderColor", "red");
    is_valid = false;
  }

  return is_valid;
}

function isDate(stringDate) {
  var currVal = stringDate;
  if (currVal == "") {
    return false;
  }

  var pattern = /^(\d{4})(\/|-)(\d{1,2})(\/|-)(\d{1,2})$/;
  var dtArray = currVal.match(pattern);

  if (dtArray == null) {
    return false;
  }

  dtMonth = dtArray[3];
  dtDay = dtArray[5];
  dtYear = dtArray[1];

  if (dtYear < 1000) {
    return false;
  }

  if (dtMonth < 1 || dtMonth > 12) {
    return false;
  } else if (dtDay < 1 || dtDay > 31) {
    return false;
  } else if (
    (dtMonth == 4 || dtMonth == 6 || dtMonth == 9 || dtMonth == 11) &&
    dtDay == 31
  ) {
    return false;
  } else if (dtMonth == 2) {
    var isleap = dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0);
    if (dtDay > 29 || (dtDay == 29 && !isleap)) {
      return false;
    }
  }
  return true;
}