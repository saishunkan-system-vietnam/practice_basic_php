$(document).ready(function() {

    $(".tab").hide();
    $(".main div:first").fadeIn();
    $(".slidebar li:first").attr("id", "active");

    $('.slidebar a').click(function(e) {
        e.preventDefault();

        if ($(this).attr("name") == "tab_index") {
            window.location.href = "../index.php";
        }

        if ($(this).closest("li").attr("id") == "active") {
            return;
        } else {

            $(".tab").hide();
            $(".slidebar li").attr("id", "");
            $(this).parent().attr("id", "active");

            $('#' + $(this).attr('name')).fadeIn();
        }
    });
});