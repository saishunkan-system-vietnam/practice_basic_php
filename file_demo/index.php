<?php 
    session_start(); 

    // Kiểm tra SESSION
    if(empty($_SESSION['userName'])) {
        if(isset($_COOKIE["username"])){
            $_SESSION['userName'] = $_COOKIE["username"];
        }    
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngô Tá Sinh</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./valid.js"></script>
</head>

<body>
    <nav>
        <div class="topnav">
            <ul><a href="index.php">Trang chủ</a></ul>
            <ul><a href="">Sản Phẩm</a></ul>
        </div>
        <div class="login">
            <ul>
                <?php
                    if (!isset($_SESSION["userName"])) {
                        echo "<a href=\"login.php\">Đăng Nhập</a>";
                    }
                    else{
                        echo "<a href=\"login.php?type=logout\">Đăng xuất &emsp;</a>";
                        echo "<a href=\"\">";
                        echo "Xin chào: ".$_SESSION["userName"];
                        echo "</a>";
                    }
                ?>
            </ul>
        </div>
    </nav>

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
</body>

</html>