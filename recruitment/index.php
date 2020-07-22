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
                    <a href="<?= FILE_LOGIN ?>">Đăng Nhập</a>
                </li>
                <li style="float:right" class="signin">
                    <a href="">Đăng ký</a>
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