<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Menu</title>

    <link rel="stylesheet" href="stylesheet.css?<?time()?>">
    <link rel="stylesheet" href="./css/menu.css?<?time()?>">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
     integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
                    <a href="./regist.php">
                        <i class="fa fa-registered" aria-hidden="true"></i>
                        <strong>Đăng ký</strong>
                    </a>
                </li>
                <li class="info-account">
                    <a href="./login.php">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                        <strong>Đăng Nhập</strong>
                    </a>
                </li>
                <?}?>
            </ul>
        </nav>
    </div>
</body>

</html>