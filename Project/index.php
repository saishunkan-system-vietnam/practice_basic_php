<?php 
    session_start(); 
    require 'config.php';

    // Kiểm tra SESSION
    if(empty($_SESSION[SESSION_USERNAME])) {
        if(isset($_COOKIE[COOKIE_USERNAME])){
            $_SESSION[SESSION_USERNAME] = $_COOKIE[COOKIE_USERNAME];
        }    
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngô Tá Sinh</title>
</head>

<body>
    <nav>
        <ul>
            <li id="active"><a href="#"><i class="fa fa-home"></i>&nbsp;Trang chủ</a></li>
            <li><a href=""><i class="fa fa-th-large" aria-hidden="true"></i>&nbsp;Sản Phẩm</a></li>
            <li><a href=""><i class="fa fa-share-alt" aria-hidden="true"></i>&nbsp;Giới thiệu</a></li>
            <li><a href=""><i class="fa fa-fw fa-envelope"></i>&nbsp;Liên hệ</a></li>
            <li style="float: right;">
                <?php
                    if (!isset($_SESSION[SESSION_USERNAME])) {
                        echo "<a class=\"login-window button\" href=\"#login-box\"><i class=\"fa fa-fw fa-user\"></i>&nbsp;Đăng Nhập</a>";
                        echo "<a class=\"registration button\" href=\"register.php\"><i class=\"fa fa-address-card\" aria-hidden=\"true\"></i></i>&nbsp;Đăng Kí</a>";
                    }
                    else{
                        echo "<a href=\"login.php?type=logout\">Đăng xuất &emsp;</a>";
                        echo "<a href=\"\">";
                        echo "Xin chào: ".$_SESSION[SESSION_USERNAME];
                        echo "</a>";
                    }
                ?>
            </li>
        </ul>
    </nav>

    <!-- Slideshow container -->
    <div class="slideshow-container">

        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="./IMG/img1.png" style="width:100%">
            <div class="text">Caption Text</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="./IMG/img2.png" style="width:100%">
            <div class="text">Caption Two</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="./IMG/img3.jpg" style="width:100%">
            <div class="text">Caption Three</div>
        </div>

    </div>
    <br>

    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <!-- Đăng nhập -->
    <div class="login" id="login-box">Đăng nhập

        <a class="close" href="#"><img class="img-close" title="Close Window" alt="Close" src="close.png" /></a>
        <form class="login-content" action="#" method="post"><label class="username">
                <span>Tên đăng nhập</span>
                <input id="username" type="text" autocomplete="on" name="username" placeholder="Username" value="" />
            </label>
            <label class="password">
                <span>Mật khẩu</span>
                <input id="password" type="password" name="password" placeholder="Password" value="" />
            </label>
            <button class="button submit-button" type="button">Đăng nhập</button>

            <a class="forgot" href="#">Quên mật khẩu?</a></form>
    </div>

    <div class="tieude">
        <p>Đăng kí nhân viên</p>
    </div>

    <div class="myform">
        <form action="process.php" method="POST" name="insert" onsubmit="return validateForm()">
            <div class="row">
                <div class="span">
                    <span>Họ Tên:</span>
                </div>
                <div class="input">
                    <input class="input" type="text" placeholder="Nhập họ và tên" id="uname" name="uname"
                        onclick="resetError('labelUName')">
                </div>
                <div class="error">
                    <label id="labelUName"></label>
                </div>
            </div>
            <div class="row">
                <div class="span">
                    <span>Giới tính:</span>
                </div>
                <div class="input">
                    <input name="sex" type="radio" value="1" checked />Nam
                    <input name="sex" type="radio" value="0" />Nữ
                </div>
            </div>
            <div class="row">
                <div class="span">
                    <span>Ngày Sinh:</span>
                </div>
                <div class="input">
                    <input type="date" id="bday" name="bday" onclick="resetError('labelBDay')">
                </div>
                <div class="error">
                    <label id="labelBDay"></label>
                </div>
            </div>
            <div class="row">
                <div class="span">
                    <span>Số năm kinh nghiệm:</span>
                </div>
                <div class="input">
                    <input type="number" id="skill" name="skill" value="0" onclick="resetError('labelskill')">
                </div>
                <div class="error">
                    <label id="labelskill"></label>
                </div>
            </div>
            <div class="row">
                <div class="span">
                    <span>Mail:</span>
                </div>
                <div class="input">
                    <input type="text" placeholder="Nhập Mail" id="mail" name="mail" onclick="resetError('labelMail')">
                </div>
                <div class="error">
                    <label id="labelMail"></label>
                </div>
            </div>
            <div class="row">
                <div class="span">
                    <span>Địa Chỉ:</span>
                </div>
                <div class="input">
                    <textarea id="address" name="address" rows="3" placeholder="Nhập địa chỉ"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="span">
                    <span>Avatar:</span>
                </div>
                <div class="input">
                    <input type="file" id="file" name="file" multiple>
                </div>
            </div>
            <div class="row">
                <div>
                    <label>
                        <input type="checkbox" id="confirm" onclick="resetError('labelConfirm')">Xác nhận thông tin.
                    </label>
                </div>
                <div class="error">
                    <label id="labelConfirm"></label>
                </div>
            </div>
            <button type="submit" name="save" id="save">Save</button>
        </form>
    </div>
    <br>
    <br>
    <?php
        // BƯỚC 1: KẾT NỐI CSDL
        include 'connect.php';

        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        $sql = "SELECT count(Id) as total FROM employee";
        $result = $mysqli->query($sql) or die ($mysqli->error);
        $row = $result->fetch_assoc();
        $total_records = $row['total'];

        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 2;

        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);

        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
        
        // Tìm Start
        $start = ($current_page - 1) * $limit;

        // Select dữ liệu
        $result = $mysqli->query("SELECT * FROM employee LIMIT $start, $limit") or die ($mysqli->error);   
        
        // Đóng kết nối
        $mysqli -> close();
    ?>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ Tên</th>
                    <th>Giới tính</th>
                    <th>Số năm kinh nghiệm</th>
                    <th>Mail</th>
                    <th>Địa chỉ</th>
                    <th>Avatar</th>
                </tr>
            </thead>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td> <?php echo $row["Id"];?></td>
                <td> <?php echo $row["name"];?></td>
                <td> <?php 
                    if($row["sex"] == 0) {
                        echo "Nữ";
                    }
                    else{
                        echo "Nam";
                    }
                    ?>
                </td>
                <td> <?php echo $row["skill"];?></td>
                <td> <?php echo $row["mail"];?></td>
                <td> <?php echo $row["address"];?></td>
                <td></td>
            </tr>

            <?php endwhile ; ?>
        </table>
    </div>
    <br>
    <div class="pagination">
        <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="index.php?page='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="index.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="index.php?page='.($current_page+1).'">Next</a> | ';
            }
        ?>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" type="text/css" href="./CSS/style_login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./JS/login.js"></script>
    <script src="./JS/valid.js"></script>
    <script src="./JS/slideshow_auto.js"></script>
</body>

</html>