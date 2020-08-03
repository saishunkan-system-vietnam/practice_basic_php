$(document).ready(function() {
    var lst_asw = [];
    var obj;
    var id_hdr;
    var status_sv;
    var ststus_us;
    var page_sv = 1;
    var page_us = 1;
    var category = "0";
    var fnd_content_sv = "";
    var fnd_content_us = "";
    var limit = 12;

    GetDataSv(page_sv);
    GetDataUser(page_us);
    GetStatistic();

    
    function GetStatistic() {
        $.ajax({
            async: false,
            type: "post",
            url: "../lib/statistic.php",
            data: { get_info: "1" },
            success: function(data) {

                $("#tt_view").html(data.cnt_access);
                $("#tt_user").html(data.user);
                $("#tt_onl").html(data.online);
                $("#mem_onl").html(data.mem);
                $("#guest_onl").html(data.guest);
                $("#tt_question").html(data.question);
                $("#tt_answer").html(data.answer);
            }
        });
    }

    function GetDataSv(page) {
        $.ajax({
            async: false,
            type: "post",
            url: "../lib/vs_manager_ajax.php",
            data: {
                curentpage: page,
                limit: limit,
                id_catogery: category,
                fnd_content: fnd_content_sv,
            },
            success: function(data) {
                ShowData_Sv(data, page, limit);
            }
        });
    }

    $("#btn_fresh").click(function(e) {
        e.preventDefault();
        GetStatistic();
    });

    function ShowData_Sv(data, page, limit) {

        $(".nd-table").remove();
        $("#pg_dtl").remove();

        var element = "";
        var index = "N/A";
        var stt_hdr = parseInt(page - 1) * limit + 1;
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
            data.data.forEach(function(item) {

                if (index != item.num_row) {

                    if (index != "N/A") {
                        element += '</ul></td>\n' +
                            '<td class="ff col">' + index_asw + '</td>\n' +
                            '<td class="col4"><button class="btn_edit" name = "' + id +
                            '">edit\n' +
                            '</button></td>\n' +
                            '<td class="col4"><button class="btn_del" name = "' + id +
                            '">delete</button></td>\n' +
                            '</tr>\n';
                    }

                    element += '<tr>\n' +
                        '<td class="ff col1">' + stt_hdr + '</td>\n' +
                        '<td class="ff col2">' + item.category + '<span id = "' + item.id + '" name = "' + item.id_category + '"></span></td>\n' +
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
                '<td class="col4"><button class="btn_edit" name = "' + id + '">edit\n' +
                '</button></td>\n' +
                '<td class="col4"><button class="btn_del" name = "' + id +
                '">delete</button></td>\n' +
                '</tr>\n' +
                '</table></div>';
        } else {
            element += '</table></div>';
        }

        $("#nd").append(element);

        var paginationHtml = "";

        var totalPages = parseInt(data.total_page);
        curentpage = parseInt(data.current_page);
        if (curentpage == 1 || isNaN(curentpage)) {
            paginationHtml +=
                "<div id = 'pg_dtl'><li><a class='disabled' href=''><<</a></li><li><a class='disabled' href=''><</a></li>";
        } else {
            var prev = curentpage - 1;
            paginationHtml +=
                "<div id = 'pg_dtl'><li><a href='''><</a></li>";
        }

        for (var i = 1; i <= totalPages; i++) {
            if (i == curentpage) {
                paginationHtml += "<li><a class='active' href=''>" + i +
                    "</a></li>";
            } else {
                paginationHtml += "<li><a href=''>" + i + "</a></li>";
            }
        }
        if (curentpage == totalPages || isNaN(totalPages)) {
            paginationHtml +=
                "<li><a class='disabled' href=''>></a></li><li><a class='disabled' href=''>>></a></li></div>";
        } else {
            var next = curentpage + 1;
            paginationHtml += "<li><a href=''>></a></li><li><a href=''>>></a></li></div>";
        }

        $("#pg").append(paginationHtml);
        window.scrollTo(0, 0);
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

        category = $("#category option:selected").val();
        fnd_content_sv = $("#txtfind").val();

        page_sv = newPage;
        GetDataSv(newPage);
        return false;
    });

    $("#btn_find").click(function(e) {
        e.preventDefault();

        category = $("#category option:selected").val();
        fnd_content_sv = $("#txtfind").val();

        page_sv = 1;
        GetDataSv(page_sv);
    });

    $("#btn_ins").click(function(e) {
        e.preventDefault();
        $(".list_ad_survey").css("display", "none");
        status_sv = "Add";
        let d = new Date();
        id_hdr = Math.floor((Math.random() * 1000) + 1) + "/" + d.getTime();
        InsertSv();

    });

    $(document).on("click", "#btn_back", function() {
        $(".container_ad_svcu").remove();
        $(".list_ad_survey").css("display", "block");
    });

    function InsertSv() {

        var option;
        $.ajax({
            async: false,
            type: "post",
            url: "../lib/cusv_manager.php",
            data: {
                GetCbo: "1",
                id_ct: $("#category option:selected").val(),
            },
            success: function(result) {
                option = result;
            }
        });
        lst_asw = [];
        var element = '<div class="container_ad_svcu">' +
            '<div class="title">' +
            '<div class="content_ad_svcu">' +
            '<label for="txt_qs"><b>Câu hỏi:</b></label>' +
            '<input type="text" name="txt_qs" id="' + id_hdr + '" class = "txt_qs">' +
            '<select name="category" id="category_svcu">' +
            option + '</select><br>' +
            '<label for="txt_aws"><b>Câu trả lời:</b></label>' +
            '<input type="text" name=txt_aws"" id="txt_aws" class = "txt_aws">' +
            '<button class="btn_ins_asw add" id = "btn_ins_asw">Insert</button>' +
            '<button class="btn_upd_asw upd" id = "btn_upd_asw" style = "display:none">Update</button>' +
            '<button class="btn_back upd" id = "btn_cancel_asw"style = "display:none">Cancel</button>' +
            '<table cellpadding = "10px" id ="tbl_asw">' +
            '<tr><th class="ff asw"> Câu trả lời</th><th colspan="2"></th></tr>' +
            '</table></div><div class="kq"><button class="btn_back" id="btn_back">Back</button>' +
            '<button class = "btn_save">Save</button></div></div>';
        $("#warpper_ad_survey").append(element);
    }

    $(document).on("click", "#btn_ins_asw", function() {
        if ($.trim($("#txt_aws").val()) != "") {
            let d = new Date();
            let id = Math.floor((Math.random() * 1000) + 1) + "/" + d.getTime();
            Add_Row(id, $.trim($("#txt_aws").val()), "0");
            $("#txt_aws").val("");
        }
    });

    function Add_Row(id, content, db) {
        let lst_dtl = { "cnt_asw": content, "id": id, "db": db, "upd_flg": "0", "del_flg": "0" }
        var lst_count = lst_asw.length;
        var td_asw = "td_" + lst_count
        var tr_asw = "tr_" + lst_count
        lst_asw.push([lst_dtl]);
        var element = '<tr id="' + tr_asw + '"><td class="ff asw" id="' + td_asw + '">' + content + '</td>' +
            '<td class="col4"><button class="btn_edit_asw" name=' + lst_count + '">edit</button></td>' +
            '<td class="col4"><button class="btn_del_asw" name= "' + lst_count + '">delete</button></td></tr>';
        $("#tbl_asw").append(element);
    }

    $(document).on("click", ".btn_edit_asw", function() {
        obj = parseInt($(this).attr("name"));
        var objtr = "#tr_" + obj;
        $("#txt_aws").val(lst_asw[obj][0].cnt_asw);
        $(".upd").css("display", "inline-block");
        $(".add").css("display", "none");

        $(".btn_edit_asw").css({ "opacity": "0.5", "pointer-events": "none" });
        $(".btn_del_asw").css({ "opacity": "0.5", "pointer-events": "none" });
        $(objtr).css({ 'background-color': 'rgb(24, 103, 192)', 'color': '#fff' })

    });

    $(document).on("click", "#btn_cancel_asw", function() {
        var objtr = "#tr_" + obj;
        $("#txt_aws").val("");
        $(".upd").css("display", "none");
        $(".add").css("display", "inline-block");
        $(".btn_edit_asw").css({ "opacity": "1", "pointer-events": "all" });
        $(".btn_del_asw").css({ "opacity": "1", "pointer-events": "all" });
        $(objtr).css({ 'background-color': '#fff', 'color': 'black' })
    });

    $(document).on("click", ".btn_upd_asw", function() {
        var objtr = "#tr_" + obj;
        lst_asw[obj][0].cnt_asw = $("#txt_aws").val();
        lst_asw[obj][0].upd_flg = "1";
        var objtd = "#td_" + obj;
        $(objtd).html($("#txt_aws").val());
        $("#txt_aws").val("");
        $(".upd").css("display", "none");
        $(".add").css("display", "inline-block");
        $(".btn_edit_asw").css({ "opacity": "1", "pointer-events": "all" });
        $(".btn_del_asw").css({ "opacity": "1", "pointer-events": "all" });
        $(objtr).css({ 'background-color': '#fff', 'color': 'black' })
    });

    $(document).on("click", ".btn_del_asw", function() {
        if (confirm('Bạn có đồng ý muốn xóa câu trả lời này không?')) {
            obj = parseInt($(this).attr("name"));
            var objtr = "#tr_" + obj;
            lst_asw[obj][0].del_flg = "1";
            $(objtr).remove();
        }
    });

    
    $(document).on("click", ".btn_save", function() {
        cnt = 0;
        for (var i = 0; i < lst_asw.length; i++) {
            if (lst_asw[i][0].del_flg == "0") {
                cnt++;
            }
        };
        if ($.trim($(".txt_qs").val()) == "") {
            alert("Vui lòng nhập thông tin câu hỏi khảo sát");
        } else if (cnt == 0) {
            alert("Vui lòng nhập thông tin câu trả lời");
        } else {
            $.ajax({
                async: false,
                type: "post",
                url: "../lib/cusv_manager.php",
                data: {
                    content_hdr: $.trim($(".txt_qs").val()),
                    id_hdr: id_hdr,
                    lst: lst_asw,
                    id_ct: $("#category_svcu").val(),
                    stt: status_sv,
                },
                success: function(result) {


                    GetDataSv(page_sv);

                    $(".container_ad_svcu").remove();
                    $(".list_ad_survey").css("display", "block");
                }
            });
        }
    });

    $(document).on("click", ".btn_del", function() {
        if (confirm('Bạn có đồng ý muốn xóa câu khảo sát này không?')) {
            $.ajax({
                async: false,
                type: "post",
                url: "../lib/cusv_manager.php",
                data: {
                    stt: "Del",
                    id_hdr: $(this).attr("name"),
                },
                success: function(result) {
                    GetDataSv(page_sv);

                }
            });
        }
    });

    $(document).on("click", ".btn_edit", function() {

        $(".list_ad_survey").css("display", "none");
        status_sv = "Upd";
        id_hdr = $(this).attr("name");
        InsertSv();
        $('#category_svcu  option[value="' + $("#" + $(this).attr("name")).attr("name") + '"]').prop("selected", true);

        $.ajax({
            async: false,
            type: "post",
            url: "../lib/cusv_manager.php",
            data: {
                GetRow: "1",
                id_hdr: $(this).attr("name"),
            },
            success: function(data) {
                $(".txt_qs").val(data.hdr_content);

                data.data.forEach(function(item) {
                    Add_Row(item.id, item.content, "1", );
                });
            }
        });
    });

    function GetDataUser(page)
    {
        $.ajax({
            async: false,
            type: "post",
            url: "../lib/user_manager_ajax.php",
            data: {
                getdata: "1",
                curentpage: page,
                limit: limit,
                fnd_content: fnd_content_us,
            },
            success: function(data) {
                ShowData_Us(data, page, limit);
            }
        });
    }

    function ShowData_Us(data, page, limit) {

        console.log(data);
        $(".nd_table_us").remove();
        $("#pg_dtl_us").remove();

        var element = "";
        var index_count = (page - 1) * limit + 1 ;
        var id = "";

        element = '<div class="nd_table_us">' +
                '<table cellpadding="10px" id="tbl_user"><tr>' +
                '<th class="ff">STT</th><th class="ff">Email</th><th class="ff">Họ</th>' +
                '<th class="ff">Tên</th><th class="ff">Giới tính</th><th colspan="2"></th></tr>';

        if (data != "err") {
            data.data.forEach(function(item) {
                element += '<tr id = "'+ item.uid +'"><td class="ff col1">'+index_count+'</td>' +
                '<td class="ff col_user">'+ item.uid+'</td>' + 
                '<td class="ff col_user">'+item.fname+'</td>' +
                '<td class="ff col_user">'+item.lname+'</td>' + 
               ' <td class="ff col4">'+item.gender+'</td>' +
                '<td class="col4"><button class="btn_edit_user">edit</button></td>' +
                '<td class="col4"><button class="btn_del_user">delete</button></td></tr>'  
                index_count++;
            });
        }
        element += '</table></div>';


        $("#nd_us").append(element);

        var paginationHtml = "";

        var totalPages = parseInt(data.total_page);
        curentpage = parseInt(data.current_page);
        if (curentpage == 1 || isNaN(curentpage)) {
            paginationHtml +=
                "<div id = 'pg_dtl_us'><li><a class='disabled' href=''><<</a></li><li><a class='disabled' href=''><</a></li>";
        } else {
            paginationHtml +=
                "<div id = 'pg_dtl_us'><li><a href='''><</a></li>";
        }

        for (var i = 1; i <= totalPages; i++) {
            if (i == curentpage) {
                paginationHtml += "<li><a class='active' href=''>" + i +
                    "</a></li>";
            } else {
                paginationHtml += "<li><a href=''>" + i + "</a></li>";
            }
        }
        if (curentpage == totalPages || isNaN(totalPages)) {
            paginationHtml +=
                "<li><a class='disabled' href=''>></a></li><li><a class='disabled' href=''>>></a></li></div>";
        } else {
            paginationHtml += "<li><a href=''>></a></li><li><a href=''>>></a></li></div>";
        }

        $("#pg_us").append(paginationHtml);
        window.scrollTo(0, 0);
    }
    $("#btn_find_user").click(function(e) {
        e.preventDefault();
        fnd_content_us = $("#txt_find_user").val();

        page_us = 1;
        GetDataUser(page_us);
    });
    
});
