<?php
include("./theme.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css" />
    <title>Tìm hiểu html, css, Javascript cơ bản</title>
    
    <style>
    .tdbtn {
        width: 400px;
        text-align: center;
    }

    .btn {
        width: 100px;
        border-radius: 5px;
        transition-duration: 0.2s;
        color: black;
        background-color: white;
        border: 2px solid #4CAF50;
    }

    .btn:hover {
        background-color: #4CAF50;
        /* Green */
    }
    </style>
</head>

<body>
    <form id="myForm" action="" method="POST" onsubmit="return validateForm()" >
        <div class="dk">
            <div class="regis">
                <h1>Đăng Ký</h1>
            </div>
            <div class="tt">
                <div class="fnamelb">
                    <label id="fnlb">Full Name</label>
                </div>
                <div class="fnameip">
                    <input name="fullName" id="fullName" type="text" onkeypress="resetError('errFnlb')"
                        onchange="resetError('errFnlb')" class="fip" placeholder="Nhập Full Name" value="" >
                </div>
                <div class="errFnamelb">
                    <label id="errFnlb"></label>
                </div>
            </div>
            <div class="tt">
                <div class="fnamelb">
                    <label id="fnlb">User Name</label>
                </div>
                <div class="fnameip">
                    <input name="userName" id="userName" type="text" onkeypress="resetError('errUnlb')"
                        onchange="resetError('errUnlb')" class="fip" placeholder="Nhập User Name" >
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
                    <input name="passWorrd" id="passWorrd" onkeypress="resetError('errPwlb1')"
                        onchange="resetError('errPwlb1')" type="password" class="fip" placeholder="Nhập Password">
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
                    <input name="passWorrd2" id="passWorrd2" onkeypress="resetError('errPwlb2')"
                        onchange="resetError('errPwlb2')" type="password" class="fip" placeholder="Nhập lại Password">
                </div>
                <div class="errFnamelb">
                    <label id="errPwlb2"></label>
                </div>
            </div>
            <div class="tt">
                <div class="fnamelb">
                    <label>Giới tính</label>
                </div>
                <div class="fnameip" style="margin-top: 5px;">
                    <input name="gioitinh" checked type="radio" value="Nam" />Nam
                    <input name="gioitinh" type="radio" value="Nữ" />Nữ
                </div>
            </div>
            <div class="tt">
                <div class="fnamelb">
                    <label>Ngày sinh</label>
                </div>
                <div class="fnameip">
                    <input name="dob" style="width:150px;" type="date" class="fip">
                </div>
            </div>
            <div class="tt">
                <div class="fnamelb">
                    <label>Địa chỉ</label>
                </div>
                <div class="fnameip">
                    <textarea name="address" class="" cols="42" rows="5"></textarea>
                </div>
            </div>
            <div class="tt"></div>
            <div class="tt">
                <div class="fnamelb" style="margin-top: 10px;">
                    <label>Avatar</label>
                </div>
                <div class="fnameip" style="margin-top: 10px;">
                    <input type="file" class="fip" name="avatar" accept="image/png, image/jpeg">
                </div>
            </div>
            <div class="tt">
                <div class="fnamelb">
                    <label>Sở thích</label>
                </div>
                <div class="fnameip">
                    <input name="favourite" id="favourite" type="text" class="fip" placeholder="Nhập Sở thích">
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
                        <!-- <td class="tdbtn">
                            <input  class="btn" type="button" name="regitse" value="Danh sách DK" onClick="document.location.href='./DanhSach.php'"></input>
                        </td> -->
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
        $repass = $_POST['passWorrd2'];
        $gender = $_POST['gioitinh'] == "Nam"? 1:0;
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $avatar = $_POST['avatar'];
        $favourite = $_POST['favourite'];

        $sql = "INSERT INTO dangky (FullName, UserName, Password, RePassword, Gender, DOB, Address, Avatar, Favourite)
        VALUES ('$fName', '$uName', '$pass', '$repass', $gender, $dob, '$address', '$avatar', '$favourite')";
        if (mysqli_query($connect, $sql)) {
            echo "<script type='text/javascript'>alert('Chúc mừng bạn đã đăng ký thành công ');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }
        
    }
    mysqli_close($connect);
?>

</html>