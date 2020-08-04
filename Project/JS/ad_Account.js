$(document).ready(function() {

    search();
    getAccountById();
    updAccont();
    delAccount();

    function getAccountById() {
        $(document).on('click', '#btnEdit', function() {
            var id = $(this).attr('data-id');
            $.ajax({
                url: "./getAccountById.php",
                method: "POST",
                data: {
                    id
                },
                dataType: 'JSON',
                success: function(data) {
                    data.forEach(e => {
                        $("#account_id").val(e.id);
                        $("#upd_fullname").val(e.fullname);
                        (e.sex == 1) ? $("#male").prop("checked", true): $(
                            "#female").prop("checked", true);
                        $("#upd_bday").val(e.birthday);
                        $("#upd_phone").val(e.phone);
                        $("#upd_address").val(e.address);
                        $("#upd_role").val(e.role);
                        document.getElementById('upd_Account').style.display =
                            'block'
                    });
                }
            });
        })
    }

    function updAccont() {
        $(document).on('click', '#upd_Accountbtn', function() {
            var id = $.trim($("#account_id").val());
            var fullname = $.trim($('#upd_fullname').val());
            var sex = $.trim($("input[name='upd_sex']:checked").val());
            var phone = $.trim($('#upd_phone').val());
            var bday = $.trim($('#upd_bday').val());
            var address = $.trim($('#upd_address').val());
            var role = $.trim($("#upd_role").val());
            $.ajax({
                url: "./updAccount.php",
                method: "POST",
                data: {
                    id,
                    fullname,
                    sex,
                    phone,
                    bday,
                    address,
                    role
                },
                dataType: 'JSON',
                success: function(data) {
                    if (data.status == 'success') {
                        outputData();
                        document.getElementById('upd_Account').style.display = 'none';
                        alert("Bạn đã update thành công");
                    } else {
                        alert("Xảy ra lỗi vui lòng kiểm tra lại");
                    }
                }
            });

        })
    }

    function delAccount() {
        $(document).on('click', '#btnDelete', function() {
            var id = $(this).attr('data-id');
            $.ajax({
                url: "./delAccount.php",
                method: "POST",
                data: {id},
                dataType: 'JSON',
                success: function(data) {
                    if (data.status == 'success') {
                        outputData();
                        alert("Bạn đã xóa thành công");
                    } else {
                        alert("Xảy ra lỗi vui lòng kiểm tra lại");
                    }
                }
            });
        })
    }

    function search(){
        $.ajax({
            url: "./listAccount.php",
            method: "GET",
            data: { page : page, content : content
             },
            success: function(data) {
                console.log(data);
                $('tbody').html(data);
            }
        });
    }
    
    $(document).on('click', '#btnSearch', function() {    
        var cnt = ""       
                if($.trim($("#inpSearch").val()) != "")
                {
                    cnt = "&content=" + $.trim($("#inpSearch").val());
                }
                let newhref = "./account.php?page=" + 1 + cnt;
                window.location.href = newhref;
            });
    
            $('#pagination').on('click', 'a', function(e) { 
                e.preventDefault();
               
                let cnt = "";
                if(content != "")
                {
                    cnt = "&content=" + content;
                }

                let href ='./account.php' + $(this).attr("href");
            
                let newhref = href + cnt;
                window.location.href = newhref;
            });
});