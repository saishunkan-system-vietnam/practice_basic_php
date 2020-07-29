<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- <link href="./css/style.css" rel="stylesheet" /> -->
    <?php require_once "./config/router.php"; ?>
    <link href=<?php echo FILE_CSS_INDEX ?> rel="stylesheet" />
</head>

<body>
    <?php include FILE_PHP_HEADER ?>
    <div class="wrapper">
        <div class="main">
            <div class="banner">
                <img src="image/banner15.png" />
            </div>
            <!-- <div class="left">left</div> -->
            <div class="container">
                <div>
                    <ul>
                        <?php
                        require_once "./config/config.php";

                        // $sqlCount = "SELECT count(*) as total FROM data where del_flag = 0";
                        // $result = $connect->query($sqlCount);

                        // if ($result->num_rows > 0) {
                        //     while ($row = $result->fetch_assoc()) {
                        //         $total_records = $row['total'];
                        //     }
                        // }

                        // // Get số hàng hiện tại, số info tối đa hiển thị
                        // $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        // $limit = 12;

                        // $total_page = ceil($total_records / $limit);

                        // // Giới hạn số page
                        // if ($current_page > $total_page) {
                        //     $current_page = $total_page;
                        // } else if ($current_page < 1) {
                        //     $current_page = 1;
                        // }

                        // // Trang bắt đầu
                        // $start = ($current_page - 1) * $limit;

                        $sqlSelectData = "SELECT * FROM data where del_flag = 0 order by deadline DESC LIMIT  0, 12 ";
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
                
            </div>
            <!-- <div class="right">right</div> -->
        </div>
    </div>
    <?php include FILE_PHP_FOOTER ?>
</body>

</html>