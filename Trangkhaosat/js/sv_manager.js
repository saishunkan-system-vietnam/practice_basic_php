$(document).ready(function () {
    var totalPages;
    var newhref;
    var lst_asw = [];
    var obj;

    GetData(page);
    function GetData(page) {
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
            success: function (data) {
                console.log(data);
                ShowData(data);
            }
        });
    }

    function ShowData(data) {

        console.log(data);


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
            '<th colspan="2"></th></tr>\n';
        if (data != "err") {
            data.data.forEach(function (item) {

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
        }
        else {
            element += '</table></div>';
        }

        $("#nd").append(element);

        var paginationHtml = "";

        totalPages = parseInt(data.total_page);
        curentpage = parseInt(data.current_page);
        if (curentpage == 1 || isNaN(curentpage)) {
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
        if (curentpage == totalPages || isNaN(totalPages)) {
            paginationHtml +=
                "<li><a class='disabled' href='#'>></a></li><li><a class='disabled' href='#'>>></a></li></div>";
        } else {
            var next = curentpage + 1;
            paginationHtml += "<li><a href='./survey_manager.php?page=" + next +
                "'>></a></li><li><a href='./survey_manager.php?page=" + totalPages + "'>>></a></li></div>";
        }

        $("#pg").append(paginationHtml);
    }

    $(".pagination").on("click", "a", function (e) {
        e.preventDefault();
        var ctgr = "";
        var fndct = "";

        if ($("#category").val() != "0") {
            ctgr = "&category=" + $("#category option:selected").text();
        }

        if ($.trim($("#txtfind").val()) != "") {
            fndct = "&fnd_content=" + $.trim($("#txtfind").val());
        }
        newhref = $(this).attr("href") + ctgr + fndct;
        window.location.href = newhref;
    });

    $("#btn_find").click(function (e) {
        e.preventDefault();
        var ctgr = "";
        var fndct = "";

        if ($("#category").val() != "0") {
            ctgr = "&category=" + $("#category option:selected").text();
        }

        if ($("#txtfind").val() != "") {
            fndct = "&fnd_content=" + $("#txtfind").val();
        }
        newhref = "./survey_manager.php?page=1" + ctgr + fndct;
        window.location.href = newhref;
    });

    $("#btn_ins").click(function (e) {
        e.preventDefault();
        newhref = window.location.href;
        $(".list_ad_survey").css("display", "none");
        InsertSv("Thêm mới khảo sát");

    });

    $(document).on("click", "#btn_back", function () {
        $(".container_ad_svcu").remove();
        $(".list_ad_survey").css("display", "block");
    });

    $(document).on("click", "#btn_ins_asw", function () {

        var element = '<div class="asw_">'


    });

    function InsertSv(title) {
        lst_asw = [];
        var element = '<div class="container_ad_svcu">' +
            '<div class="title">' +
            '<h2>' + title + '</h2></div>' +
            '<div class="content_ad_svcu">' +
            '<label for="txt_qs"><b>Câu hỏi:</b></label>' +
            '<input type="text" name="txt_qs" id="txt_qs" class = "txt_qs">' +
            '<label for="txt_aws"><b>Câu trả lời:</b></label><br>' +
            '<input type="text" name=txt_aws"" id="txt_aws" class = "txt_aws">' +
            '<button class="btn_ins_asw add" id = "btn_ins_asw">Insert</button>' +
            '<button class="btn_edit upd" id = "btn_upd_asw" style = "display:none">Update</button>' +
            '<button class="btn_back upd" id = "btn_cancel_asw"style = "display:none">Cancel</button>' +
            '<table cellpadding = "10px" id ="tbl_asw">' +
            '<tr><th class="ff asw"> Câu trả lời</th><th colspan="2"></th></tr>' +
            '</table></div><div class="kq"><button class="btn_back" id="btn_back">Back</button>' +
            '<button class = "btn_save">Save</button></div></div>';
        $("#warpper_ad_survey").append(element);
    }

    $(document).on("click", "#btn_ins_asw", function () {
        if ($.trim($("#txt_aws").val()) != "") {
            let d = new Date();
            let id = Math.floor((Math.random() * 1000) + 1) + "/" + d.getTime();
            let lst_dtl = { "cnt_asw": $.trim($("#txt_aws").val()), "id": id, "db": "0", "upd_flg": "0", "del_flg": "0" }
            var lst_count = lst_asw.length;
            var td_asw = "td_" + lst_count
            var tr_asw = "tr_" + lst_count
            lst_asw.push([lst_dtl]);
            var element = '<tr id="' + tr_asw + '"><td class="ff asw" id="' + td_asw + '">' + $.trim($("#txt_aws").val()) + '</td>' +
                '<td class="col4"><button class="btn_edit_asw" name="btn_edit_asw" id= "' + lst_count + '">edit</button></td>' +
                '<td class="col4"><button class="btn_del_asw" name= "' + lst_count + '">delete</button></td></tr>';
            $("#tbl_asw").append(element);
            $("#txt_aws").val("");
        }
    });

    $(document).on("click", ".btn_edit_asw", function () {
        obj = parseInt($(this).attr("id"));
        $("#txt_aws").val(lst_asw[obj][0].cnt_asw);
        $(".upd").css("display", "inline-block");
        $(".add").css("display", "none");

        $(".btn_edit_asw").css({ "opacity": "0.5", "pointer-events": "none" });
        $(".btn_del_asw").css({ "opacity": "0.5", "pointer-events": "none" });

    });

    $(document).on("click", "#btn_cancel_asw", function () {
        $("#txt_aws").val("");
        $(".upd").css("display", "none");
        $(".add").css("display", "inline-block");
        $(".btn_edit_asw").css({ "opacity": "1", "pointer-events": "all" });
        $(".btn_del_asw").css({ "opacity": "1", "pointer-events": "all" });
    });

    $(document).on("click", "#btn_upd_asw", function () {
        lst_asw[obj][0].cnt_asw = $("#txt_aws").val();
        lst_asw[obj][0].upd_flg = "1";
        var objtd = "#td_" + obj;
        $(objtd).html($("#txt_aws").val());
        $("#txt_aws").val("");
        $(".upd").css("display", "none");
        $(".add").css("display", "inline-block");
        $(".btn_edit_asw").css({ "opacity": "1", "pointer-events": "all" });
        $(".btn_del_asw").css({ "opacity": "1", "pointer-events": "all" });
    });

    $(document).on("click", ".btn_del_asw", function () {
        obj = parseInt($(this).attr("name"));
        var objtr = "#tr_" + obj;
        lst_asw[obj][0].del_flg = "1";
        $(objtr).remove();
    });

    $(document).on("click", ".btn_save", function () {
        if ($.trim($("#txt_qs").val()) == "") {
            alert("Vui lòng nhập thông tin câu hỏi khảo sát");
        }
        else if(lst_asw.length == 0)
        {
            alert("Vui lòng nhập thông tin câu trả lời");
        }
        else {
            $.ajax({
                async: false,
                type: "post",
                url: "../lib/cusv_manager.php",
                data: {
                    lst: lst_asw,
                },
                success: function (result) {
                }
            });
        }
    });



});