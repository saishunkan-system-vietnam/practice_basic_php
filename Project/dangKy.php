<?php
require('./config/router.php');
include(SITE_MENUTOP);
?>
<link rel="stylesheet" type="text/css" href=<?= FILE_CSS_REGIS ?>>
<body>
    <form id="myForm" action="" method="POST" onsubmit="return validateForm()">
        <div class="dk">
            <div class="regis">
                <h1>Đăng Ký</h1>
            </div>
            <div class="tt">
                <div class="fnamelb">
                    <label id="fnlb">User Name</label>
                </div>
                <div class="fnameip">
                    <input name="userName" id="userName" type="text" onkeypress="resetError('errUnlb')" onchange="resetError('errUnlb')" class="fip" placeholder="Nhập User Name">
                </div>
                <div class="errFnamelb">
                    <label id="errUnlb"></label>
                </div>
            </div>
            <div class="tt">
                <div class="fnamelb">
                    <label>Password</label>
                </div>
                <div class="fnameip">
                    <input name="passWorrd" id="passWorrd" onkeypress="resetError('errPwlb1')" onchange="resetError('errPwlb1')" type="password" class="fip" placeholder="Nhập Password">
                </div>
                <div class="errFnamelb">
                    <label id="errPwlb1"></label>
                </div>
            </div>
            <div class="tt">
                <div class="fnamelb" style="margin-top: 0px;">
                    <label>Nhập lại Password</label>
                </div>
                <div class="fnameip">
                    <input name="passWorrd2" id="passWorrd2" onkeypress="resetError('errPwlb2')" onchange="resetError('errPwlb2')" type="password" class="fip" placeholder="Nhập lại Password">
                </div>
                <div class="errFnamelb">
                    <label id="errPwlb2"></label>
                </div>
            </div>
            <div class="tt">
                <div class="fnamelb">
                    <label>Nhập Email</label>
                </div>
                <div class="fnameip">
                    <input name="email" id="email" onkeypress="resetError('errPwlb2')" onchange="resetError('errPwlb2')" type="email" class="fip" placeholder="Nhập Email">
                </div>
                <div class="errFnamelb">
                    <label id="errPwlb2"></label>
                </div>
            </div>
            <div class="tt">
                <input type="checkbox" value="1" id="xacnhan_dieukhoan" />Tôi chấp nhận điều khoản.
                <div style=" margin-top: 1px;">
                    <label style="color:red; text-align: left; font-size: 12px;" id="errXacNhan"></label>
                </div>
            </div>

            <div class="tt">
                <table>
                    <tr>
                        <td class="tdbtn">
                            <input class="btn" type="reset" onclick="resetForm()" value="Reset">
                        </td>
                        <td class="tdbtn">
                            <input class="btn" type="submit" name="regitse" value="Đăng ký">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</body>
<script src="./dangky.js"></script>
<?php
if (!$connect) {
    die('Kết nối không thành công!');
}
// Get value
if (isset($_POST['regitse'])) {
    $fName = $_POST['fullName'];
    $uName = $_POST['userName'];
    $pass = $_POST['passWorrd'];
    $email = $_POST['Email'];
    $sql = "INSERT INTO dangky (FullName, UserName, Password, Email)
        VALUES ('$fName', '$uName', '$pass', '$email')";
    if (mysqli_query($connect, $sql)) {
        echo "<script type='text/javascript'>alert('Chúc mừng bạn đã đăng ký thành công ');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
}
mysqli_close($connect);
?>
