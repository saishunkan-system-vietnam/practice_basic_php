<?php
require '../config/router.php';
require FILE_PHP_CONFIG;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Account</title>
    <link rel="stylesheet" href=<?= LINK_ICON ?>>
    <script src=<?= LINK_JQUERY ?>></script>
</head>

<body>
    <?php require FILE_PHP_HEADERAD ?>
    <?php
    $content = isset($_GET['content']) ?  $_GET['content'] : "";

    $item_per_page = 2;
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
    $offset = ($current_page - 1) * $item_per_page;
    $totalRecords =  $mysqli->query("SELECT * FROM t_account WHERE fullname  LIKE '%{$content}%'");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    ?>
    <script>
        var page = <?= $current_page ?>;
        var content = '<?= $content ?>';
    </script>

    <div class="main-content">
        <h1>Danh sách tài khoản</h1>
        <div class="search account">
            <div class="search"><label for="">Tìm kiếm theo tên: </label></div>
            <div class="search"><input type="text" class="inpSearch inp" id="inpSearch" placeholder="Nhập tên nhân viên"></div>
            <div class="search"><button class="btnSearch btn" id="btnSearch">Tìm kiếm</button></div>
        </div>
        <div class="clear-both"></div>

        <div class="divAdd">
            <a class="btnAdd btn"  onclick="openForm('regist')"><i class="fa fa-plus-circle"></i> Thêm mới </a>
        </div>

        <table class="table tableListAccount">
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
        <br>
        <div class="clear-both"></div>
        <?php require FILE_PHP_PAGINATION ?>
        <div class="clear-both"></div>
    </div>


    <div id="upd_Account" class="popup popupUpd">
        <form class="form_Upd formPopup" id="form_upd_Account" action="" method="POST">
            <div class="containerPopup containerUpd">
                <span onclick="closeForm('upd_Account')" class="Close CloseUpd" title="Close">&times;</span>
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
                <input type="text" name="upd_phone" placeholder="Nhập số đện thoại" id="upd_phone" pattern=<?= PATTERN_PHONE ?> required>

                <label><b>Địa chỉ</b></label>
                <input type="text" placeholder="Nhập địa chỉ" name="upd_address" id="upd_address" required>

                <label><b>Role</b></label>
                <input type="number" placeholder="Nhập Role" name="upd_role" id="upd_role" required>

                <button type="submit" class="btnUpd btn" id="upd_Accountbtn" name="upd_Accountbtn">Update</button>
            </div>
        </form>
    </div>

    <!-- Đăng ký tài khoản -->
    <div id="regist" class="popup popupRegist">
        <form class="form_regist formPopup" id="form_register" action="" method="POST">
            <div class="containerPopup containerRegist">
                <span onclick="closeForm('regist')" class="Close CloseRegist" title="Close">&times;</span>
                <h1>Đăng ký tài khoản</h1>
                <p>Xin vui lòng điện đầy đủ thông tin bên dưới.</p>
                <hr>
                <label for="fullname"><b>Họ và Tên</b></label>
                <input type="text" placeholder="Nhập Họ và Tên" name="fullname" id="fullname" required>

                <label for="sex"><b>Giới tính</b></label>
                <input type="radio" name="sex" value="1" checked />Nam
                <input type="radio" name="sex" value="0" />Nữ <br>

                <label for="bday"><b>Ngày sinh</b></label>
                <input type="date" name="bday" id="bday" required>

                <label for="phone"><b>Số điện thoại</b></label>
                <input type="text" name="phone" placeholder="Nhập số đện thoại" id="phone" pattern=<?= PATTERN_PHONE ?>required>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Nhập Email" name="email" id="email" pattern=<?= PATTERN_EMAIL ?> required>

                <label for="address"><b>Địa chỉ</b></label>
                <input type="text" placeholder="Nhập địa chỉ" name="address" id="address" required>

                <label for="psw"><b>Mật khẩu</b></label>
                <input type="password" placeholder="Nhập mật khẩu" name="password" id="password" pattern=<?= PATTERN_PASSWORD ?> title="Phải chứa ít nhất một số và một chữ hoa và chữ thường và ít nhất 8 ký tự trở lên" required>

                <label for="re_password"><b>Mật khẩu xác nhận</b></label>
                <input type="password" placeholder="Xác nhận mật khẩu" name="re_password" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required>

                <button type="submit" class="registbtn btn" id="registbtn" name="registbtn">Đăng Ký</button>
            </div>
        </form>
    </div>
    <script src=<?= FILE_JS_COMMON ?>></script>
    <script src=<?= FILE_JS_ACCOUNTAD ?>></script>
    <script src=<?= FILE_JS_REGISTER ?>></script>
</body>

</html>