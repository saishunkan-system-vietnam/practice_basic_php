$(document).on('click', '#btnSearch', function () {
    var cnt = ""
    if ($.trim($("#inpSearch").val()) != "") {
        cnt = "&content=" + $.trim($("#inpSearch").val());
    }
    let newhref;
    switch (site) {
        case "account":
            newhref = "./qlaccount.php?page=" + 1 + cnt;
            break;
        case "device":
            newhref = "./qldevice.php?page=" + 1 + cnt;
            break;
        case "loan":
            newhref = "./qlloan.php?page=" + 1 + cnt;
            break;
        case "userloan":
            newhref = "./userloan.php?id=" + id + "&page=" + 1 + cnt;
            break;
    }
    window.location.href = newhref;
});

$('.pagination').on('click', 'a', function (e) {
    e.preventDefault();

    let cnt = "";
    if (content != "") {
        cnt = "&content=" + content;
    }

    let href = $(this).attr("href");

    let newhref = href + cnt;
    window.location.href = newhref;
});