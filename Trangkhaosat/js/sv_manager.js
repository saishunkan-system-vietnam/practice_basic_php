$(document).ready(function() {
    var lst_sv = [];
    var indextr = 0;
    var obj;
    var id_hdr;
    var id_cnt;
    var id_hdr_multi;
    var cnt_qs = 0;
    var cr_cnt_qs = 0;
    var status_sv;
    var ststus_us;
    var page_sv = 1;
    var page_us = 1;
    var category = "0";
    var fnd_content_sv = "";
    var fnd_content_us = "";
    var limit = 12;
    var uid = "";
    var form_regist = ".warpper_regist";

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
        var id_multi = "";
        var index_asw;
        var categr = "";

        element = '<div class="nd-table"> \n' +
            '<table cellpadding="10px" id="tbl">' +
            '<tr>\n' +
            '<th class="ff">STT</th>\n' +
            '<th class="ff">Loại khảo sát</th>\n' +
            '<th class="ff">Câu hỏi khảo sát</th>\n' +
            '<th class="ff">Lượt trả lời</th>\n' +
            '<th colspan="3"></th></tr>\n';
        if (data != "err") {
            data.data.forEach(function(item) {

                if (index != item.num_row) {

                    if (index != "N/A") {
                        element += '</ul></td>\n' +
                            '<td class="ff col">' + index_asw + '</td>\n' +
                            '<td class="col4"><button class="btn_report" multi = "' + id_multi + '" style = "background-color: rgb(24, 103, 192); color: #fb8c00" ' +
                            '><i class="fa fa-pie-chart" aria-hidden="true" style = "font-size: 23px"></i></button></td>\n' +
                            '<td class="col4"><button class="btn_edit" categr = "' + categr + '" multi = "' + id_multi +
                            '">edit\n' +
                            '</button></td>\n' +
                            '<td class="col4"><button class="btn_del" multi = "' + id_multi +
                            '">delete</button></td>\n' +
                            '</tr>\n';
                    }

                    element += '<tr>\n' +
                        '<td class="ff col1">' + stt_hdr + '</td>\n' +
                        '<td class="ff col2">' + item.category + '<span name = "' + item.id_category + '"></span></td>\n' +
                        '<td class="ff col3">' + item.content + ' <span class="crt_dt">(' + item
                        .create_datetime + ')</span>\n' +
                        '<ul>\n';

                    index = item.num_row;
                    stt_hdr++;
                    stt_dtl = 1;
                }

                if (id != item.id && stt_dtl != 1) {
                    stt_dtl = 1;
                    element += '</ul>' + item.content + ' <span class="crt_dt">(' + item.create_datetime + ')</span><ul>';
                }

                element += '<li><b>' + stt_dtl + '.</b>' + item.answer + '</li>';
                index_asw = item.index_asw;
                id = item.id;
                stt_dtl++;
                id_multi = item.id_multi;
                categr = item.id_category;
            });

            element += '</ul></td>\n' +
                '<td class="ff col">' + index_asw + '</td>\n' +
                '<td class="col4"><button class="btn_report" multi = "' + id_multi + '" style = "background-color: rgb(24, 103, 192); color: #fb8c00" ' +
                '><i class="fa fa-pie-chart" aria-hidden="true" style = "font-size: 23px"></i></button></td>\n' +
                '<td class="col4"><button class="btn_edit" categr = "' + categr + '" multi = "' + id_multi + '">edit\n' +
                '</button></td>\n' +
                '<td class="col4"><button class="btn_del" multi = "' + id_multi + '">delete</button></td>\n' +
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
            paginationHtml +=
                "<div id = 'pg_dtl'><li><a  href=''><<</a></li><li><a href=''><</a></li>";
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

    $("#pg").on("click", "a", function(e) {
        e.preventDefault();

        var page = $(this).text(),
            currentPage = parseInt($("#pg li a.active").text());

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

    $(document).on("keypress", '#txtfind', function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            $("#btn_find").trigger('click');
        }
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
        id_hdr_multi = id_hdr;
        cnt_qs = 1;
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
        lst_sv = [];

        if (status_sv == "Add") {
            lst_sv[cnt_qs] = { "cnt_qs": cnt_qs, "id_hdr": id_hdr, "db": 0, "status": "Add", "del_flg": 0, "dtl": [] };
            var element = '<div class="container_ad_svcu">' +
                '<div class="title">' +
                '<div class="content_ad_svcu" id = "content_ad_svcu">' +
                '<select name="category" id="category_svcu" style = "margin-bottom : 15px">' +
                option + '</select><br>' +
                '<div class = "cnd_qs" name = "' + cnt_qs + '" id = "cnd_qs' + cnt_qs + '">' +
                '<label for="txt_qs"><b>Câu hỏi:</b></label>' +
                '<input type="text" id="txt_qs' + cnt_qs + '" class = "txt_qs"><br>' +
                '<label for="txt_aws"><b>Câu trả lời:</b></label>' +
                '<input type="text" name= "txt_aws" cnt_qs = "' + cnt_qs + '" id="txt_aws' + cnt_qs + '" class = "txt_aws">' +
                '<button class="btn_ins_asw add' + cnt_qs + '" name ="' + cnt_qs + '" id = "btn_ins_asw' + cnt_qs + '" >Insert</button>' +
                '<button class="btn_upd_asw upd' + cnt_qs + '" name = "' + cnt_qs + '"  style = "display:none">Update</button>' +
                '<button class="btn_cancel_asw upd' + cnt_qs + '" name = "' + cnt_qs + '" style = "display:none">Cancel</button>' +
                '<table cellpadding = "10px" id ="tbl_asw' + cnt_qs + '">' +
                '<tr><th class="ff asw"> Câu trả lời</th><th colspan="2"></th></tr>' +
                '</table></div></div><div class="kq"><button class="btn_back" id="btn_back">Back</button>' +
                '<button class = "btn_ins_asw" id="btn_add_multi">Thêm câu hỏi</button>' +
                '<button class = "btn_save" id="btn_save">Save</button></div></div>';
            $("#warpper_ad_survey").append(element);
        } else {
            id_hdr = "";
            cnt_qs = 0;
            $.ajax({
                async: false,
                type: "post",
                url: "../lib/vs_manager_ajax.php",
                data: {
                    get_sv: 1,
                    id_multi: id_hdr_multi,
                },
                success: function(data) {

                    data.forEach(function(item) {

                        if (id_hdr == "") {
                            id_hdr = item.id_hdr;
                            cnt_qs++;
                            lst_sv[cnt_qs] = { "cnt_qs": cnt_qs, "id_hdr": id_hdr, "db": 1, "status": "Upd", "del_flg": 0, "dtl": [] };

                            let element = '<div class="container_ad_svcu">' +
                                '<div class="title">' +
                                '<div class="content_ad_svcu" id = "content_ad_svcu">' +
                                '<select name="category" id="category_svcu" style = "margin-bottom : 15px">' +
                                option + '</select><br>' +
                                '<div class = "cnd_qs" name = "' + cnt_qs + '" id = "cnd_qs' + cnt_qs + '">' +
                                '<label for="txt_qs"><b>Câu hỏi:</b></label>' +
                                '<input type="text"  id="txt_qs' + cnt_qs + '" class = "txt_qs"><br>' +
                                '<label for="txt_aws"><b>Câu trả lời:</b></label>' +
                                '<input type="text" name="txt_aws"  cnt_qs = "' + cnt_qs + '" id="txt_aws' + cnt_qs + '" class = "txt_aws">' +
                                '<button class="btn_ins_asw add' + cnt_qs + '" name ="' + cnt_qs + '" id = "btn_ins_asw' + cnt_qs + '">Insert</button>' +
                                '<button class="btn_upd_asw upd' + cnt_qs + '" name = "' + cnt_qs + '"  style = "display:none">Update</button>' +
                                '<button class="btn_cancel_asw upd' + cnt_qs + '" name = "' + cnt_qs + '" style = "display:none">Cancel</button>' +
                                '<table cellpadding = "10px" id ="tbl_asw' + cnt_qs + '">' +
                                '<tr><th class="ff asw"> Câu trả lời</th><th colspan="2"></th></tr>' +
                                '</table></div></div><div class="kq"><button class="btn_back" id="btn_back">Back</button>' +
                                '<button class = "btn_ins_asw" id="btn_add_multi">Thêm câu hỏi</button>' +
                                '<button class = "btn_save" id="btn_save">Save</button></div></div>';
                            $("#warpper_ad_survey").append(element);

                        } else {
                            id_hdr = item.id_hdr;
                            cnt_qs++;

                            lst_sv[cnt_qs] = { "cnt_qs": cnt_qs, "id_hdr": id_hdr, "db": 1, "status": "Upd", "del_flg": 0, "dtl": [] };

                            var element =
                                '<div class = "cnd_qs" name = "' + cnt_qs + '" id = "cnd_qs' + cnt_qs + '">' +
                                '   <br><br><label for="txt_qs"><b>Câu hỏi:</b></label>' +
                                '<input type="text" id="txt_qs' + cnt_qs + '" class = "txt_qs"><br>' +
                                '<label for="txt_aws"><b>Câu trả lời:</b></label>' +
                                '<input type="text" name="txt_aws"  cnt_qs = "' + cnt_qs + '" id="txt_aws' + cnt_qs + '" class = "txt_aws">' +
                                '<button class="btn_ins_asw add' + cnt_qs + '" name ="' + cnt_qs + '" id = "btn_ins_asw' + cnt_qs + '">Insert</button>' +
                                '<button class="btn_upd_asw upd' + cnt_qs + '" name = "' + cnt_qs + '" style = "display:none">Update</button>' +
                                '<button class="btn_cancel_asw upd' + cnt_qs + '" name = "' + cnt_qs + '" style = "display:none">Cancel</button>' +
                                '<table cellpadding = "10px" id ="tbl_asw' + cnt_qs + '">' +
                                '<tr><th class="ff asw"> Câu trả lời</th><th colspan="2"></th></tr>' +
                                '</table><button class = "btn_del_qs" name = "' + cnt_qs + '" style ="background-color: rgb(255, 82, 82)"><i class="fa fa-minus-circle" aria-hidden="true" style = "font-size: 23px"></i></button></div>';
                            $(".content_ad_svcu").append(element);
                        }

                        $.ajax({
                            async: false,
                            type: "post",
                            url: "../lib/cusv_manager.php",
                            data: {
                                GetRow: "1",
                                id_hdr: id_hdr,
                            },
                            success: function(data) {
                                $("#txt_qs" + cnt_qs).val(data.hdr_content);
                                cr_cnt_qs = cnt_qs;
                                data.data.forEach(function(item) {

                                    Add_Row(item.id, item.content, "1");
                                });
                            }
                        });
                    });
                }
            });

        }
    }

    $(document).on("click", "#btn_add_multi", function() {
        cnt_qs++;
        let d = new Date();
        id_hdr = Math.floor((Math.random() * 1000) + 1) + "/" + d.getTime();

        lst_sv[cnt_qs] = { "cnt_qs": cnt_qs, "id_hdr": id_hdr, "db": 0, "status": "Add", "del_flg": 0, "dtl": [] };

        var element =
            '<div class = "cnd_qs" name = "' + cnt_qs + '" id = "cnd_qs' + cnt_qs + '">' +
            '   <br><br><label for="txt_qs"><b>Câu hỏi:</b></label>' +
            '<input type="text" id="txt_qs' + cnt_qs + '" class = "txt_qs"><br>' +
            '<label for="txt_aws"><b>Câu trả lời:</b></label>' +
            '<input type="text" name="txt_aws"  cnt_qs = "' + cnt_qs + '" id="txt_aws' + cnt_qs + '" class = "txt_aws">' +
            '<button class="btn_ins_asw add' + cnt_qs + '" name ="' + cnt_qs + '" id = "btn_ins_asw' + cnt_qs + '">Insert</button>' +
            '<button class="btn_upd_asw upd' + cnt_qs + '" name = "' + cnt_qs + '" style = "display:none">Update</button>' +
            '<button class="btn_cancel_asw upd' + cnt_qs + '" name = "' + cnt_qs + '" style = "display:none">Cancel</button>' +
            '<table cellpadding = "10px" id ="tbl_asw' + cnt_qs + '">' +
            '<tr><th class="ff asw"> Câu trả lời</th><th colspan="2"></th></tr>' +
            '</table><button class = "btn_del_qs" name = "' + cnt_qs + '" style ="background-color: rgb(255, 82, 82)"><i class="fa fa-minus-circle" aria-hidden="true" style = "font-size: 23px"></i></button></div>';
        $(".content_ad_svcu").append(element);
    });

    $(document).on("keypress", '.txt_aws', function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            $("#btn_ins_asw" + $(this).attr("cnt_qs")).trigger('click');
        }
    });

    $(document).on("click", ".btn_ins_asw", function() {

        cr_cnt_qs = $(this).attr("name");

        if ($.trim($("#txt_aws" + cr_cnt_qs).val()) != "") {
            let d = new Date();
            let id = Math.floor((Math.random() * 1000) + 1) + "/" + d.getTime();
            Add_Row(id, $.trim($("#txt_aws" + cr_cnt_qs).val()), 0);
            $("#txt_aws" + cr_cnt_qs).val("");
        }
    });

    $(document).on("click", ".btn_del_qs", function() {
        cr_cnt_qs = $(this).attr("name");

        if (confirm("Bạn có chắc chắn muốn xóa câu hỏi này không?")) {
            lst_sv[cr_cnt_qs].del_flg = 1;
            lst_sv[cr_cnt_qs].status = "Del";

            $("#cnd_qs" + cr_cnt_qs).remove();
        }
    });

    function Add_Row(id, content, db) {
        indextr++;
        var td_asw = "td_" + indextr;
        var tr_asw = "tr_" + indextr;


        lst_sv[cr_cnt_qs].dtl[indextr] = { "cnt_asw": content, "id": id, "db": db, "upd_flg": 0, "del_flg": 0 };

        var element = '<tr id="' + tr_asw + '"><td class="ff asw" id="' + td_asw + '">' + content + '</td>' +
            '<td class="col4"><button class="btn_edit_asw" cnt_qs = "' + cr_cnt_qs + '" name="' + indextr + '">edit</button></td>' +
            '<td class="col4"><button class="btn_del_asw" cnt_qs = "' + cr_cnt_qs + '" name= "' + indextr + '">delete</button></td></tr>';
        $("#tbl_asw" + cr_cnt_qs).append(element);
    }

    $(document).on("click", ".btn_edit_asw", function() {
        obj = $(this).attr("cnt_qs");
        id_cnt = $(this).attr("name");
        var objtr = "#tr_" + id_cnt;

        $("#txt_aws" + obj).val(lst_sv[obj].dtl[id_cnt].cnt_asw);

        $(".upd" + obj).css("display", "inline-block");
        $(".add" + obj).css("display", "none");


        $(" .btn_edit_asw").css({ "opacity": "0.5", "pointer-events": "none" });
        $(".btn_del_asw").css({ "opacity": "0.5", "pointer-events": "none" });
        $(".btn_ins_asw, .btn_del_qs, .btn_back, .btn_save").css({ "opacity": "0.5", "pointer-events": "none" });
        $(objtr).css({ 'background-color': 'rgb(24, 103, 192)', 'color': '#fff' })
    });

    $(document).on("click", ".btn_cancel_asw", function() {
        var objtr = "#tr_" + id_cnt;
        $("#txt_aws" + obj).val("");
        $(".upd" + obj).css("display", "none");
        $(".add" + obj).css("display", "inline-block");
        $(".btn_edit_asw").css({ "opacity": "1", "pointer-events": "all" });
        $(".btn_del_asw").css({ "opacity": "1", "pointer-events": "all" });
        $(".btn_ins_asw, .btn_del_qs, .btn_back, .btn_save").css({ "opacity": "1", "pointer-events": "all" });
        $(objtr).css({ 'background-color': '#fff', 'color': 'black' })
    });

    $(document).on("click", ".btn_upd_asw", function() {
        var objtr = "#tr_" + id_cnt;
        lst_sv[obj].dtl[id_cnt].cnt_asw = $("#txt_aws" + obj).val();
        lst_sv[obj].dtl[id_cnt].upd_flg = 1;
        var objtd = "#td_" + id_cnt;
        $(objtd).html($("#txt_aws" + obj).val());
        $("#txt_aws" + obj).val("");
        $(".upd" + obj).css("display", "none");
        $(".add" + obj).css("display", "inline-block");

        $(".btn_edit_asw").css({ "opacity": "1", "pointer-events": "all" });
        $(".btn_del_asw").css({ "opacity": "1", "pointer-events": "all" });
        $(".btn_ins_asw, .btn_del_qs, .btn_back, .btn_save").css({ "opacity": "1", "pointer-events": "all" });
        $(objtr).css({ 'background-color': '#fff', 'color': 'black' })
    });

    $(document).on("click", ".btn_del_asw", function() {
        if (confirm('Bạn có đồng ý muốn xóa câu trả lời này không?')) {
            obj = $(this).attr("cnt_qs");
            id_cnt = $(this).attr("name");
            var objtr = "#tr_" + id_cnt;
            lst_sv[obj].dtl[id_cnt].del_flg = 1;

            $(objtr).remove();
        }
    });


    $(document).on("click", "#btn_save", function() {

        var cnt_hdr = lst_sv.filter(function(item) { return (item.del_flg != 1 || item.db != 0) });

        var check = true;
        cnt_hdr.forEach(function(item) {

            $("#txt_qs" + item.cnt_qs).css("border-bottom", "1.4px solid rgb(24, 103, 192)");
            $("#tbl_asw" + item.cnt_qs).css("border", "none");

            if ($.trim($("#txt_qs" + item.cnt_qs).val()) == "" && item.del_flg == 0) {
                check = false;
                $("#txt_qs" + item.cnt_qs).css("border-bottom", "2px solid red")
            }
            if (item.dtl.filter(function(item) { return (item.del_flg != 1 || item.db != 0) }).length == 0 && item.del_flg == 0) {
                check = false;
                $("#tbl_asw" + item.cnt_qs).css("border", "2px solid red");
            }
        });

        if (!check) {
            alert("Thông tin không đầy đủ - Vui lòng kiểm tra lại");
        } else {
            cnt_hdr.forEach(function(item) {

                var cnt_dtl = item.dtl.filter(function(item) { return (item.del_flg != 1 || item.db != 0) });
                $.ajax({
                    async: false,
                    type: "post",
                    url: "../lib/cusv_manager.php",
                    data: {
                        content_hdr: $.trim($("#txt_qs" + item.cnt_qs).val()),
                        id_hdr_multi: id_hdr_multi,
                        id_hdr: item.id_hdr,
                        lst: cnt_dtl,
                        id_ct: $("#category_svcu").val(),
                        stt: item.status,
                    },
                    success: function(result) {}
                });


            });

            GetDataSv(page_sv);

            $(".container_ad_svcu").remove();
            $(".list_ad_survey").css("display", "block");

        }
    });

    $(document).on("click", ".btn_del", function() {
        if (confirm('Bạn có đồng ý muốn xóa câu khảo sát này không?')) {
            $.ajax({
                async: false,
                type: "post",
                url: "../lib/cusv_manager.php",
                data: {
                    del_all: 1,
                    id_multi: $(this).attr("multi"),
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
        id_hdr_multi = $(this).attr("multi");
        InsertSv();
        $('#category_svcu  option[value="' + $(this).attr("categr")).prop("selected", true);
    });

    $(document).on("click", ".btn_report", function() {
        $('.main_report').remove();
        id_multi = $(this).attr("multi");
        var title = '';
        var obj = $('#showrp')[0];
        var content = [
            ['Task', 'Aswwere']
        ];
        var id_hdr = "";
        var element = "";
        var index = 0;
        $.ajax({
            async: false,
            type: "post",
            url: "../lib/vs_manager_ajax.php",
            data: {
                id_multi: id_multi,
                report: 1,
            },
            success: function(data) {
                data.forEach(function(item) {

                    if (id_hdr != item.id) {
                        index++;
                        if (index == 1) {
                            element = '<div class="main_report"><button class="btn_close"><i class ="fa fa-close"></i></button><br>' +
                                '<div id ="btn_close"><br><h1>THỐNG KÊ KHẢO SÁT</h1></div>' +
                                '<div id = "showrp' + index + '"></div></div>';
                            $('.warpper_report').append(element);
                        } else {

                            drawChart(title, content, obj);
                            element = '<div id = "showrp' + index + '">';
                            $('.main_report').append(element);
                        }

                        content = [
                            ['Task', 'Aswwere']
                        ];
                        title = item.content;
                        obj = $('#showrp' + index)[0];
                        id_hdr = item.id;
                    }

                    content.push([item.answer, parseInt(item.indexasw)]);
                });
            }
        });
        drawChart(title, content, obj);
        $(".warpper_report").css("visibility", "visible");
    });

    $(document).on("click", ".btn_close", function(e) {
        e.preventDefault();
        $(".warpper_report").css("visibility", "hidden");
    });

    function drawChart(title, content, obj) {
        var data = google.visualization.arrayToDataTable(content);

        var options = {
            // height: 300,
            sliceVisibilityThreshold: 0,
            width: 400,
            'title': title,
            is3D: true,
        };






        var chart = new google.visualization.PieChart(obj);
        chart.draw(data, options);
    }

    function GetDataUser(page) {
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

        $(".nd_table_us").remove();
        $("#pg_dtl_us").remove();

        var element = "";
        var index_count = (page - 1) * limit + 1;
        // var id = "";

        element = '<div class="nd_table_us">' +
            '<table cellpadding="10px" id="tbl_user"><tr>' +
            '<th class="ff">STT</th><th class="ff">Email</th><th class="ff">Họ</th>' +
            '<th class="ff">Tên</th><th class="ff">Giới tính</th><th class="ff">Admin</th><th colspan="2"></th></tr>';

        if (data != "err") {
            data.data.forEach(function(item) {
                element += '<tr"><td class="ff col1">' + index_count + '</td>' +
                    '<td class="ff col_user">' + item.uid + '</td>' +
                    '<td class="ff col_user">' + item.fname + '</td>' +
                    '<td class="ff col_user">' + item.lname + '</td>' +
                    ' <td class="ff col4">';
                let gender = "";
                switch (item.gender) {
                    case "1":
                        gender = "Nam";
                        break;
                    case "2":
                        gender = "Nữ";
                        break;
                    default:
                        gender = "Khác";
                        break;

                }
                element += gender + '</td>' +
                    '<td class="ff col4">' + item.admin + '</td>' +
                    '<td class="col4"><button class="btn_edit_user" name = "' + item.uid + '">edit</button></td>' +
                    '<td class="col4"><button class="btn_del_user" name = "' + item.uid + '">delete</button></td></tr>'
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
                "<div id = 'pg_dtl_us'><li><a  href=''><<</a></li><li><a href=''><</a></li>";
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

    $(document).on("keypress", '#txt_find_user', function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            $("#btn_find_user").trigger('click');
        }
    });

    $("#btn_find_user").click(function(e) {
        e.preventDefault();
        fnd_content_us = $("#txt_find_user").val();

        page_us = 1;
        GetDataUser(page_us);
    });

    $("#pg_us").on("click", "a", function(e) {
        e.preventDefault();

        var page = $(this).text(),
            currentPage = parseInt($("#pg_us li a.active").text());

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

        fnd_content_us = $("#txt_find_user").val();
        page_us = newPage;
        GetDataUser(page_us);
        return false;
    });

    $(document).on("click", ".btn_edit_user", function(e) {
        uid = $(this).attr("name");
        ststus_us = "Get";
        $.ajax({
            async: false,
            type: "post",
            url: "../lib/regist_ajax.php",
            data: {
                uid: uid,
                proc: ststus_us,
            },
            success: function(data) {
                data.forEach(function(item) {
                    let gender = item.gender;
                    var element = '<div class="warpper_regist">' +
                        '<div class="main_regist">' +
                        '<p><input type="email" name="uid" placeholder="✉ Email*" class="intpt" id="uid" readonly value = "' + item.uid + '"></p>' +
                        '<p><input type="text" name="fname" placeholder="☞ Họ*" class="intpt" id="fname" value = "' + item.fname + '"></p>' +
                        '<p><input type="text" name="lname" placeholder="☞ Tên*" class="intpt" id="lname" value = "' + item.lname + '"></p>' +
                        '<p><input type="password" name="pass" placeholder="⌨ Mật khẩu*" class="intpt" id="pass" value = "' + item.pass + '"></p>' +
                        '<div class="gender"><p>' +
                        '<input type="radio" name="gender" value="1" ';
                    if (gender == 1) { element += 'checked'; }
                    element += '> Nam' +
                        '<input type="radio" name="gender" value="2"';
                    if (gender == 2) { element += 'checked'; }
                    element += '> Nữ' +
                        '<input type="radio" name="gender" value="3"';
                    if (gender == 3) { element += 'checked'; }
                    element += '> Khác </p></div>' +
                        '<p><input type="tel" name="tel" placeholder="☎ Số điện thoại*" class="intpt" id="tel" value = "' + item.tel + '"></p>' +
                        '<div class="admin_flg"><p><input type="checkbox" id = "admin_flg"';
                    if (item.admin_flg == "1") { element += "checked"; }
                    element += '>Admin</p></div>' +
                        '<div class="bott"><button id="btn_save_us" class="btn_save btn_account">Lưu</button>' +
                        '<button id="btn_cancel_us" class="btn_cancel_us btn_account">Hủy</button></div>' +
                        '</div></div>';

                    $('#account').append(element);
                    $(form_regist).css("visibility", "visible");
                });
            }
        });
        ststus_us = "Upd";
    });

    $(document).on("click", "#btn_cancel_us", function() {
        $(".warpper_regist").remove();
    })

    $(document).on("click", "#btn_save_us", function() {

        if (ststus_us == "Upd") {
            if (Validate_regist(false)) {
                if (Save_account()) {
                    alert("Update thành công");
                    $(".warpper_regist").remove();
                    GetDataUser(page_us);
                } else {
                    alert("Lỗi");
                }
            } else {
                alert("Vui lòng điền vào mẫu chính xác");
            }
        } else if (ststus_us == "Regist") {
            if (Validate_regist(false)) {
                let isExist = CheckExist();
                if (isExist == 0) {
                    if (Save_account()) {
                        alert("Đăng ký thành công");
                        $(".warpper_regist").remove();
                        page_us = 1;
                        GetDataUser(page_us);
                    } else {
                        alert("Đăng ký thất bại");
                    }
                } else if (isExist > 0) {
                    alert("Không thể đăng ký vì email này đã tồn tại - Vui lòng kiểm tra lại");
                } else {
                    alert("Connection failed: Không thể kết nối đến máy chủ!");
                }
            } else {
                alert("Vui lòng điền vào mẫu chính xác");
            }
        }

    });

    function CheckExist() {

        var result;
        $.ajax({
            async: false,
            type: "post",
            url: "../lib/regist_ajax.php",
            data: {
                uid: $.trim($("#uid").val()),
                proc: "CheckExistAccount",
            },
            datatype: "JSON",
            success: function(data) {
                result = data[0].result;
            },
        });

        return result;

    }

    function Save_account() {
        var result = false;
        let admin_flg = $('#admin_flg').is(":checked") ? 1 : 0;
        $.ajax({
            async: false,
            type: "post",
            url: "../lib/regist_ajax.php",
            data: {
                uid: $.trim($("#uid").val()),
                fname: $.trim($("#fname").val()),
                lname: $.trim($("#lname").val()),
                pass: $.trim($("#pass").val()),
                tel: $.trim($("#tel").val()),
                gender: $("input[name='gender']:checked").val(),
                admin_flg: admin_flg,
                proc: ststus_us,
            },
            success: function(data) {
                result = data;
            }
        });
        return result;
    }

    $(document).on("click", "#btn_ins_user", function() {

        var element = '<div class="warpper_regist">' +
            '<div class="main_regist">' +
            '<p><input type="email" name="uid" placeholder="✉ Email*" class="intpt" id="uid"></p>' +
            '<p><input type="text" name="fname" placeholder="☞ Họ*" class="intpt" id="fname" ></p>' +
            '<p><input type="text" name="lname" placeholder="☞ Tên*" class="intpt" id="lname" ></p>' +
            '<p><input type="password" name="pass" placeholder="⌨ Mật khẩu*" class="intpt" id="pass" ></p>' +
            '<div class="gender"><p>' +
            '<input type="radio" name="gender" value="1" checked> Nam' +
            '<input type="radio" name="gender" value="2"> Nữ' +
            '<input type="radio" name="gender" value="3"> Khác </p></div>' +
            '<p><input type="tel" name="tel" placeholder="☎ Số điện thoại*" class="intpt" id="tel"></p>' +
            '<div class="admin_flg"><p><input type="checkbox" name="" id="admin_flg">Admin</p></div>' +
            '<div class="bott"><button id="btn_save_us" class="btn_save btn_account">Lưu</button>' +
            '<button id="btn_cancel_us" class="btn_cancel_us btn_account">Hủy</button></div>' +
            '</div></div>';

        $('#account').append(element);
        $(form_regist).css("visibility", "visible");
        ststus_us = "Regist";
    });

    $(document).on("click", ".btn_del_user", function() {
        if (confirm('Bạn có đồng ý muốn xóa tài khoản này không?')) {
            let uid = $(this).attr("name");
            $.ajax({
                async: false,
                type: "post",
                url: "../lib/regist_ajax.php",
                data: {
                    proc: "Del",
                    uid: uid,
                },
                success: function(resulf) {}
            });
        }
        GetDataUser(page_us);
    });
});