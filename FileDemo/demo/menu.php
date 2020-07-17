<div id="Menu">
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <? if($isLogin == true) {?>
                <li id = "MenuListNV" ><a href="/listaccount.php">Danh sách tài khoản</a></li>
                <? } ?>
            </ul>
            <ul class="InfoLogin">
                <? if($isLogin != true) {?>
                <li id = "MenuLogin"><a href="./login.php">Đăng nhập</a></li>
                <li id = "MenuRegist"><a href="/regist.php">Đăng ký</a></li>
                <? } else {?>
                <li id = "user">Xin chào: <?echo $_SESSION['dataLogin']?></li>
                <li id = "MenuLogout"><a href="/logout.php">Đăng xuất</a></li>
                <? } ?>
            </ul>
    </div>