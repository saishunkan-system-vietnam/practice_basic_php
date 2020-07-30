<?php require '../config/config.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<style>
* {
    box-sizing: border-box
}

/* The Modal (background) */
.popup_upd {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
    padding-top: 60px;
    padding-left: 25%;
    padding-right: 25%;
}

/* Modal Content/Box */
.form_upd_Account {
    background-color: #fefefe;
    margin: 5% auto 15% auto;
    /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%;
    /* Could be more or less, depending on screen size */
}


/* Full-width input fields */
input[type=text],
input[type=date],
input[type=number] {
    width: 100%;
    padding: 8px;
    margin: 5px 0px 10px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus,
input[type=date]:focus {
    background-color: #ddd;
    outline: none;
}

input[type=radio] {
    margin: 5px 0px 15px 0;
}

h1 {
    color: red;
    text-align: center;
}

hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

.upd_Account_tbtn {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    border: none;
}

/* Extra styles for the cancel button */
.cancel {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancel,
.upd_Account_tbtn {
    float: left;
    width: 50%;
    border: none;
}

/* Add padding to container elements */
.upd_container {
    padding: 16px;
}

/* Clear floats */
.upd_Account_clearfix::after {
    content: "";
    clear: both;
    display: table;
}

.upd_Account_close {
    float: right;
    right: 25px;
    color: #000;
    font-size: 45px;
    font-weight: bold;
}

.upd_Account_close:hover,
.upd_Accountt_close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {
        -webkit-transform: scale(0)
    }

    to {
        -webkit-transform: scale(1)
    }
}

@keyframes animatezoom {
    from {
        transform: scale(0)
    }

    to {
        transform: scale(1)
    }
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
        display: block;
        float: none;
    }

    .cancel {
        width: 100%;
    }
}
</style>

<body>
    <div class="container" style="margin-top: 30px;">
        <h3 align="center" style="margin-bottom: 20px;">Danh sách tài khoản</h3>
        <table class="table" border="1 soid">
            <thead>
                <tr>
                    <th>Họ và Tên</th>
                    <th>Giới tính</th>
                    <th>Ngày Sinh</th>
                    <th>Điện Thoại</th>
                    <th>Email</th>
                    <th>Địa Chỉ</th>
                    <th>Mật Khẩu</th>
                    <th>Del_Flg</th>
                    <th>Role</th>
                    <th><a>Edit</a></th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    <div id="upd_Account" class="popup_upd">
        <form class="form_upd_Account animate" id="form_upd_Account" action="" method="POST"
            style="border:1px solid #ccc">
            <div class="upd_container">
                <span onclick="document.getElementById('upd_Account').style.display='none'" class="upd_Account_close"
                    title="Close">&times;</span>
                <h1>Update tài khoản</h1>
                <hr>
                <input type="hidden" name="account_id" id="account_id" required>
                <label><b>Họ và Tên</b></label>
                <input type="text" placeholder="Nhập Họ và Tên" name="upd_fullname" id="upd_fullname" required>

                <label><b>Giới tính</b></label>
                <input type="radio" name="upd_sex" id="male" value="1" />Nam
                <input type="radio" name="upd_sex" id="female" value="0" />Nữ <br>

                <label><b>Ngày sinh</b></label>
                <input type="date" name="upd_bday" id="upd_bday" required>

                <label><b>Số điện thoại</b></label>
                <input type="text" name="upd_phone" placeholder="Nhập số đện thoại" id="upd_phone"
                    pattern=<?= PATTERN_PHONE ?> required>

                <label><b>Địa chỉ</b></label>
                <input type="text" placeholder="Nhập địa chỉ" name="upd_address" id="upd_address" required>

                <label><b>Role</b></label>
                <input type="number" placeholder="Nhập Role" name="upd_role" id="upd_role" required>

                <div class="upd_Account_clearfix">
                    <button type="button" onclick="document.getElementById('upd_Account').style.display='none'"
                        class="cancel">Cancel</button>
                    <button type="submit" class="upd_Account_tbtn" id="upd_Accountbtn"
                        name="upd_Accountbtn">Update</button>
                </div>
            </div>
        </form>
    </div>

    <script>
    $(document).ready(function() {

        outputData();
        getAccountById();
        updAccont();


        function outputData() {
            $.ajax({
                url: "./listAccount.php",
                method: "GET",
                success: function(data) {
                    $('tbody').html(data);
                }
            });
        }

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
                var id          = $.trim($("#account_id").val());
                var fullname    = $.trim($('#upd_fullname').val());
                var sex         = $.trim($("input[name='upd_sex']:checked").val());
                var phone       = $.trim($('#upd_phone').val());
                var bday        = $.trim($('#upd_bday').val());
                var address     = $.trim($('#upd_address').val());
                var role       = $.trim($("#upd_role").val());
                $.ajax({
                    url: "./updAccount.php",
                    method: "POST",
                    data: {
                      id ,     
                      fullname,
                      sex,     
                      phone,  
                      bday,    
                      address, 
                      role      
                    },
                    dataType: 'JSON',
                    success: function(data) {
                      if(data.status=='success')
                      {
                        outputData();
                        document.getElementById('upd_Account').style.display ='none';
                        alert("Bạn đã update thành công");                      
                      }
                      else{
                        alert("Xảy ra lỗi vui lòng kiểm tra lại"); 
                      }
                    }
                });

            })
        }

    });
    </script>
</body>

</html>