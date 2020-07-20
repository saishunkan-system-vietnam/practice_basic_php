<?php
session_start();

include("./config.php");?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
    }

    .navbar {
        overflow: hidden;
        background-color: #333;
    }

    .navbar a {
        float: left;
        font-size: 16px;
        color: white;
        text-align: center;
        padding: 16px;
        text-decoration: none;
    }

    .navbar a:hover,
    .subnav:hover .subnavbtn {
        background-color: red;
    }
    </style>
</head>

<body>
    <div class="navbar">
        <div style="float: left; margin-left: 3px;">
            <img width="60px" height="46px" src="./img/logo.png" alt="">
        </div>
        <div><a href="./index.php">Trang chủ</a></div>
        <div><a href="./Danhsach.php">Thiết bị</a></div>
        <div><a href="./Danhsach.php">Giới thiệu</a></div>
        <div><a href="./Danhsach.php">Liên hệ</a></div>

        <?php
        if(isset($_REQUEST['type']) && $_REQUEST['type'] == 'logout'){
            // xóa session
            unset($_SESSION['txtUsername']);
            // Xóa cookie
            setcookie(cookie_login, '', time() - $cookie_time);
            echo "<div style='float: right;'>";
            echo "<a href='./Index.php'>Đăng Nhập</a>";
            echo "</div>";
            echo "<div style='float: right;'>";
            echo "<a href='./Index.php'>Đăng Ký</a>";
            echo "</div>";
        }
        else if(!isset($_COOKIE[cookie_login]) && !isset($_SESSION['txtUsername'])){
                echo "<div style='float: right;'>";
                echo "<a href='./Index.php'>Đăng Nhập</a>";
                echo "</div>";
                echo "<div style='float: right;'>";
            echo "<a href='./Index.php'>Đăng Ký</a>";
            echo "</div>";
        }
        else if(!isset($_SESSION['txtUsername']) ){
            $dataSaveUser = json_decode($_COOKIE[cookie_login], true);
            $_SESSION['txtUsername'] =  $dataSaveUser['usr'];
            echo "<div style='float: right;'>";
            echo "<a href='./Index.php?type=logout'>Đăng Xuất</a>";
            echo "</div>";
            echo "<div style='float: right;'>";
            echo "<a href=''>$_SESSION[txtUsername]</a>";
            echo "</div>";
        }
        else{
            echo "<div style='float: right;'>";
            echo "<a href='./Index.php?type=logout'>Đăng Xuất</a>";
            echo "</div>";
            echo "<div style='float: right;'>";
            echo "<a href=''>$_SESSION[txtUsername]</a>";
            echo "</div>";
        }
        ?>
    </div>
    </div>
    <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active"> <img
                        src="http://hocwebgiare.com/thiet_ke_web_chuan_demo/slide_banner/images/1.jpg" alt="Thiết kế 1">
                    <div class="carousel-caption">
                        <h1>Thiết kế 1</h1>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                            invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                    </div>
                </div>
                <div class="item"> <img src="http://hocwebgiare.com/thiet_ke_web_chuan_demo/slide_banner/images/2.jpg"
                        alt="Thiết kế 2">
                    <div class="carousel-caption">
                        <h1>Thiết kế 2</h1>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                            invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                    </div>
                </div>
                <div class="item"> <img src="http://hocwebgiare.com/thiet_ke_web_chuan_demo/slide_banner/images/3.jpg"
                        alt="Thiết kế 3">
                    <div class="carousel-caption">
                        <h1>Thiết kế 3</h1>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                            invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                    </div>
                </div>
            </div> <a class="left carousel-control" href="http://hocwebgiare.com/#myCarousel" data-slide="prev"> <span
                    class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right carousel-control"
                href="http://hocwebgiare.com/#myCarousel" data-slide="next"> <span
                    class="glyphicon glyphicon-chevron-right"></span> </a>
        </div>
    </div>

</body>


</html>