$(document).ready(function() {
    var form = $(".warpper-survey");
    $(document).on('keydown', function(e) {
        if (e.keyCode === 27) {
            form.css("visibility", "hidden");
        }
    });

    $(".btn-reply").click(function() {

        if ($(this).attr("name") == "survey") {
            $(".question").remove();
            $(".answer").remove();
            $(".kq").remove();
            var data = GetInfoSurvey($(this).attr("id"));
            var element = "";
            data.forEach(function(item) {

                if (element == "") {
                    element += '<div class="question"><p>' + item.content + '</p></div><div class="answer"><ul>';
                }
                element += '<li><input type="radio" name="asw" ';

                if (item.sl_asw == "1") {
                    element += ' checked ';
                }
                element += ' value="' + item.id_dtl + '"><label for="asw">' + item.answer + '</label></li>';
            });

            element += '</ul></div>' +
                ' <div class="kq">' +
                '<button class="btn-reply-survey" id = "' + data[0].id_hdr + '">Trả lời</button></div>';

            $("#container-survey").append(element);

            $(form).css("visibility", "visible");
        } else {
            OpenForm();
        }
    });

    function OpenForm() {
        $(".warpper_login").css("visibility", "visible");

        $.ajax({
            async: false,
            type: "post",
            url: "./lib/getcookie_ajax.php",
            success: function(data) {
                $("#uid_login").val(data.uid);
                $("#pass_login").val(data.pass);
                $("#chksave").prop("checked", data.pass == "" ? false : true);
            }
        });
    }

    $(document).on("click", ".btn-reply-survey", function() {
        var result = CreateReply($(this).attr("id"), $('input[name=asw]:checked').val());

        console.log(result);
        if (result == true) {
            form.css("visibility", "hidden");
            alert("Trả lời thành công");
        } else {
            alert("Trả lời thất bại");
        }
    });

});