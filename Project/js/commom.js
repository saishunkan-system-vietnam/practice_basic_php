function Openform(id) {
if(id = 'btnAdd')
{
    $("#modal-wrapper").css("display", "block");
    $("body").css("overflow", "hidden");
    return true;
}

}

function Closeform() {
        $("#modal-wrapper").css("display", "none");
        $("body").css("overflow", "auto");
}

$(document).keydown(function(event) { 
    if (event.keyCode == 27) { 
        $("#modal-wrapper").css("display", "none");
        $("body").css("overflow", "auto");
    }
});
