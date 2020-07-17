<?php
session_start();

include("./config.php");?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        padding: 14px 16px;
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
        <!-- <div><a href="./index.php">Home</a></div> -->
        <div><a href="./Danhsach.php">Danh Sách</a></div>

        <?php
        if(isset($_REQUEST['type']) && $_REQUEST['type'] == 'logout'){
            // xóa session
            unset($_SESSION['txtUsername']);
            // Xóa cookie
            setcookie(cookie_login, '', time() - $cookie_time);
            echo "<div style='float: right;'>";
            echo "<a href='./Index.php'>Đăng Nhập</a>";
            echo "</div>";
        }
        else if(!isset($_COOKIE[cookie_login]) && !isset($_SESSION['txtUsername'])){
                echo "<div style='float: right;'>";
                echo "<a href='./Index.php'>Đăng Nhập</a>";
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

</body>

</html>