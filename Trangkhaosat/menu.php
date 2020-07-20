<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Menu</title>

    <link rel="stylesheet" href="stylesheet.css?<?time()?>">
    <link rel="stylesheet" href="./css/menu.css?<?time()?>">
    <link rel="stylesheet" href="./css/regist.css?<?time()?>">
    <link rel="stylesheet" href="./css/login.css?<?time()?>">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="./js/regist.js?<?time()?>"></script>
    <script src="./js/login.js?<?time()?>"></script>
</head>

<body>
    <?$infoLogin = false?>
    <div class="container">
        <nav>
            <ul class="mcd-menu">
                <li class="main-menu">
                    <a href="index.php">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <strong>Trang chủ</strong>
                    </a>
                </li>
                <li class="main-menu">
                    <a href="#" class="active">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                        <strong>Danh sách khảo sát</strong>
                    </a>
                </li>
                <li class="main-menu">
                    <a href="#">
                        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                        <strong>Giới thiệu</strong>
                    </a>
                </li>
                <li class="main-menu">
                    <a href="#">
                        <i class="fa fa-hand-o-down" aria-hidden="true"></i>
                        <strong>Liên hệ</strong>
                    </a>
                </li>
                <!--Menu bên phải-->
                <?if($infoLogin){?>
                <li class="info-account">
                    <a href="#">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <strong><?=isset($_SESSION['InfoLogin']) ? $_SESSION['InfoLogin'] : "N/A"?></strong>
                    </a>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <small>Chỉnh sửa thông tin</small>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                <small>Đăng xuất</small>
                            </a>
                        </li>
                    </ul>
                </li>
                <?}?>
                <?if($infoLogin == false){?>
                <li class="info-account">
                    <a href="" id="btn_menu_regist">
                        <i class="fa fa-registered" aria-hidden="true"></i>
                        <strong>Đăng ký</strong>
                    </a>

                </li>
                <li class="info-account">
                    <a href="" id = "btn_menu_login">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                        <strong>Đăng Nhập</strong>
                    </a>
                </li>
                <?}?>
            </ul>
        </nav>
    </div>

    <div class="warpper">
        <div class="main">
            <h1>✍ Đăng ký tài khoản</h1>
            <form action="" method="post" id="frm_Regist">
                <!-- input Họ -->
                <p>
                    <input type="text" name="fname" placeholder="☞ Họ*" class="intpt" id="fname">
                </p>

                <!-- input tên -->
                <p>
                    <input type="text" name="lname" placeholder="☞ Tên*" class="intpt" id="lname">
                </p>

                <!-- input Email -->
                <p>
                    <input type="email" name="uid" placeholder="✉ Email*" class="intpt" id="uid">
                </p>

                <!-- input Xác nhận email -->
                <p>
                    <input type="email" name="ruid" placeholder="✉ Xác nhận Email*" class="intpt" id="ruid">
                </p>

                <!-- input Mật khẩu -->
                <p>
                    <input type="password" name="pass" placeholder="⌨ Mật khẩu*" class="intpt" id="pass">
                </p>

                <!-- input Xác nhận mật khẩu -->
                <p>
                    <input type="password" name="rpass" placeholder="⌨ Xác nhận mật khẩu*" class="intpt" id="rpass">
                </p>

                <!-- input Số điện thoại -->
                <p>
                    <input type="tel" name="tel" placeholder="☎ Số điện thoại*" class="intpt" id="tel">
                </p>
                <div class="bott">
                    <p><input type="button" id="btnregist" value="Đăng ký" class="btn fl"></p>
                    <p><input type="button" id="CloseRegist" value="Hủy" class="btn fr"></p>
                </div>
            </form>
        </div>
    </div>

    <div class="warpper_login">
        <div class="main_login">
            <h1>💻 Đăng Nhập</h1>
            <form action="" method="post" id="frm_login">
                <!-- input Email -->
                <p>
                    <input type="email" name="uid" placeholder="✉ Email*" class="intpt_login" id="uid">
                </p>
                <!-- input Mật khẩu -->
                <p>
                    <input type="password" name="pass" placeholder="⌨ Mật khẩu*" class="intpt" id="pass">
                </p>
                <div class="bott">
                    <p><input type="button" id="btnregist" value="Login" class="btn fl"></p>
                </div>
                <div class="cuoi">
                    <p><input type="checkbox" name="chksave" id="chksave" class="checksave">
                        <label for="chksave">Lưu mật khẩu</label>
                        <br>
                        <a href="" class="checksave">Quên mật khẩu</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>