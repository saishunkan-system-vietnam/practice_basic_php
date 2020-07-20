$(document).ready(function() {
    var form = $(".warpper_login");
    $(document).on('keydown', function(e) {
        if (e.keyCode === 27) {
            form.css("visibility", "hidden");
        }
    });

    $("#btn_menu_login").click(function(e) {
        e.preventDefault();

        form.css("visibility", "visible");


    });
});