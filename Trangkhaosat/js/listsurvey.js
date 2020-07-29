$(document).ready(function() {

    var totalPages;
    var element1;
    var element2;

    GetData(page);

    function GetData(currentPage) {
        $.ajax({
            async: false,
            type: "post",
            url: "./lib/list_survey_ajax.php",
            data: {
                curentpage: currentPage,
                limit: 12,
            },
            success: function(data) {
                ShowData(data);
            }
        });  
    }

    function ShowData(data)
    {
        $("#col1").remove();
        $("#col2").remove();
        $("#pg_dtl").remove();
        element1 = '<div class="col1" id="col1">';
        element2 = '<div class="col2" id = "col2">';
        var index = 1;
        data.data.forEach(function(item) {
                    if (index % 2 === 0) {
                        element2 +=
                            '<div class="row"><div class="title"><i class="fa fa-clock-o" aria-hidden="true" style = "margin-right: 5px"></i>' +
                            item.create_datetime + ' | <b style = "color: #ff5252">' +
                            item
                            .category +
                            '</b> | Số trả lời: (<b style = "color: #fb8c00">' +
                            item.index_asw + '</b>)</div>' +
                            '<div class="content"><i class="fa fa-question-circle-o" aria-hidden="true" style = "margin-right: 5px"></i><b>' +
                            item.content + '</b></div>' +
                            '<div><button name= "'+ infoLogin +'" class="btn-reply"  id= "'+item.id+'">Trả lời ngay </button></div></div>';
                    } else {
                        element1 +=
                            '<div class="row"><div class="title"><i class="fa fa-clock-o" aria-hidden="true" style = "margin-right: 5px"></i>' +
                            item.create_datetime + ' | <b style = "color: #ff5252">' +
                            item
                            .category +
                            '</b> | Số trả lời: (<b style = "color: #fb8c00">' +
                            item.index_asw + '</b>)</div>' +
                            '<div class="content"><i class="fa fa-question-circle-o" aria-hidden="true" style = "margin-right: 5px"></i><b>' +
                            item.content + '</b></div>' +
                            '<div><button name= "'+ infoLogin +'" class="btn-reply"  id= "'+item.id+'">Trả lời ngay </button></div></div>';
                    }

                    index++;
                });

                element1 = element1 + "</div>";
                element2 = element2 + "</div>";

                var element = element1 + element2;
                $("#nd").append(element);

                var paginationHtml = "";

                totalPages = parseInt(data.total_page);
                curentpage = parseInt(data.current_page);
                if(curentpage == 1)
                {
                    paginationHtml += "<div id = 'pg_dtl'><li><a class='disabled' href='#'><<</a></li><li><a class='disabled' href='#'><</a></li>";
                }
                else
                {
                    var prev = curentpage -1;
                    paginationHtml += "<div id = 'pg_dtl'><li><a href='./listsurvey.php?page=1'><<</a></li><li><a href='./listsurvey.php?page="+ prev +"'><</a></li>";
                }

                for (var i = 1; i <= totalPages; i++) {
                    if (i == curentpage) {
                        paginationHtml += "<li><a class='active' href='./listsurvey.php?page="+i+"'>" + i + "</a></li>";
                    } else {
                        paginationHtml += "<li><a href='./listsurvey.php?page="+i+"'>" + i + "</a></li>";
                    }
                }
                if(curentpage == totalPages)
                {
                paginationHtml += "<li><a class='disabled' href='#'>></a></li><li><a class='disabled' href='#'>>></a></li></div>";
                }
                else
                {
                    var next = curentpage + 1;
                    paginationHtml += "<li><a href='./listsurvey.php?page="+next  +"'>></a></li><li><a href='./listsurvey.php?page="+totalPages+"'>>></a></li></div>";
                }

                $("#pg").append(paginationHtml);                
    }

    $(document).on('keydown', function(e) {
        if (e.keyCode === 27) {
            $(".warpper-survey").css("visibility", "hidden");
            $(".container-survey").css("display", "none");
        }
    });

    $(document).on("click", ".btn-reply", function() {
        if ($(this).attr("name") == "survey") {
            $(".question").remove();
            $(".answer").remove();
            $(".kq").remove();
            
            var element = ShowFormSurvey($(this).attr("id"));

            $("#container-survey").append(element);

            $(".warpper-survey").css("visibility", "visible");
            $(".container-survey").css("display", "block");

        } else {
            OpenForm_Login();
        }
    });

    $(document).on("click", ".btn-reply-survey", function() {
        var result = CreateReply($(this).attr("id"), $('input[name=asw]:checked').val());

        if(result)
        {
            GetData(page);
        }
    });

    // $(".pagination").on("click", "a", function(e) {
    //     e.preventDefault();
    //     var page = $(this).text(),
    //         currentPage = parseInt($(".pagination li a.active").text());

    //     if (page == "<<") {
    //         var newPage = 1;
    //     } else if (page == ">>") {
    //         var newPage = totalPages;
    //     } else if (page == "<") {
    //         var newPage = currentPage - 1;
    //     } else if (page == ">") {
    //         var newPage = currentPage + 1;
    //     } else {
    //         var newPage = parseInt(page);
    //     }

    //     return true;
    // });
});