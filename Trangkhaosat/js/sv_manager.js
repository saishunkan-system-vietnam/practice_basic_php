$(document).ready(function() {
    var totalPages;

    GetData(page);
    function GetData(page)
    {
        $.ajax({
            async: false,
            type: "post",
            url: "../lib/vs_manager_ajax.php",
            data: {
                curentpage: page,
                limit: 12,
                id_catogery: category,
                fnd_content: fnd_content,
            },
            success: function(data) {
                console.log(data);
                ShowData(data);
            }
        });
    }

    function ShowData(data) {

        console.log(data);

        $(".nd-table").remove();
        $("#pg_dtl").remove();

        var element = "";
        var index = "N/A";
        var stt_hdr = 1;
        var stt_dtl = 1;
        var id = "";
        var index_asw;

        element = '<div class="nd-table"> \n' +
            '<table cellpadding="10px" id="tbl">' +
            '<tr>\n' +
            '<th class="ff">STT</th>\n' +
            '<th class="ff">Loại khảo sát</th>\n' +
            '<th class="ff">Câu hỏi khảo sát</th>\n' +
            '<th class="ff">Lượt trả lời</th>\n' +
            '<th colspan="2"></th>\n';
        data.data.forEach(function(item) {

            if (index != item.num_row) {

                if (index != "N/A") {
                    element += '</ul></td>\n' +
                        '<td class="ff col">' + index_asw + '</td>\n' +
                        '<td class="col4"><button class="btn_edit" id = "btn_edit" name = "' + id +
                        '">edit\n' +
                        '</button></td>\n' +
                        '<td class="col4"><button class="btn_del" id = "btn_del" name = "' + id +
                        '">delete</button></td>\n' +
                        '</tr>\n';
                }

                element += '<tr>\n' +
                    '<td class="ff col1">' + stt_hdr + '</td>\n' +
                    '<td class="ff col2">' + item.category + '</td>\n' +
                    '<td class="ff col3">' + item.content + ' <span class="crt_dt">(' + item
                    .create_datetime + ')</span>\n' +
                    '<ul>\n';

                index = item.num_row;
                stt_hdr++;
                stt_dtl = 1;
            }

            element += '<li><b>' + stt_dtl + '.</b>' + item.answer + '</li>';
            index_asw = item.index_asw;
            id = item.id;
            stt_dtl++;
        });

        element += '</ul></td>\n' +
            '<td class="ff col">' + index_asw + '</td>\n' +
            '<td class="col4"><button class="btn_edit" id = "btn_edit" name = "' + id + '">edit\n' +
            '</button></td>\n' +
            '<td class="col4"><button class="btn_del" id = "btn_del" name = "' + id +
            '">delete</button></td>\n' +
            '</tr>\n' +
            '</table></div>';

        $("#nd").append(element);

        var paginationHtml = "";

        totalPages = parseInt(data.total_page);
        curentpage = parseInt(data.current_page);
        if (curentpage == 1) {
            paginationHtml +=
                "<div id = 'pg_dtl'><li><a class='disabled' href='#'><<</a></li><li><a class='disabled' href='#'><</a></li>";
        } else {
            var prev = curentpage - 1;
            paginationHtml +=
                "<div id = 'pg_dtl'><li><a href='./survey_manager.php?page=1'><<</a></li><li><a href='./survey_manager.php?page=" +
                prev + "'><</a></li>";
        }

        for (var i = 1; i <= totalPages; i++) {
            if (i == curentpage) {
                paginationHtml += "<li><a class='active' href='./survey_manager.php?page=" + i + "'>" + i +
                    "</a></li>";
            } else {
                paginationHtml += "<li><a href='./survey_manager.php?page=" + i + "'>" + i + "</a></li>";
            }
        }
        if (curentpage == totalPages) {
            paginationHtml +=
                "<li><a class='disabled' href='#'>></a></li><li><a class='disabled' href='#'>>></a></li></div>";
        } else {
            var next = curentpage + 1;
            paginationHtml += "<li><a href='./survey_manager.php?page=" + next +
                "'>></a></li><li><a href='./survey_manager.php?page=" + totalPages + "'>>></a></li></div>";
        }

        $("#pg").append(paginationHtml);
    }

    $(".pagination").on("click", "a", function(e) {
        e.preventDefault();
        var newhref = $(this).attr("href") + "&category=" + $("#category").val() + "&fnd_content=" + $("#txtfind").val();
        $(this).attr("href", newhref);
        window.location.href = newhref;
    });

    $("#btn_find").click(function (e) { 
        e.preventDefault();
        var ctgr = "";
        var fndct = "";
  
        if($("#category").val() != "0")
        {
            ctgr = "&category=" + $("#category option:selected").text();
        }

        if($("#txtfind").val() != "")
        {
            fndct = "&fnd_content=" + $("#txtfind").val();
        }
        newhref = "./survey_manager.php?page=1" + ctgr + fndct;
        window.location.href = newhref;
    });

});