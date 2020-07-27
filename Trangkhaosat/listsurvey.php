<?session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Danh sách khảo sát</title>
    <?
    require_once('./config/router.php');
    
    $infoLogin = false;
    if(!empty($_SESSION['dataLogin'])){        
        $infoLogin = true;
    }
    include_once(FILE_MENU);
    ?>

    <link rel="stylesheet" href=<?= FILE_CSS_STYLESHEET?>>
    <link rel="stylesheet" href=<?= FILE_CSS_LISTSURVEY?>>

</head>

<body>

    <div class="warpper-sv">
        <H1>DANH SÁCH KHẢO SÁT</H1>
        <div class="container-sv" id = "tl">
            <div class="detail" id="nd">
            </div>
            <div class="pg_dtl">
            <ul class="pagination" id="pg">

            </ul>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {

        var totalPages;
        var currentPage;
        var element1;
        var element2;

        GetData("1");

        function GetData(currentPage) {
            $.ajax({
                type: "post",
                url: "./lib/list_survey_ajax.php",
                data: {
                    curentpage: currentPage,
                    limit: '10',
                },
                success: function(data) {

                    console.log(data);
                    ShowData(data);

                }
            });  
        }

        function ShowData(data)
        {
            $("#col1").remove();
            $("#col2").remove();
            $("#test").remove();
            element1 = '<div class="col1" id="col1">';
                    element2 = '<div class="col2" id = "col2">';
                    data.data.forEach(function(item) {
                        if (item.num_row % 2 === 0) {
                            element2 +=
                                '<div class="row"><div class="title"><i class="fa fa-clock-o" aria-hidden="true" style = "margin-right: 5px"></i>' +
                                item.create_datetime + ' | <b style = "color: #ff5252">' +
                                item
                                .category +
                                '</b> | Số trả lời: (<b style = "color: #fb8c00">' +
                                item.index_asw + '</b>)</div>' +
                                '<div class="content"><i class="fa fa-question-circle-o" aria-hidden="true" style = "margin-right: 5px"></i><b>' +
                                item.content + '</b></div>' +
                                '<div class="kq"><a href="#" class="btn-reply">Trả lời ngay </a></div></div>';
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
                                '<div class="kq"><a href="#" class="btn-reply">Trả lời ngay </a></div></div>';
                        }
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
                        paginationHtml += "<div id = 'test'><li><a class='disabled' href='#'><<</a></li><li><a class='disabled' href='#'><</a></li>";
                    }
                    else
                    {
                        paginationHtml += "<div id = 'test'><li><a href='#'><<</a></li><li><a href='#'><</a></li>";
                    }

                    for (var i = 1; i <= totalPages; i++) {
                        if (i == curentpage) {
                            paginationHtml += "<li><a class='active' href='#'>" + i + "</a></li>";
                        } else {
                            paginationHtml += "<li><a href='#'>" + i + "</a></li>";
                        }
                    }
                    if(curentpage == totalPages)
                    {
                    paginationHtml += "<li><a class='disabled' href='#'>></a></li><li><a class='disabled' href='#'>>></a></li></div>";
                    }
                    else
                    {
                        paginationHtml += "<li><a href='#'>></a></li><li><a href='#'>>></a></li></div>";
                    }

                    $("#pg").append(paginationHtml);
        }

        $(".pagination").on("click", "a", function(e) {
            e.preventDefault();
            var page = $(this).text(),
                currentPage = parseInt($(".pagination li a.active").text());

            if (page == "<<") {
                var newPage = 1;
            } else if (page == ">>") {
                var newPage = totalPages;
            } else if (page == "<") {
                var newPage = currentPage - 1;
            } else if (page == ">") {
                var newPage = currentPage + 1;
            } else {
                var newPage = parseInt(page);
            }

            GetData(newPage);
        });
    });
    </script>

</body>

</html>