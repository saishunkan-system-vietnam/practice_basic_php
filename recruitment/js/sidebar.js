$(document).ready(function () {
  if (IsThisPage('./admin.php')) {
    SetColorButton("#btnmanage_home");
  }

  if (IsThisPage('./manage_account.php')) {
    SetColorButton("#btnmanage_account");
  }

  if (IsThisPage('./manage_recruitment.php')) {
    SetColorButton("#btnmanage_recruitment");
  }
});

$(document).on("click", "#btnmanage_home", function () {
  SetColorButton("#btnmanage_home");
  window.location = "./admin.php";
});

$(document).on("click", "#btnmanage_account", function () {
  SetColorButton("#btnmanage_account");
  window.location = "./manage_account.php";
});

$(document).on("click", "#btnmanage_recruitment", function () {
  SetColorButton("#btnmanage_recruitment");
  window.location = "./manage_recruitment.php";
});

$(document).on("click", "#btnhome", function () {
  window.location = "./index.php";
  $("#btnmanage_recruitment").css
});

function SetColorButton(id_button) {
  $(id_button).css("background-color", "#ffffff");
  $(id_button).css("color", "black");
  $(id_button).css("border", "none");
}

function IsThisPage(str_search) {
  var url = new URLSearchParams(location.search);
  var result = window.location.href.search(str_search);

  if (result != -1) {
    return true;
  }

  return false;
}
