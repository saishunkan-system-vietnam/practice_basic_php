$(document).on('click', '#btnSearch', function () {
    var cnt = ""
    if ($.trim($("#inpSearch").val()) != "") {
        cnt = "&content=" + $.trim($("#inpSearch").val());
    }
    let newhref = "./qlthietbi.php?page=" + 1 + cnt;
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