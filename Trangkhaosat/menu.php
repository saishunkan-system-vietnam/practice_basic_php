
    <?require_once('config/router.php')?>
    <?require_once('config/config.php')?>

    <link rel="stylesheet" href=<?= FILE_CSS_MENU?>>
    <link rel="stylesheet" href=<?= FILE_CSS_REGIST?>>
    <link rel="stylesheet" href=<?= FILE_CSS_LOGIN?>>
    <link rel="stylesheet" href=<?=FILE_CSS_STYLESHEET?>>
    <link href=<?="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"?> rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <div class="container">
        <nav>
            <ul class="mcd-menu main-menu">
                <a href="<?= SITE_URL?>">
                    <img class="logo" src="<?= FILE_IMG_LOGO?>">
                </a>
                <li class="main-menu">

                </li>
                <li class="main-menu">
                    <a href="<?= SITE_URL?>">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <strong>Trang chủ</strong>
                    </a>
                </li>
                <li class="main-menu">
                    <a href="<?= URL_LISTSURVEY?>" class="active">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                        <strong>Danh sách khảo sát</strong>
                    </a>
                </li>
                <li class="main-menu">
                    <a href="<?= URL_INTRODUCE?>">
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
                <?if($infoLogin){?>
                <li class="info-account last-menu">
                    <a href="#">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <strong><?=isset($_SESSION['dataLogin']) ? $_SESSION['dataLogin'] : "N/A"?></strong>
                    </a>
                    <ul>
                        <?if(!empty($_SESSION['admin_flg']) || $_SESSION['admin_flg'] == "1" ){ echo
                        ('<li><a href="'. SURVEY_MANAGER.'"><i class="fa fa-tachometer" aria-hidden="true"></i>'.
                          '<small>Quản trị dành cho Admin</small></a></li>'); }?>
                        <li>
                            <a href=<?= URL_LOGOUT?>>
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
                    <a href="" id="btn_menu_login">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                        <strong>Đăng Nhập</strong>
                    </a>
                </li>
                <?}?>
            </ul>
        </nav>
    </div>
    <div class="warpper_regist">
        <div class="main_regist">
            <h1>✍ Đăng ký tài khoản</h1>
            <form action="" method="post" id="frm_Regist">
                <p>
                    <input type="text" name="fname" placeholder="☞ Họ*" class="intpt" id="fname">
                </p>
                <p>
                    <input type="text" name="lname" placeholder="☞ Tên*" class="intpt" id="lname">
                </p>
                <p>
                    <input type="email" name="uid" placeholder="✉ Email*" class="intpt" id="uid">
                </p>
                <p>
                    <input type="email" name="ruid" placeholder="✉ Xác nhận Email*" class="intpt" id="ruid">
                </p>
                <p>
                    <input type="password" name="pass" placeholder="⌨ Mật khẩu*" class="intpt" id="pass">
                </p>
                <p>
                    <input type="password" name="rpass" placeholder="⌨ Xác nhận mật khẩu*" class="intpt" id="rpass">
                </p>
                <div class="gender">
                            <p>
                                <input type="radio" name="gender" value ="1" id="" checked> Nam
                                <input type="radio" name="gender" value ="2" id=""> Nữ
                                <input type="radio" name="gender" value ="0" id=""> Khác
                            </p>
                            </div>
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

    <div class="warpper_login" >
        <div class="main_login">
            <div><button type="button" class = "btn_close_login" id = "btn_close"><i class ="fa fa-close"></i></button></div>
            <h1>💻 Đăng Nhập</h1>
            <form action="" method="post" id="frm_login">
                <p>
                    <input type="email" name="uid" placeholder="✉ Email*" class="intpt_login"
                        id="uid_login">
                </p>
                <p>
                    <input type="password" name="pass" placeholder="⌨ Mật khẩu*" class="intpt" id="pass_login">
                </p>
                <div class="bott">
                    <p><input type="button" id="btnlogin" value="Login" class="btn fl"></p>
                </div>
                <div class="last">
                    <p><input type="checkbox" name="chksave" id="chksave"
                            class="checksave">
                        <label for="chksave">Lưu mật khẩu</label>
                        <br>
                        <a href="<?= URL_FORGOT_PASS?>" class="checksave">Quên mật khẩu</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script src=<?= FILE_JS_REGIST?>></script>
    <script src=<?= FILE_JS_LOGIN?>></script>
    <script src=<?= FILE_JS_COMMON?>></script>
    <script>
    $(document).ready(function () {
     $.ajax({
         type: "post",
         url: "./lib/statistic.php",
         success: function (response) {
         }
     });
    });
    </script>