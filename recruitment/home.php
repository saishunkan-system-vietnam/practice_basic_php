<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- <link href="./css/style.css" rel="stylesheet" /> -->
    <?php require "./config/router.php"; ?>
    <link href=<?php echo FILE_CSS ?> rel="stylesheet" />
</head>

<body>
    <div class="wrapper" onload="display_data()">
        <div class="header">
            <ul>
                <li class="item-home">
                    <a style="padding-left:0px;padding-right:0px;" href="<?php echo SITE_URL ?>" class="active">
                        <img src="image/logo10.png" style="width: 80px;Height:40px;" /></a>
                </li>
                <li class="item-home">
                    <a href="https://trangchu" class="active">Trang chủ</a>
                </li>
                <li class="item-jobs">
                    <a href="https://tuyendung">Tuyển dụng</a>
                </li>
                <li class="item-introduce">
                    <a href="https://gioithieu">Giới thiệu</a>
                </li>
                <li class="item-contact">
                    <a href="https://lienhe">Liên hệ</a>
                </li>
                <li style="float:right" class="login">
                    <a href="<?= SITE_URL ?>">Đăng Nhập</a>
                </li>
                <li style="float:right" class="signin">
                    <a href="https://trangchu.com.vn">Đăng ký</a>
                </li>

            </ul>
        </div>
        <div class="main">
            <div class="banner">
                <img src="image/banner15.png" />
            </div>
            <!-- <div class="left">left</div> -->
            <div class="container">
                <div>
                    <ul>
                        <!-- <li>
                            <img src="image/tuyendung1.png">
                            <h2>GIÁM SÁT PHÒNG NHÂN SỰ</h2>
                            <p>Công Ty Cổ Phần Đầu Tư Viên Ngọc Mới</p>
                            <p>Lương: 20 Tr - 30 Tr VND</p>
                            <p>Hồ Chí Minh</p>
                        </li>

                        <li>
                            <img src="image/tuyendung2.jpg">
                            <h2>Trưởng Phòng Nhân Sự</h2>
                            <p>Công Ty TNHH Long Vĩ Việt Nam</p>
                            <p>Lương: Cạnh tranh</p>
                            <p>Long An</p>
                        </li>

                        <li>
                            <img src="image/tuyendung3.jpg">
                            <h2>Chuyên Viên Nhân Sự</h2>
                            <p>CÔNG TY CỔ PHẦN TÂN LIÊN MINH</p>
                            <p>Lương: 6 Tr - 10 Tr VND</p>
                            <p>Hà Nội</p>
                        </li>

                        <li>
                            <img src="image/tuyendung4.jpg">
                            <h2>Trưởng phòng Nhân sự</h2>
                            <p>CÔNG TY CỔ PHẦN BCG ENERGY</p>
                            <p>25 Tr - 40 Tr VND</p>
                            <p>Hồ Chí Minh</p>
                        </li>

                        <li>
                            <img src="image/tuyendung5.png">
                            <h2>Trưởng Phòng Nhân Sự</h2>
                            <p>CÔNG TY HOÀNG HẢI</p>
                            <p>Lương: 18 Tr - 28 Tr VND</p>
                            <p>Kiên Giang</p>
                        </li>

                        <li>
                            <img src="image/tuyendung6.jpg">
                            <h2>TRƯỞNG PHÒNG NHÂN SỰ </h2>
                            <p>CÔNG TY TNHH MỘT THÀNH VIÊN CHUYỂN PHÁT NHANH </p>
                            <p>Lương: 33 Tr - 44 Tr VND</p>
                            <p>Bắc Ninh</p>
                        </li>

                        <li>
                            <img src="image/tuyendung7.png">
                            <h2>Human Resources Staff / Nhân Viên Nhân Sự</h2>
                            <p>Công Ty TNHH INOAC Viet Nam</p>
                            <p>Lương: 8,8 Tr - 13,2 Tr VND</p>
                            <p>Hồ Chí Minh</p>
                        </li>

                        <li>
                            <img src="image/tuyendung8.jpg">
                            <h2>CV/CVCC Nhân sự</h2>
                            <p>LOTTE FINANCE VIETNAM</p>
                            <p>Lương: 20 Tr - 30 Tr VND</p>
                            <p>Hà Nội</p>
                        </li>

                        <li>
                            <img src="image/tuyendung9.png">
                            <h2>Phó Chủ Quản Nhân Sự Biết Tiếng Trung</h2>
                            <p>Công Ty TNHH BEST Logistics Technology (Việt Nam)</p>
                            <p>Lương: 30 Tr - 35 Tr VND</p>
                            <p>Hồ Chí Minh</p>
                        </li>

                        <li>
                            <img src="image/tuyendung10.png">
                            <h2>NHÂN VIÊN HÀNH CHÁNH NHÂN SỰ</h2>
                            <p>CÔNG TY TNHH NAHAL VINA</p>
                            <p>Lương: 10 Tr - 20 Tr VND</p>
                            <p>Hồ Chí Minh</p>
                        </li>

                        <li>
                            <img src="image/tuyendung11.png">
                            <h2>GIÁM SÁT PHÒNG NHÂN SỰ</h2>
                            <p>Công Ty Cổ Phần Đầu Tư Viên Ngọc Mới</p>
                            <p>Lương: 13 Tr - 30 Tr VND</p>
                            <p>Hồ Chí Minh</p>
                        </li>

                        <li>
                            <img src="image/tuyendung12.png">
                            <h2>Chuyên Viên Kinh Doanh B2B </h2>
                            <p>Công Ty Cổ Phần Thành Thành Công – Biên Hòa</p>
                            <p>Lương: 24 Tr - 20 Tr VND</p>
                            <p>Hồ Chí Minh</p>
                        </li> -->

                        <?php
                        require "./config/config.php";

                        // Get total records
                        $sqlCount = "SELECT count(*) as total FROM data where del_flag=0";
                        $result = $connect->query($sqlCount);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $total_records = $row['total'];
                            }
                        }

                        // Get current page, number page
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $limit = 12;

                        $total_page = ceil($total_records / $limit);

                        // Giới hạn số page
                        if ($current_page > $total_page) {
                            $current_page = $total_page;
                        } else if ($current_page < 1) {
                            $current_page = 1;
                        }

                        // Trang bắt đầu
                        $start = ($current_page - 1) * $limit;

                        $sqlSelectData = "SELECT * FROM data where del_flag = 0 order by deadline DESC LIMIT  $start, $limit ";
                        $resultData = $connect->query($sqlSelectData);
                        if ($resultData->num_rows > 0) {
                            while ($rowData = $resultData->fetch_assoc()) {
                                echo "<li>";
                                echo '<img src="data:image;base64,' . base64_encode($rowData["logo"]) . '" alt="Image">';
                                echo "<h2>" . $rowData["position"] . "</h2>";
                                echo "<p>" . $rowData["company"] . "</p>";
                                echo "<p>" . "Lương: " . $rowData["salary"] . "</p>";
                                echo "<p>" . $rowData["address"] . "</p>";
                                echo "</li>";
                            }
                        }
                        ?>

                    </ul>
                </div>

                <div class="pagination">
                    <?php
                    if ($current_page > 1 && $total_page > 1) {
                        echo '<a href="home.php?page=' . ($current_page - 1) . '"><b>&#8678;</b></a> | ';
                    }

                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i == $current_page) {
                            echo '<span style="color: #1a75ff;"><b>' . $i . '</b></span> | ';
                        } else {
                            echo '<a href="home.php?page=' . $i . '">' . $i . '</a> | ';
                        }
                    }

                    if ($current_page < $total_page) {
                        echo '<a href="home.php?page=' . ($current_page + 1) . '"><b>&#8680;</b></a>';
                    }
                    ?>
                </div>
            </div>
            <!-- <div class="right">right</div> -->
        </div>
        <div class="footer">
            <div style="font-size: 17px;padding-top:10px;padding-bottom:10px;">Tuyển dụng và tìm kiếm việc làm</div>
            <div style="font-size: 13px;">Email: MinhNN@saisystem.vn.vn</div>
            <div style="font-size: 13px;">Address: 28 Nguyen Tri Phuong Street, Hue City</div>
        </div>
    </div>
</body>

</html>